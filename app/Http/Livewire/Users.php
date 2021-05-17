<?php

namespace App\Http\Livewire;

use App\Models\Rating;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;
    
    public $modalFormVisible;
    public $modalConfirmDeleteVisible;
    public $modelId;
    public $selectedUsers = [];
    public $selectAll = false;
    public $bulkDisabled = true;


    /**
     * Put your custom public properties here!
     */
    public $perPage = 10;
    public $search = '';

    public $user;
    public $role;
    public $specialty;
    public $name;
    public $email;

    /**
     * The validation rules
     *
     * @return void
     */
    public function rules()
    {
        return [
            'role' => 'required',
            'specialty' => 'required_if:role,E-health Care|string',
            'name' => 'required',
            'email' => 'required',
        ];
    }
    
    /**
     * mount
     *
     * @param  mixed $id
     * @return void
     */
    public function show (User $user)
    {   
        if ($user->role == 'E-health Care') {
            # code...
            $avgrating = Rating::all()->where('related_id', $user->id );
            return view('livewire.show-profile',compact('user', 'avgrating'));
        }
        else 
        {
            return \redirect('dashboard');
        }
    }

    /**
     * Loads the model data
     * of this component.
     *
     * @return void
     */
    public function loadModel()
    {
        $data = User::find($this->modelId);
        $this->role = $data->role;
        $this->specialty = $data->specialty;
        $this->name = $data->name;
        $this->email = $data->email;
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
            'role' => $this->role,
            'specialty' => $this->specialty,
            'name' => $this->name,
            'email'=> $this->email,
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
        User::create($this->modelData());
        $this->modalFormVisible = false;
        $this->reset();
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
            User::find($this->modelId)->update($this->modelData());
            $this->modalFormVisible = false;
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Your E-health Care updated Successfully!!"
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
        User::destroy($this->modelId);
        $this->modalConfirmDeleteVisible = false;
        $this->dispatchBrowserEvent('alert',[
            'type'=>'error',
            'message'=>"Your E-health Care deleted Successfully!!"
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
        User::query()
        ->whereIn('id', $this->selectedUsers)
        ->delete();
        $this->selectedUsers = [];
        $this->selectAll = false;
        $this->dispatchBrowserEvent('alert',[
            'type'=>'error',
            'message'=>"all selected Items deleted Successfully!!"
        ]);
        $this->resetPage();
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
            $this->selectedUsers = User::pluck('id');
        }else{
            $this->selectedUsers = [];
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
            ['type' => 'info',  
            'message' => 'Search by Name, Email & phone or Specialty!'
            ]);
    }

    public function render()
    {  
        $this->bulkDisabled = count($this->selectedUsers) < 1;
        return view('livewire.users', [
            'data' => User::search($this->search)
            ->paginate($this->perPage),
        ]);
    }
}