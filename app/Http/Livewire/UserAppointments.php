<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Appointment;

class UserAppointments extends Component
{
    public $treatment;
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
    public $currentId;
    public $user;
    public $hideForm;

    protected $rules = [
        
        'treatment' => 'required',
        'sub_treatment' => 'required',
        'status' => 'required',
        'passage_number' => 'required',
        'certificate' => 'required',
        'home_mention' => 'required',
        'start_date' => 'required',
        'duration' => 'required',
        'user_dispo' => 'required',
        'care_place' => 'required',
        'covid_symptom' => 'required',
    ];

    public function render()
    {
        $appointments = Appointment::where('status', 'accepted')->with('user')->get();
        return view('livewire.user-appointments', compact('appointments'));
    }

    public function mount(Appointment $appointment)
    {
        if(auth()->user()){
            if (!empty($appointment)) {
                $this->treatment  = $appointment->treatment;
                $this->sub_treatment  = $appointment->sub_treatment;
                $this->passage_number  = $appointment->passage_number;
                $this->status  = $appointment->status;
                $this->certificate  = $appointment->certificate;
                $this->home_mention  = $appointment->home_mention;
                $this->start_date  = $appointment->start_date;
                $this->duration  = $appointment->duration;
                $this->user_dispo  = $appointment->user_dispo;
                $this->care_place  = $appointment->care_place;
                $this->covid_symptom  = $appointment->covid_symptom;
                $this->currentId = $appointment->id;
            }
        }
        return view('livewire.user-appointments');
    }

    public function delete($id)
    {
        $appointment = Appointment::where('id', $id)->first();
        if ($appointment && ($appointment->user_id == auth()->user()->id)  || ('admin'== auth()->user()->role)) {
            $appointment->delete();
        }
        if ($this->currentId) {
            $this->currentId = '';
            $this->treatment  = '';
            $this->sub_treatment = '';
            $this->passage_number = '';
            $this->status = '';
            $this->certificate = '';
            $this->home_mention = '';
            $this->start_date = '';
            $this->duration = '';
            $this->user_dispo = '';
            $this->care_place = '';
            $this->covid_symptom = '';
        }
    }

    public function appoint()
    {
        $appointment = Appointment::where('user_id', auth()->user()->id)->where('related_id', $this->user->id)->first();
        $this->validate();
        if (!empty($appointment)) {
            $appointment->user_id = auth()->user()->id;
            $appointment->related_id = $this->user->id;
            $appointment->treatment = $this->treatment;
            $appointment->sub_treatment = $this->sub_treatment;
            $appointment->passage_number = $this->passage_number;
            $appointment->sub_treatment = $this->sub_treatment;
            $appointment->status = $this->status;
            $appointment->certificate = $this->certificate;
            $appointment->home_mention = $this->home_mention;
            $appointment->start_date = $this->start_date;
            $appointment->duration = $this->duration;
            $appointment->user_dispo = $this->user_dispo;
            $appointment->care_place = $this->care_place;
            $appointment->covid_symptom = $this->covid_symptom;
            try {
                $appointment->update();
            } catch (\Throwable $th) {
                throw $th;
            }
            session()->flash('message', 'Success!');
        } else {
            $appointment = new Appointment;
            $appointment->user_id = auth()->user()->id;
            $appointment->related_id = $this->user->id;
            $appointment->treatment = $this->treatment;
            $appointment->sub_treatment = $this->sub_treatment;
            $appointment->passage_number = $this->passage_number;
            $appointment->sub_treatment = $this->sub_treatment;
            $appointment->status = 'waiting';
            $appointment->certificate = $this->certificate;
            $appointment->home_mention = $this->home_mention;
            $appointment->start_date = $this->start_date;
            $appointment->duration = $this->duration;
            $appointment->user_dispo = $this->user_dispo;
            $appointment->care_place = $this->care_place;
            $appointment->covid_symptom = $this->covid_symptom;
            try {
                $appointment->save();
            } catch (\Throwable $th) {
                throw $th;
            }
            $this->hideForm = true;
        }
    }
}