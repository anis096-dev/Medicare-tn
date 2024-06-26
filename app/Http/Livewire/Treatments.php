<?php

namespace App\Http\Livewire;

use App\Models\Treatment;
use Livewire\Component;
use Livewire\WithPagination;

class Treatments extends Component
{
    use WithPagination;
    
    public $modalFormVisible;
    public $modalConfirmDeleteVisible;
    public $modelId;
    public $selectedTreatments = [];
    public $selectAll = false;
    public $bulkDisabled = true;
    public $perPage = 10;
    public $search = '';

    /**
     * Put your custom public properties here!
     */
    public $name;
    public $description;
    public $specialty;
    public $price_day;
    public $price_night;
    public $price_weekend;
    /**
     * The validation rules
     *
     * @return void
     */
    public function rules()
    {
        return [   
            'name' => ['required', 'max:255'],          
            'description' => ['required', 'max:255'],  
            'specialty' => 'required',          
            'price_day' => 'required',          
            'price_night' => 'required',          
            'price_weekend' => 'required',          
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
        $data = Treatment::find($this->modelId);
        // Assign the variables here
        $this->name = $data->name;
        $this->description = $data->description;
        $this->specialty = $data->specialty;
        $this->price_day = $data->price_day;
        $this->price_night = $data->price_night;
        $this->price_weekend = $data->price_weekend;
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
            'name' => $this->name,         
            'description' => $this->description, 
            'specialty' => $this->specialty,          
            'price_day' => $this->price_day,          
            'price_night' => $this->price_night,          
            'price_weekend' => $this->price_weekend,          
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
            Treatment::create($this->modelData());
            $this->modalFormVisible = false;
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Your Treatment created Successfully!!"
            ]);
    
            // Reset Form Fields After Creating Category
            $this->reset();
            }
            catch(\Exception $e){
            // Set Flash Message
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something goes wrong!!"
            ]);
            $this->reset();
        }
    }

    /**
     * The read function.
     *
     * @return void
     */
    public function read()
    {
        return Treatment::paginate(5);
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
            Treatment::find($this->modelId)->update($this->modelData());
            $this->modalFormVisible = false;
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Your Treatment updated Successfully!!"
            ]);
    
            }
            catch(\Exception $e){
            // Set Flash Message
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something goes wrong!!"
            ]);
        }
    }

    /**
     * The delete function.
     *
     * @return void
     */
    public function delete()
    {
        Treatment::destroy($this->modelId);
        $this->modalConfirmDeleteVisible = false;
        $this->dispatchBrowserEvent('alert',[
            'type'=>'error',
            'message'=>"Your Treatment deleted Successfully!!"
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
        Treatment::query()
        ->whereIn('id', $this->selectedTreatments)
        ->delete();
        $this->selectedTreatments = [];
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
            $this->selectedTreatments = Treatment::pluck('id');
        }else{
            $this->selectedTreatments = [];
        }
        
    }

    /**
     * Shows the create modal
     *
     * @return void
     */
    public function createShowModal()
    {
        $this->resetValidation();
        $this->reset();
        $this->modalFormVisible = true;
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
        $this->resetValidation();
        $this->reset();
        $this->modalFormVisible = true;
        $this->modelId = $id;
        $this->loadModel();
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
                ['type' => 'info',  'message' => 'Search by name or specialty!']);
    }

    /**
     * The livewire render function.
     *
     * @return void
     */
    public function render()
    {
        $this->bulkDisabled = count($this->selectedTreatments) < 1;
        return view('livewire.treatments', [
            'data' => Treatment::search($this->search)
            ->paginate($this->perPage),
        ]);
    }
}
