<?php

namespace App\Http\Livewire;

use App\Models\Specialty;
use Livewire\Component;
use Livewire\WithPagination;

class Specialties extends Component
{
    use WithPagination;
    
    public $modalFormVisible;
    public $modalConfirmDeleteVisible;
    public $modelId;
    public $selectedSpecialties = [];
    public $selectAll = false;
    public $bulkDisabled = true;
    public $perPage = 10;
    public $search = '';

    /**
     * Put your custom public properties here!
     */
    public $name;
    public $description;
    /**
     * The validation rules
     *
     * @return void
     */
    public function rules()
    {
        return [   
            'name' => 'required',          
            'description' => ['required', 'max:255'],          
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
        $data = Specialty::find($this->modelId);
        // Assign the variables here
        $this->name = $data->name;
        $this->description = $data->description;
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
            Specialty::create($this->modelData());
            $this->modalFormVisible = false;
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Your Specialty created Successfully!!"
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
     * The update function
     *
     * @return void
     */
    public function update()
    {
        $this->validate();
        try{
            Specialty::find($this->modelId)->update($this->modelData());
            $this->modalFormVisible = false;
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Your Specialty updated Successfully!!"
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
        Specialty::destroy($this->modelId);
        $this->modalConfirmDeleteVisible = false;
        $this->dispatchBrowserEvent('alert',[
            'type'=>'error',
            'message'=>"Your Specialty deleted Successfully!!"
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
        Specialty::query()
        ->whereIn('id', $this->selectedSpecialties)
        ->delete();
        $this->selectedSpecialties = [];
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
            $this->selectedSpecialties = Specialty::pluck('id');
        }else{
            $this->selectedSpecialties = [];
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
                ['type' => 'info',  'message' => 'Search by Name!']);
    }

    public function render()
    {
        $this->bulkDisabled = count($this->selectedSpecialties) < 1;
        return view('livewire.specialties', [
            'data' => Specialty::search($this->search)
            ->paginate($this->perPage),
        ]);
    }
}
