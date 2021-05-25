<?php

namespace App\Http\Livewire;

use App\Models\Rating;
use App\Models\Specialty;
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
    public $selectedAdresse = null;
    public $selectedC_Adresse = null;
    public $selectedSpecialty = null;
    public $selectedGender = null;
    public $ratings;
    public $specialties;
    public $adresses;
    public $c_adresses;
    public $genders;
    
    
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
        $this->adresses = User::all()->where('role', 'E-health Care')->unique('adresse');
        $this->c_adresses = User::all()->where('role', 'E-health Care')->unique('adresse2');
        $this->genders = ['m', 'f'];
    }

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
    public function resetFilter()
    {
        $this->selectedAdresse= null;
        $this->selectedC_Adresse= null;
        $this->selectedSpecialty= null;
        $this->selectedGender= null;
        $this->resetPage();
    }

    public function render()
    { 
        return view('livewire.find-ehealth-care', [
            'data' => User::Where('adresse', 'like', '%'.$this->selectedAdresse.'%')
            ->Where('gender', 'like', '%'.$this->selectedGender.'%')
            ->Where('specialty', 'like', '%'.$this->selectedSpecialty.'%')
            ->orWhere('adresse2', 'like', '%'.$this->selectedC_Adresse.'%')
            ->paginate($this->perPage),        
            ]);
    }
}
