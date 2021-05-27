<?php

namespace App\Http\Livewire;

use App\Models\Message;
use Livewire\Component;
use Livewire\WithPagination;

class ContactsFromWebsite extends Component
{
    use WithPagination;

    public $name;
    public $email;
    public $message;
    public $selectedContacts = [];
    public $selectAll = false;
    public $bulkDisabled = true;
    public $perPage = 10;
    public $search = '';

    /**
    * The Selecteddelete function.
    *
    * @return void
    */
    public function deleteSelected()
    {
        Message::query()
        ->whereIn('id', $this->selectedContacts)
        ->delete();
        $this->selectedContacts = [];
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
            $this->selectedContacts = Message::pluck('id');
        }else{
            $this->selectedContacts = [];
        }
        
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
                ['type' => 'info',  'message' => 'Search by name or email!']);
    }

    public function render()
    {
        $this->bulkDisabled = count($this->selectedContacts) < 1;
        return view('livewire.contacts-from-website', [
            'data' => Message::search($this->search)
            ->latest()
            ->paginate($this->perPage),
            ]);
    }
}
