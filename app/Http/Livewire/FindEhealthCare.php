<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Rating;
use Livewire\Component;
use App\Models\Location;
use App\Models\Specialty;
use App\Models\Delegation;
use App\Models\Governorate;
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
    public $selectedSpecialty = null;
    public $selectedGender = null;
    public $ratings;
    public $specialties;
    public $genders;
    public $name;

    public $governorates = [], $delegations = [], $locations = [];
    public $selectedGovernorateId = null, $selectedDelegationId = null, $selectedLocationId = null;

    protected $listeners = [
        'getDelegationsByGovernorateId' => 'getDelegationsByGovernorateId',
        'getLocationsByDelegationId' => 'getLocationsByDelegationId', 
    ];

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
        $this->genders = ['m', 'f'];


        $this->governorates = Governorate::select('id', 'name')
            ->get()
            ->toArray();
    }

    public function hydrate()
    {
        $this->dispatchBrowserEvent('render-select2');
    }

    public function getDelegationsByGovernorateId()
    {
        $this->delegations = Delegation::select('id', 'name', 'governorate_id')
            ->whereGovernorateId($this->selectedGovernorateId)
            ->get()
            ->toArray();
            
            $this->reset('locations', 'selectedDelegationId');
    }
    
    
    public function getLocationsByDelegationId()
    {
        $this->locations = Location::select('id', 'name', 'delegation_id')
            ->whereDelegationId($this->selectedDelegationId)
            ->get()
            ->toArray();
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
        $this->selectedGovernorateId= null;
        $this->selectedDelegationId= null;
        $this->selectedLocationId= null;
        $this->selectedSpecialty= null;
        $this->selectedGender= null;
        $this->resetPage();
    }

    public function render()
    { 
        return view('livewire.find-ehealth-care', [
            'governorates' => $this->governorates,
            'data' => User::Where('specialty', 'like', '%'.$this->selectedSpecialty.'%')
            ->Where('governorate_id', 'like', '%'.$this->selectedGovernorateId.'%')
            ->Where('delegation_id', 'like', '%'.$this->selectedDelegationId.'%')
            ->Where('location_id', 'like', '%'.$this->selectedLocationId.'%')
            ->Where('gender', 'like', '%'.$this->selectedGender.'%')
            ->paginate($this->perPage),        
            ]);
    }
}
