<?php

namespace App\Http\Livewire;

use App\Models\TimeSetting;
use Livewire\Component;
use Livewire\WithPagination;

class UserTimeSettings extends Component
{
    use WithPagination;
    
    public $user_id;
    public $day;
    public $time1;
    public $time2;
    public $modalFormVisible;
    public $modalConfirmDeleteVisible;
    public $modelId;
    public $selectedTimes = [];
    public $selectAll = false;
    public $bulkDisabled = true;

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
            'day' => 'required',
            'time1'    => 'required',
            'time2' => 'required',
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
        $data = TimeSetting::find($this->modelId);
        // Assign the variables here
        $this->user_id = auth()->user()->id;
        $this->day = $data->day;
        $this->time1 = $data->time1;
        $this->time2 = $data->time2;
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
            'day' => $this->day,
            'time1' => $this->time1,
            'time2' => $this->time2,
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
            TimeSetting::create($this->modelData());
            $this->modalFormVisible = false;
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Your Time created Successfully!!"
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
        // return TimeSetting::paginate(5);
        return TimeSetting::all();
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
            TimeSetting::find($this->modelId)->update($this->modelData());
            $this->modalFormVisible = false;
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Your Time updated Successfully!!"
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
        TimeSetting::destroy($this->modelId);
        $this->modalConfirmDeleteVisible = false;
        $this->dispatchBrowserEvent('alert',[
            'type'=>'error',
            'message'=>"Your Time deleted Successfully!!"
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
        TimeSetting::query()
        ->whereIn('id', $this->selectedTimes)
        ->delete();
        $this->selectedTimes = [];
        $this->selectAll = false;
        $this->resetPage();
        $this->dispatchBrowserEvent('alert',[
            'type'=>'error',
            'message'=>"all selected Items deleted Successfully!!"
        ]);
    }

    public function updatedSelectAll($value)
    {
        if($value){
            $this->selectedTimes = TimeSetting::pluck('id');
        }else{
            $this->selectedTimes = [];
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

    public function render()
    {
        $this->bulkDisabled = count($this->selectedTimes) < 1;
        return view('livewire.user-time-settings', [
            'data' => $this->read(),
        ]);
    }
}