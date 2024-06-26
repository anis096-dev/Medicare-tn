<?php

namespace App\Http\Livewire;

use Exception;
use App\Models\User;
use Livewire\Component;
use Twilio\Rest\Client;
use App\Models\Treatment;
use App\Models\Appointment;
use App\Models\SubTreatment;
use Livewire\WithPagination;
use App\Mail\PatientApptNotif;
use App\Mail\PatientApptNotifRefuse;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class EHealthAppointments extends Component
{
    use WithPagination;
   
    /**
     * Put your custom public properties here!
     */
    public User $user;
    public $allTreatments;
    public $allSubTreatments;
    public $related_name;
    public $patient_name; 
    public $patient_email;  
    public $patient_tel;  
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
            'patient_email' => 'required',
            'status' => 'required',
        ];
    }
   
    public function render()
    {
        $this->bulkDisabled = count($this->selectedAppointments) < 1;
        return view('livewire.e-health-appointments', [
            'data' => Appointment::search($this->search)
            ->Where('created_at', 'like', '%'.$this->selectedDate.'%')
            ->with('user')
            ->latest()
            ->paginate($this->perPage),
        ]);
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
        $this->patient_name = $data->patient_name;
        $this->patient_email = $data->patient_email;
        $this->patient_tel = $data->patient_tel;
        $this->treatment  = $data->treatment;
        $this->sub_treatment  = $data->sub_treatment;
        $this->passage_number  = $data->passage_number;
        // $this->status  = $data->status;
        $this->certificate  = $data->certificate;
        $this->home_mention  = $data->home_mention;
        $this->start_date  = $data->start_date;
        $this->duration  = $data->duration;
        $this->user_dispo  = $data->user_dispo;
        $this->user_dispo2  = $data->user_dispo2;
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
            'patient_email' => $this->patient_email,
            'status' => $this->status,
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
        if($this->status == 'accepted'){

            $receiverNumber = $this->patient_tel;
            // $message = "Hello! your appointment was: {$this->status}!, You can call {$this->related_name} right now!, Please check your email for more information. Regards, Medicare.TN";
            $message = "{$this->patient_name} مرحبا\nلقد تمّ قبول موعدك\nالأخصائي {$this->related_name}\nالعلاج {$this->treatment}--{$this->sub_treatment}\nيمكنك الاطلاع على بريدك الالكتروني للمزيد من المعلومات\n\nفريق Medicare-Tn";
            try{
            $account_sid = getenv("TWILIO_SID");
            $auth_token = getenv("TWILIO_TOKEN");
            $twilio_number = getenv("TWILIO_FROM");
            
            $client = new Client($account_sid, $auth_token);
            $client->messages->create($receiverNumber, [
            'from' => $twilio_number,
            'body' => $message]);

            Mail::to($this->patient_email)->send(new PatientApptNotif(
                auth()->user()->name,auth()->user()->specialty, auth()->user()->tel, auth()->user()->adresse,
                $this->status,$this->treatment, $this->sub_treatment,
                $this->passage_number,$this->start_date,$this->care_place));
    
            // Set Flash Message
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"A confirmation Email & SMS was sent to $this->patient_name!!"
            ]);

            // Reset Form Fields After Creating Category
            $this->cleanVars();
            }
            catch(Exception $e){
            // Set Flash Message
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something goes wrong!!"
            ]);

            // Reset Form Fields After Creating Category
            $this->cleanVars();
            }
            $this->modalFormVisible = false; 
        }else{

            $receiverNumber = $this->patient_tel;
            // $message = "Hello! your appointment was: {$this->status}!, {$this->related_name} is too busy!, Hope you find another healthcare specialist.  Regards, Medicare.TN";
            $message = "{$this->patient_name} مرحبا\nلقد تمّ رفض موعدك\nالأخصائي {$this->related_name}\nالعلاج {$this->treatment}--{$this->sub_treatment}\nيمكنك البحث عن أخصّائي آخر\n\nفريق Medicare-Tn";    
            try {
            $account_sid = getenv("TWILIO_SID");
            $auth_token = getenv("TWILIO_TOKEN");
            $twilio_number = getenv("TWILIO_FROM");
            
            $client = new Client($account_sid, $auth_token);
            $client->messages->create($receiverNumber, [
            'from' => $twilio_number,
            'body' => $message]);
                    // Set Flash Message
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"A confirmation SMS was sent to $this->patient_name!!"
            ]);

            // Reset Form Fields After Creating Category
            $this->cleanVars();
            }
            catch(Exception $e){
            // Set Flash Message
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something goes wrong!!"
            ]);

            // Reset Form Fields After Creating Category
            $this->cleanVars();
            }
            $this->modalFormVisible = false; 
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
        $this->patient_name ='';
        $this->patient_email ='';
        $this->patient_tel ='';
        $this->treatment  = '';
        $this->sub_treatment = '';
        $this->passage_number  = '';
        $this->status  = '';
        $this->certificate  = '';
        $this->home_mention  = '';
        $this->start_date  = '';
        $this->duration  = '';
        $this->user_dispo  = '';
        $this->user_dispo2  = '';
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
                ['type' => 'info',  'message' => 'Search by Health specialist name, date, care place or status!']);
    }
}