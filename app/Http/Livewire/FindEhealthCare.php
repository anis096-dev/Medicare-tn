<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Rating;
use Livewire\Component;
use App\Models\Specialty;
use Illuminate\Http\Request;
use Livewire\WithPagination;

class FindEhealthCare extends Component
{
    use WithPagination;
    
    public $modalFormVisible;
    /**
     * Put your custom public properties here!
     */

    public User $user;
    public $perPage = 12;
    public $selectedGovernorate = null;
    public $selectedAdresse = null;
    public $selectedSpecialty = null;
    public $selectedGender = null;
    public $ratings;
    public $specialties;
    public $adresses;
    public $genders;
    public $name;
    
    /**
     * mount
     *
     * @param  mixed $id
     * @return void
     */
    public function mount()
    {
        $this->ratings = Rating::all();
        $this->specialties = Specialty::all();
        $this->adresses = User::all()->where('role', 'Health specialist')->unique('adresse');
        $this->genders = ['m', 'f'];
    }

    public function show ($user)
    {   
        if ($user->role == 'Health specialist') {
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
    public function resetFilter()
    {
        $this->selectedGovernorate= null;
        $this->selectedAdresse= null;
        $this->selectedSpecialty= null;
        $this->selectedGender= null;
        $this->resetPage();
    }

    public function render()
    { 
        return view('livewire.find-ehealth-care', [
            'data' => User::Where('specialty', 'like', '%'.$this->selectedSpecialty.'%')
            ->Where('Governorate', 'like', '%'.$this->selectedGovernorate.'%')
            ->Where('adresse', 'like', '%'.$this->selectedAdresse.'%')
            ->Where('gender', 'like', '%'.$this->selectedGender.'%')
            ->paginate($this->perPage),        
            ]);
    }
}
