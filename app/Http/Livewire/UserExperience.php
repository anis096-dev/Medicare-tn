<?php

namespace App\Http\Livewire;

use App\Models\Experience;
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
        Experience::create($this->modelData());
        $this->modalFormVisible = false;
        $this->reset();
    }

    /**
     * The read function.
     *
     * @return void
     */
    public function read()
    {
        return Experience::paginate(5);
    }

    /**
     * The update function
     *
     * @return void
     */
    public function update()
    {
        $this->validate();
        Experience::find($this->modelId)->update($this->modelData());
        $this->modalFormVisible = false;
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
        return view('livewire.user-experience', [
            'data' => $this->read(),
        ]);
    }
}
