<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Treatment;
use App\Models\Appointment;
use App\Models\SubTreatment;
use Livewire\WithPagination;

class AllAppointments extends Component
{
    use WithPagination;
   
    /**
     * Put your custom public properties here!
     */
    public User $user;
    public $allTreatments;
    public $allSubTreatments;
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
    public $modalFormVisible;
    public $modalShowVisible;
    public $modalConfirmDeleteVisible;
    public $modelId;
    public $selectedAppointments = [];
    public $selectAll = false;
    public $bulkDisabled = true;
    public $perPage = 10;
    public $search = '';
    public $selectedDate = null;
    

    public function mount()
    {
        $this->allTreatments = Treatment::all();
        $this->allSubTreatments = SubTreatment::all();
    }

    /**
     * The validation rules
     *
     * @return void
     */
    public function rules()
    {
        return [ 
            'treatment' => 'required',
            'sub_treatment' =>'required',
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
   
    public function render()
    {
        $this->bulkDisabled = count($this->selectedAppointments) < 1;
        return view('livewire.all-appointments', [
            'data' => Appointment::search($this->search)
            ->Where('created_at', 'like', '%'.$this->selectedDate.'%')
            ->with('user')
            ->latest()
            ->paginate($this->perPage),
        ]);
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
        // $this->sub_treatment  = $data->sub_treatment;
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
        try{
        Appointment::find($this->modelId)->update($this->modelDataUpdate());
        $this->modalFormVisible = false;
         // Set Flash Message
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"You changed the Appointment data Successfully!!"
        ]);

        // Reset Form Fields After Creating Category
        $this->cleanVars();
        }
        catch(\Exception $e){
        // Set Flash Message
        $this->dispatchBrowserEvent('alert',[
            'type'=>'error',
            'message'=>"Something goes wrong!!"
        ]);

        // Reset Form Fields After Creating Category
        $this->cleanVars();
        }
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
        
    /**End */
    
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
        $this->dispatchBrowserEvent('alert',[
            'type'=>'error',
            'message'=>"Your Appointment deleted successfuly!!"
        ]);
        $this->resetPage();
    }

    /**
    * The Selecteddelete function.
    *
    * @return void
    */
    public function deleteSelected()
    {
        Appointment::query()
        ->whereIn('id', $this->selectedAppointments)
        ->delete();
        $this->selectedAppointments = [];
        $this->selectAll = false;
        $this->resetPage();
        $this->dispatchBrowserEvent('alert',[
            'type'=>'error',
            'message'=>"all selected Items deleted Successfully!!"
        ]);
    }

    /**
    * The Selecteddelete function.
    *
    * @return void
    */
    public function NodeleteSelected()
    {
        $this->dispatchBrowserEvent('alert',[
            'type'=>'error',
            'message'=>"No Item selected to delete!!"
        ]);
        $this->resetPage();
    }

    public function updatedSelectAll($value)
    {
        if($value){
            $this->selectedAppointments = Appointment::pluck('id');
        }else{
            $this->selectedAppointments = [];
        }
        
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
       $this->resetValidation();
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