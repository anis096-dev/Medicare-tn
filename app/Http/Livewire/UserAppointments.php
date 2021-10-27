<?php

namespace App\Http\Livewire;
use App\Models\User;
use Livewire\Component;
use App\Models\Treatment;
use App\Models\Appointment;
use App\Models\SubTreatment;
use Livewire\WithPagination;
use App\Mail\EhealthApptNotif;
use Illuminate\Support\Facades\Mail;

class UserAppointments extends Component
{
    use WithPagination;
   
    /**
     * Put your custom public properties here!
     */
    public User $user;
    public $allTreatments;
    public $allSubTreatments;
    public $related_name; 
    public $related_email; 
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
    public $modelId;
    

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
            'user_dispo2' => 'required',
            'care_place' => 'required',
            'covid_symptom' => 'required',
        ];
    }
   
    public function render()
    {
        return view('livewire.user-appointments', [
            'data' => Appointment::with('user'),
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
            'related_email' => $this->user->email,
            'patient_name' => auth()->user()->name,
            'patient_email' => auth()->user()->email,
            'patient_tel' => auth()->user()->tel,
            'treatment' => $this->treatment,
            'sub_treatment' => $this->sub_treatment,
            'passage_number' => $this->passage_number,
            'certificate' => $this->certificate,
            'home_mention' => $this->home_mention,
            'start_date' => $this->start_date,
            'duration' => $this->duration,
            'user_dispo' => $this->user_dispo,
            'user_dispo2' => $this->user_dispo2,
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
        try{
        Appointment::create($this->modelData());
        $this->modalFormVisible = false;
        Mail::to($this->user->email)->send(new EhealthApptNotif(
            auth()->user()->name, auth()->user()->adresse,
            $this->treatment, $this->sub_treatment, $this->passage_number,
            $this->start_date,$this->care_place));
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Your demande has been sent Successfully!!
                        If you don't recieve a confirmation email from {$this->user->name} for '1h', So find other {$this->user->specialty}!!"
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
    
    
    
    public function cleanVars()
    {
        $this->user_id = '';
        $this->related_id ='';
        $this->related_name ='';
        $this->related_email ='';
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
}