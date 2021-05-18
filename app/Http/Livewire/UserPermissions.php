<?php

namespace App\Http\Livewire;

use App\Models\UserPermission;
use Livewire\Component;
use Livewire\WithPagination;

class UserPermissions extends Component
{
    use WithPagination;

    public $modalFormVisible;
    public $modalConfirmDeleteVisible;
    public $modelId;
    public $selectedPermissions = [];
    public $selectAll = false;
    public $bulkDisabled = true;
    public $perPage = 10;
    public $search = '';

    /**
     * Put your custom public properties here!
     */
    public $role;
    public $routeName;

    /**
     * The validation rules
     *
     * @return void
     */
    public function rules()
    {
        return [
            'role' => 'required',
            'routeName' => 'required',
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
        $data = UserPermission::find($this->modelId);
        // Assign the variables here
        $this->role = $data->role;
        $this->routeName = $data->route_name;
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
            'route_name' => $this->routeName,
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
            UserPermission::create($this->modelData());
            $this->modalFormVisible = false;
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Your Permission created Successfully!!"
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
            UserPermission::find($this->modelId)->update($this->modelData());
            $this->modalFormVisible = false;
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Your Permission updated Successfully!!"
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
        UserPermission::destroy($this->modelId);
        $this->modalConfirmDeleteVisible = false;
        $this->dispatchBrowserEvent('alert',[
            'type'=>'error',
            'message'=>"Your Permission deleted Successfully!!"
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
        UserPermission::query()
        ->whereIn('id', $this->selectedPermissions)
        ->delete();
        $this->selectedPermissions = [];
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
            $this->selectedPermissions = UserPermission::pluck('id');
        }else{
            $this->selectedPermissions = [];
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
                ['type' => 'info',  'message' => 'Search by role & route name!']);
    }

    public function render()
    {
        $this->bulkDisabled = count($this->selectedPermissions) < 1;
        return view('livewire.user-permissions', [
            'data' => UserPermission::search($this->search)
            ->paginate($this->perPage),
        ]);
    }
}