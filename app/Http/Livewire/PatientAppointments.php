<?php

namespace App\Http\Livewire;

use App\Models\Appointment;
use Livewire\Component;
use Livewire\WithPagination;

class PatientAppointments extends Component
{
    use WithPagination;
   
    /**
     * Put your custom public properties here!
     */
    public User $user;
    public $related_name; 
    public $treatment; 
    public $created_at; 
    public $sub_treatment;
    public $passage_number;
    public $status;
    public $certificate;
    public $home_mention;
    public $start_date;
    public $duration;
    public $user_dispo;
    public $care_place;
    public $covid_symptom;
    public $modalShowVisible;
    public $modelId;
    public $perPage = 10;
    public $search = '';
   
    public function render()
    {
        return view('livewire.patient-appointments', [
            'data' => Appointment::search($this->search)
            ->with('user')
            ->latest()
            ->paginate($this->perPage),
        ]);
    }

    /**Show appointment */

    /**
     * Shows the form modal
     * in update mode.
     *
     * @param  mixed $id
     * @return void
    */
    public function showModal($id)
    {
        $data = Appointment::find($id);
        // Assign the variables here
        $this->related_name = $data->related_name;
        $this->treatment  = $data->treatment;
        $this->sub_treatment  = $data->sub_treatment;
        $this->passage_number  = $data->passage_number;
        $this->status  = $data->status;
        $this->certificate  = $data->certificate;
        $this->home_mention  = $data->home_mention;
        $this->start_date  = $data->start_date;
        $this->duration  = $data->duration;
        $this->user_dispo  = $data->user_dispo;
        $this->care_place  = $data->care_place;
        $this->covid_symptom  = $data->covid_symptom;
        $this->created_at  = $data->created_at;
        $this->modalShowVisible = true;
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
                ['type' => 'info',  'message' => 'Search by e-health care name, date, care place or status!']);
    }
}
