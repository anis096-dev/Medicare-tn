<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Appointment;
use App\Models\User;
use Livewire\WithPagination;

class UserAppointments extends Component
{
    use WithPagination;
   
    /**
     * Put your custom public properties here!
     */
    public User $user;
    public $selectedAppointment;
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
    public $modalFormVisible;
    public $modalConfirmDeleteVisible;
    public $modelId;
    
    /**
     * The validation rules
     *
     * @return void
     */
    public function rules()
    {
        return [ 
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
    }

     /**
     * The read function.
     *
     * @return void
     */
    public function read()
    {    
        return Appointment::latest()->with('user')->paginate(5);
    }
    
    public function render()
    {
        return view('livewire.user-appointments', [
            'data' => $this->read(),
        ]);
    }
    
    /**
     * Shows the create modal
     *
     * @return void
     */
    public function createShowModal()
    {
        $this->cleanVars();
        $this->modalFormVisible = true;
    }

     /**
     * The data for the model mapped
     * in this component.
     *
     * @return void
     */
    public function modelData()
    {   
        return [
            'user_id' => auth()->user()->id,
            'related_id' => $this->user->id,
            'related_name' => $this->user->name,
            'treatment' => $this->treatment,
            'sub_treatment' => $this->sub_treatment,
            'status' => $this->status,
            'passage_number' => $this->passage_number,
            'certificate' => $this->certificate,
            'home_mention' => $this->home_mention,
            'start_date' => $this->start_date,
            'duration' => $this->duration,
            'user_dispo' => $this->user_dispo,
            'care_place' => $this->care_place,
            'covid_symptom' => $this->covid_symptom,    
        ];
    }
    
     /**
     * The create function.
     *
     * @return void
     */
    public function create()
    {
        $this->validate();
        Appointment::create($this->modelData());
        $this->modalFormVisible = false;
        $this->cleanVars();
        session()->flash('message', 'Your demand has been sent!! Wish you good luck!!');
    }
    
    /**
     * Loads the model data
     * of this component.
     *
     * @return void
     */
    public function loadModel()
    {
        $data = Appointment::find($this->modelId);
        // Assign the variables here
        $this->user_id = $data->user_id;
        $this->related_id = $data->related_id;
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
    }

     /**
     * Shows the form modal
     * in update mode.
     *
     * @param  mixed $id
     * @return void
     */
    public function updateShowModal($id)
    {
        $this->modelId = $id;
        $this->loadModel();
        $this->modalFormVisible = true;
    }

     /**
     * The data for the model mapped
     * in this component.
     *
     * @return void
     */
    public function modelDataUpdate()
    {   
        return [  
            'treatment' => $this->treatment,
            'sub_treatment' => $this->sub_treatment,
            'status' => $this->status,
            'passage_number' => $this->passage_number,
            'certificate' => $this->certificate,
            'home_mention' => $this->home_mention,
            'start_date' => $this->start_date,
            'duration' => $this->duration,
            'user_dispo' => $this->user_dispo,
            'care_place' => $this->care_place,
            'covid_symptom' => $this->covid_symptom,      
        ];
    }
    
    
    /**
     * The update function
     *
     * @return void
     */
    public function update()
    {
        $this->validate();
        Appointment::find($this->modelId)->update($this->modelDataUpdate());
        $this->modalFormVisible = false;
        $this->cleanVars();
        session()->flash('message', 'You changed the Appointment data Successfully!!');
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
        $this->resetPage();
    }
    
    public function cleanVars()
    {
        $this->user_id = '';
        $this->related_id ='';
        $this->related_name ='';
        $this->treatment  = '';
        $this->sub_treatment = '';
        $this->passage_number  = '';
        $this->status  = '';
        $this->certificate  = '';
        $this->home_mention  = '';
        $this->start_date  = '';
        $this->duration  = '';
        $this->user_dispo  = '';
        $this->care_place  = '';
        $this->covid_symptom  = '';
        $this->modelId = '';
        $this->selectedAppointment = '';
       $this->resetValidation();
    }
}