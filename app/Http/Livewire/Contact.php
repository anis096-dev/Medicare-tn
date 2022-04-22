<?php

namespace App\Http\Livewire;

use App\Mail\ContactFromWebsite;
use App\Models\Message;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class Contact extends Component
{
    public $name = '';
    public $email= '';
    public $message= '';

    protected $rules = [
        'name' => 'required|min:6',
        'email' =>'required|email',
        'message' => 'required|min:15|max:255',
    ];

    protected $messages = [
        'name.required' => 'Your name is required!!',
        'name.min' => 'Your name is too short!!',
        'email.required' => 'Your email is required!!',
        'email.email' => 'Hmm this is not a valid email!!',
        'message.required' => 'Tell us how we can help you!!',
        'message.min' => 'Your message is too short!!',
        'message.max' => 'Your message is too long!!',
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function saveMessage(){
        $this->validate();
        Message::create([
            'name' => $this->name,
            'email' => $this->email,
            'message' => $this->message,
        ]);
        Mail::to('admin@medicare.tn')->send(new ContactFromWebsite($this->name, $this->email, $this->message));

        $this->name = '';
        $this->email= '';
        $this->message= '';
        
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"You message has been sent Successfully!! Thank You for contacting us!!"
        ]);
    }

    public function render()
    {
        return view('livewire.contact');
    }
}
