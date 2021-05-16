<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\WithPagination;
use App\Models\NavigationMenu;

class NavigationMenus extends Component
{
    use WithPagination;

    public $modalFormVisible;
    public $modalConfirmDeleteVisible;
    public $modelId;
    public $selectedNavigationMenus = [];
    public $selectAll = false;
    public $bulkDisabled = true;
    public $label;
    public $slug;
    public $sequence = 1;
    public $type = 'SidebarNav';

    /**
     * The validation rules
     *
     * @return void
     */
    public function rules()
    {
        return [
            'label' => 'required',
            'slug' => 'required',
            'sequence' => ['required', Rule::unique('pages', 'slug')->ignore($this->modelId)],
            'type' => 'required',
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
        $data = NavigationMenu::find($this->modelId);
        $this->label = $data->label;
        $this->slug = $data->slug;
        $this->type = $data->type;
        $this->sequence = $data->sequence;
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
            'label' => $this->label,
            'slug' => $this->slug,
            'sequence' => $this->sequence,
            'type' => $this->type,
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
        NavigationMenu::create($this->modelData());
        $this->modalFormVisible = false;
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Your NavigationMenu created Successfully!!"
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
        return NavigationMenu::paginate(5);
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
            NavigationMenu::find($this->modelId)->update($this->modelData());
            $this->modalFormVisible = false;
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Your NavigationMenu updated Successfully!!"
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
        NavigationMenu::destroy($this->modelId);
        $this->modalConfirmDeleteVisible = false;
        $this->dispatchBrowserEvent('alert',[
            'type'=>'error',
            'message'=>"Your NavigationMenu deleted Successfully!!"
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
        NavigationMenu::query()
        ->whereIn('id', $this->selectedNavigationMenus)
        ->delete();
        $this->selectedNavigationMenus = [];
        $this->selectAll = false;
        $this->dispatchBrowserEvent('alert',[
            'type'=>'error',
            'message'=>"all selected Items deleted Successfully!!"
        ]);
    }

    public function updatedSelectAll($value)
    {
        if($value){
            $this->selectedNavigationMenus = NavigationMenu::pluck('id');
        }else{
            $this->selectedNavigationMenus = [];
        }
        
    }

    /**
     * Runs everytime the title
     * variable is updated.
     *
     * @param  mixed $value
     * @return void
     */
    public function updatedLabel($value)
    {
        $this->slug = Str::slug($value);
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
        $this->bulkDisabled = count($this->selectedNavigationMenus) < 1;
        return view('livewire.navigation-menus', [
            'data' => $this->read(),
        ]);
    }
}
