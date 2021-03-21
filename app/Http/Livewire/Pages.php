<?php

namespace App\Http\Livewire;

use App\Models\Page;
use Illuminate\Support\Str; 
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class Pages extends Component
{   
    use WithPagination;
    public $modalFormVisible = false;
    public $modalConfirmDeleteVisible = false;
    public $modelId;
    public $title;
    public $slug;
    public $content;
    public $isSetToDefaultHomePage;
    public $isSetToDefaultNotFoundPage;
        
    /**
     * The validations rules.
     *
     * @return void
     */
    public function rules()
    {
        return[
            'title' => 'required',
            'slug'  => ['required', Rule::unique('pages', 'slug')->ignore($this->modelId)],
            'content' => 'required',
        ];
    }
    
    /**
     * The livewire mount function.
     *
     * @return void
     */
    public function mount()
    {   
        // reset the pagination after reloading the page.
        $this->resetPage();
    }

     /**
     * The create function.
     *
     * @return void
     */
    public function create()
    {
        $this->validate();
        $this->unassignDefaultHomePage();
        $this->unassignDefaultNotFoundPage();
        Page::create($this->modelData());
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
        return Page::paginate(5);
    }
        
    /**
     * update function.
     *
     * @return void
     */
    public function update()
    {
        $this->validate();
        $this->unassignDefaultHomePage();
        $this->unassignDefaultNotFoundPage();
        Page::find($this->modelId)->update($this->modelData());
        $this->modalFormVisible = false;
    }
    
    /**
     * delete function.
     *
     * @return void
     */
    public function delete()
    {
        page::destroy($this->modelId);
        $this->modalConfirmDeleteVisible = false;
        $this->resetPage();
    }

    /**
     * Runs everytime the title
     * variable is updated.
     *
     * @param  mixed $value
     * @return void
     */
    public function updatedTitle($value)
    {
        $this->slug = Str::slug($value);
    }
    
    /**
     * updatedIsSetToDefaultHomePage
     *
     * @return void
     */
    public function updatedIsSetToDefaultHomePage()
    {
        $this->isSetToDefaultNotFoundPage = null;
    }    

    /**
     * updatedIsSetToDefaultNotFoundPage
     *
     * @return void
     */
    public function updatedIsSetToDefaultNotFoundPage()
    {
        $this->isSetToDefaultHomePage = null;
    }

    
    /**
     * Show the form modal 
     * of the create function.
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
     * Show the form modal 
     * of the update function.
     *
     * @return void
     */
    public function updateShowModal($id)
    {
        $this->resetValidation();
        $this->reset();
        $this->modelId = $id;
        $this->modalFormVisible = true;
        $this->loadModel();
    }
    
    /**
     * Show the delete confirmation modal.
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
     * load the Model data 
     * of this component.
     *
     * @return void
     */
    public function loadModel()
    {
        $data = Page::find($this->modelId);
        $this->title = $data->title;
        $this->slug = $data->slug;
        $this->content = $data->content;
        $this->isSetToDefaultHomePage = !$data->is_default_home ? null:true;
        $this->isSetToDefaultNotFoundPage = !$data->is_default_not_found ? null:true;
    }
    
    /**
     * modelData mapped in this component.
     *
     * @return void
     */
    public function modelData()
    {
        return [
            'title'   => $this->title,
            'slug'    => $this->slug,
            'content' => $this->content,
            'is_default_home' => $this->isSetToDefaultHomePage,
            'is_default_not_found' => $this->isSetToDefaultNotFoundPage,
        ];
    }
    
    /**
     * Unassigns the default home page in the database table
     *
     * @return void
     */
    private function unassignDefaultHomePage()
    {
        if ($this->isSetToDefaultHomePage != null) {
            Page::where('is_default_home', true)->update([
                'is_default_home' => false,
            ]);
        }
    }

    /**
     * Unassigns the default 404 page in the database table
     *
     * @return void
     */
    private function unassignDefaultNotFoundPage()
    {
        if ($this->isSetToDefaultNotFoundPage != null) {
            Page::where('is_default_not_found', true)->update([
                'is_default_not_found' => false,
            ]);
        }
    }
        
    /**
     * The livewire render function.
     *
     * @return void
     */
    public function render()
    {
        return view('livewire.pages', [
            'data' => $this->read(),
        ]);
    }
}
