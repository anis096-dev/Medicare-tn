<?php

namespace App\Http\Livewire;

use App\Mail\CancelAppNotif;
use App\Models\Appointment;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Mail;

class PatientAppointments extends Component
{
    use WithPagination;
   
    /**
     * Put your custom public properties here!
     */
    public User $user;
    public $related_name;
    public $related_email;
    public $patient_name; 
    public $patient_email;   
    public $patient_tel;   
    public $adresse;   
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
    public $user_dispo2;
    public $care_place;
    public $covid_symptom;
    public $modalShowVisible;
    public $modalConfirmDeleteVisible;
    public $modelId;
    public $perPage = 10;
    public $search = '';
    public $selectedDate = null;
   
    public function render()
    {
        return view('livewire.patient-appointments', [
            'data' => Appointment::search($this->search)
            ->Where('created_at', 'like', '%'.$this->selectedDate.'%')
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
        $this->related_email = $data->related_email;
        $this->patient_name = $data->patient_name;
        $this->patient_email = $data->patient_email;
        $this->patient_tel = $data->patient_tel;
        $this->treatment  = $data->treatment;
        $this->sub_treatment  = $data->sub_treatment;
        $this->passage_number  = $data->passage_number;
        $this->status  = $data->status;
        $this->certificate  = $data->certificate;
        $this->home_mention  = $data->home_mention;
        $this->start_date  = $data->start_date;
        $this->duration  = $data->duration;
        $this->user_dispo  = $data->user_dispo;
        $this->user_dispo2  = $data->user_dispo2;
        $this->care_place  = $data->care_place;
        $this->covid_symptom  = $data->covid_symptom;
        $this->created_at  = $data->created_at;
        $this->modalShowVisible = true;
    }

    /**
     * Shows the delete confirmation modal.
     *
     * @param  mixed $id
     * @return void
     */
    public function deleteShowModal($id)
    {
        $this->modelId = $id;
        $this->modalConfirmDeleteVisible = true;
    } 
    
    /**
     * The delete function.
     *
     * @return void
     */
    public function delete()
    {
        Appointment::destroy($this->modelId);
        $this->modalConfirmDeleteVisible = false;
        Mail::to($this->related_email)->send(new CancelAppNotif(
            $this->patient_name,$this->treatment, $this->sub_treatment,
            $this->passage_number,$this->start_date,$this->care_place));
        $this->dispatchBrowserEvent('alert',[
            'type'=>'error',
            'message'=>"Your Appointment cancelled successfuly!! the specialist will be notified !!"
        ]);
        $this->resetPage();
    }

    /**
     * The searchclear function.
     *
     * @return void
     */
    public function searchClear()
    {
        $this->search = '';
        $this->selectedDate = null;
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
