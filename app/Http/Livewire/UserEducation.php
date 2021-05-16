<?php

namespace App\Http\Livewire;

use App\Models\Education;
use Livewire\Component;
use Livewire\WithPagination;

class UserEducation extends Component
{
    use WithPagination;

    /**
     * Put your custom public properties here!
     */
    public $user_id;
    public $formation;
    public $institute;
    public $start_date;
    public $end_date;
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
            'formation' => 'required',
            'institute'    => 'required',
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
        $data = Education::find($this->modelId);
        // Assign the variables here
        $this->user_id = auth()->user()->id;
        $this->formation = $data->formation;
        $this->institute = $data->institute;
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
            'formation' => $this->formation,
            'institute' => $this->institute,
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
            Education::create($this->modelData());
            $this->modalFormVisible = false;
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Your Education level created Successfully!!"
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
        return Education::paginate(5);
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
            Education::find($this->modelId)->update($this->modelData());
            $this->modalFormVisible = false;
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Your Education level updated Successfully!!"
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
        Education::destroy($this->modelId);
        $this->modalConfirmDeleteVisible = false;
        $this->dispatchBrowserEvent('alert',[
            'type'=>'error',
            'message'=>"Your Education level deleted Successfully!!"
        ]);
        $this->resetPage();
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
        return view('livewire.user-education', [
            'data' => $this->read(),
        ]);
    }
}