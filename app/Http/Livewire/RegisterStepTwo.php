<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Location;
use App\Models\Specialty;
use App\Models\Delegation;
use App\Models\Governorate;

class RegisterStepTwo extends Component
{
    public $bio;
    public $specialty;

    public $governorates = [], $delegations = [], $locations = [];
    public $governorate_id, $delegation_id, $location_id;

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
        $this->specialties = Specialty::all();
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
            ->whereGovernorateId($this->governorate_id)
            ->get()
            ->toArray();
            
            $this->reset('locations', 'delegation_id');
    }
    
    
    public function getLocationsByDelegationId()
    {
        $this->locations = Location::select('id', 'name', 'delegation_id')
            ->whereDelegationId($this->delegation_id)
            ->get()
            ->toArray();
    }

    public function save()
    {
        $this->validate([
            'bio' => 'max:255',
            'specialty' => 'required_if:role, Health specialist',
            'governorate_id' => 'required',
            'delegation_id' => 'required',
            'location_id' => 'required',
        ]);
        auth()->user()->update([
            'bio' => $this->bio,         
            'specialty' => $this->specialty, 
            'governorate_id' => $this->governorate_id, 
            'delegation_id' => $this->delegation_id, 
            'location_id' => $this->location_id, 
        ]);
        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.register-step-two');
    }
}
