<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Image;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class UserImages extends Component
{
    public $userId;

    protected $listeners = [
        'getUserId',
    ];

    public function getUserId($userId)
    {
        $this->userId = $userId;
    }

     /**
     * The delete function.
     *
     * @return void
     */
    public function deletePhotos()
    {
        Image::where('user_id', '=', $this->userId)->delete();
        User::where('id', '=', $this->userId)->update(['account_Verified' => false]);
        $this->dispatchBrowserEvent('alert',[
            'type'=>'error',
            'message'=>"Your Health specialist photos are deleted Successfully!!"
        ]);
    }

     /**
     * The delete function.
     *
     * @return void
     */
    public function confirmUser()
    {
        User::where('id', '=', $this->userId)->update(['account_Verified' => true]);
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Health specialist accepted Successfully!!"
        ]);
    }
    
    public function render()
    {
        return view('livewire.user-images', [
            'images' => Image::where('user_id', '=', $this->userId)->get()
        ]);
    }
}
