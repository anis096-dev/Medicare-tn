<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class FindEhealthCare extends Component
{
    use WithPagination;
    
    public $modalFormVisible;
    /**
     * Put your custom public properties here!
     */
    public User $user;
    public $perPage = 10;
    public $search = '';

    /**
     * mount
     *
     * @param  mixed $id
     * @return void
     */
    public function show ($user)
    {   
        if ($user->role == 'E-health Care') {
            # code...
            $avgrating = Rating::all()->where('related_id', $user->id );
            return view('livewire.show-profile',compact('user', 'avgrating'));
        }
        else 
        {
            return \redirect('dashboard');
        }
    }

    /**
     * The searchclear function.
     *
     * @return void
     */
    public function searchClear()
    {
        $this->search = '';
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function alertInfo()
    {
        $this->dispatchBrowserEvent('alert', 
            ['type' => 'info',  
            'message' => 'Search by Name, Email & phone or Specialty!'
            ]);
    }

    public function render()
    { 
        return view('livewire.find-ehealth-care', [
            'data' => User::search($this->search)
            ->paginate($this->perPage),
        ]);
    }
}
