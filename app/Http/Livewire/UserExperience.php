<?php

namespace App\Http\Livewire;

use App\Models\Experience;
use Exception;
use Livewire\Component;
use Livewire\WithPagination;

class UserExperience extends Component
{
    use WithPagination;
    
    public $user_id;
    public $occupation;
    public $company;
    public $start_date;
    public $end_date;
    public $modalFormVisible;
    public $modalConfirmDeleteVisible;
    public $modelId;
    public $selectedExperiences = [];
    public $selectAll = false;
    public $bulkDisabled = true;
    public $perPage = 10;
    public $search = '';

    /**
     * Put your custom public properties here!
     */

    /**
     * The validation rules
     *
     * @return void
     */
    public function rules()
    {
        return [ 
            'occupation' => 'required',
            'company'    => 'required',
            'start_date' => 'required',
            'end_date'   => 'required',           
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
        $data = Experience::find($this->modelId);
        // Assign the variables here
        $this->user_id = auth()->user()->id;
        $this->occupation = $data->occupation;
        $this->company = $data->company;
        $this->start_date = $data->start_date;
        $this->end_date = $data->end_date;
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
            'occupation' => $this->occupation,
            'company' => $this->company,
            'start_date' => $this->start_date,
            'end_date'=> $this->end_date,       
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
            Experience::create($this->modelData());
            $this->modalFormVisible = false;
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Your Experience created Successfully!!"
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
            Experience::find($this->modelId)->update($this->modelData());
            $this->modalFormVisible = false;
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Your Experience updated Successfully!!"
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
        Experience::destroy($this->modelId);
        $this->modalConfirmDeleteVisible = false;
        $this->dispatchBrowserEvent('alert',[
            'type'=>'error',
            'message'=>"Your Experience deleted Successfully!!"
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
        Experience::query()
        ->whereIn('id', $this->selectedExperiences)
        ->delete();
        $this->selectedExperiences = [];
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
            $this->selectedExperiences = Experience::pluck('id');
        }else{
            $this->selectedExperiences = [];
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
                ['type' => 'info',  'message' => 'Search by occupation or company name!']);
    }

    /**
     * The livewire render function.
     *
     * @return void
     */
    public function render()
    {
        $this->bulkDisabled = count($this->selectedExperiences) < 1;
        return view('livewire.user-experience', [
            'data' => Experience::search($this->search)
            ->paginate($this->perPage),
        ]);
    }
}
