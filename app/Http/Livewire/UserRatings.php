<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Rating;

class UserRatings extends Component
{
    public $rating;
    public $comment;
    public $currentId;
    public $user;
    public $hideForm;

    protected $rules = [
        'rating' => ['required', 'in:1,2,3,4,5'],
        'comment' => 'required',

    ];

    public function render()
    {
        $comments = Rating::where('related_id', $this->user->id)->where('status', 1)->with('user')->get();
        return view('livewire.user-ratings', compact('comments'));
    }

    public function mount()
    {
        if(auth()->user()){
            $rating = Rating::where('user_id', auth()->user()->id)->where('related_id', $this->user->id)->first();
            if (!empty($rating)) {
                $this->rating  = $rating->rating;
                $this->comment = $rating->comment;
                $this->currentId = $rating->id;
            }
        }
        return view('livewire.user-ratings');
    }

    public function delete($id)
    {
        $rating = Rating::where('id', $id)->first();
        if ($rating && ($rating->user_id == auth()->user()->id)  || ('admin'== auth()->user()->role)) {
            $rating->delete();
        }
        if ($this->currentId) {
            $this->currentId = '';
            $this->rating  = '';
            $this->comment = '';
        }
        $this->dispatchBrowserEvent('alert',[
            'type'=>'error',
            'message'=>"Your Review deleted Successfully!!"
        ]);
    }

    public function rate()
    {
        $rating = Rating::where('user_id', auth()->user()->id)->where('related_id', $this->user->id)->first();
        $this->validate();
        try{
            if (!empty($rating)) {
                $rating->user_id = auth()->user()->id;
                $rating->related_id = $this->user->id;
                $rating->rating = $this->rating;
                $rating->comment = $this->comment;
                $rating->status = 1;
                try {
                    $rating->update();
                } catch (\Throwable $th) {
                    throw $th;
                }
            } else {
                $rating = new Rating;
                $rating->user_id = auth()->user()->id;
                $rating->related_id = $this->user->id;
                $rating->rating = $this->rating;
                $rating->comment = $this->comment;
                $rating->status = 1;
                try {
                    $rating->save();
                } catch (\Throwable $th) {
                    throw $th;
                }
                $this->hideForm = true;
            }
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Your Review added Successfully!!"
            ]);
        }
        catch(\Exception $e){
            // Set Flash Message
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something goes wrong!!"
            ]);
        }
        
    }
}