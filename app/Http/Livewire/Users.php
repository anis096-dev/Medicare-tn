<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Rating;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class Users extends Component
{
    use WithPagination;
    
    public $modalFormVisible;
    public $modalConfirmDeleteVisible;
    public $modelId;
    public $selectedUsers = [];
    public $selectAll = false;
    public $bulkDisabled = true;
    public $selectedRole = null;
    public $selectedGender = null;
    


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

    public $images;
    public $selectedItem;
    
    /**
     * The validation rules
     *
     * @return void
     */
    public function rules()
    {
        return [
            'role' => 'required',
            'specialty' => 'required_if:role,Health specialist|string',
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
        if ($user->role == 'Health specialist') {
            # code...
            $avgrating = Rating::all()->where('related_id', $user->id );
            return view('livewire.show-profile',compact('user', 'avgrating'));
        }
        else 
        {
            return \redirect('dashboard');
        }
    }

    public function showPhotos($itemId)
    {
        $this->selectedItem = $itemId;
        // Pass the currently selected item
        $this->emit('getUserId', $this->selectedItem);
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
                'message'=>"Your Health specialist updated Successfully!!"
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
            'message'=>"Your Health specialist deleted Successfully!!"
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
        $this->selectedRole= null;
        $this->selectedGender= null;
        $this->resetPage();
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
            'message' => 'Search by phone number!'
            ]);
    }

    // /**
    //  * Write code on Method
    //  *
    //  * @return response()
    //  */
    // public function adminAlert()
    // {
    //     $this->dispatchBrowserEvent('alert', 
    //         ['type' => 'info',  
    //         'message' => 'Be careful!! Deleting Admin may cause a problem!!'
    //         ]);
    // }


    public function cleanupOldTempImages () {
        $oldFiles = Storage::files('livewire-tmp');
        foreach($oldFiles as $files) {
            Storage::delete($files);
        }
        $this->dispatchBrowserEvent('alert', 
        ['type' => 'info',  
        'message' => 'All temporary photos deleted succefully!'
        ]);
    }

    public function render()
    {  
        $this->bulkDisabled = count($this->selectedUsers) < 1;
        return view('livewire.users', [
            'data' => User::search($this->search)
            ->Where('gender', 'like', '%'.$this->selectedGender.'%')
            ->Where('Role', 'like', '%'.$this->selectedRole.'%')
            ->paginate($this->perPage),
        ]);
    }
}