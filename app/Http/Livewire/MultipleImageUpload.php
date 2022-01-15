<?php

namespace App\Http\Livewire;

use App\Models\Image;
use Livewire\Component;
use Livewire\WithFileUploads;

class MultipleImageUpload extends Component
{
    use WithFileUploads;     
    public $images = [];

    public function save()
    {
        $this->validate([
            'images' => 'required|array|max:2',
            'images.*' => 'image|mimes:jpeg,jpg,png|max:2048', // 2MB Max
        ]);

         // Uploads the images
         if (!empty($this->images)) {
            foreach ($this->images as $photo) {
                $photo->store('public/images');

                // Save the filename in the additional_photos table
                Image::create([
                    'user_id' => auth()->id(),
                    'image' => $photo->hashName()
                ]);
                $this->dispatchBrowserEvent('alert',[
                    'message'=>"Images has been successfully Uploaded.
                    We will make sure that the information is correct. Then you will be notified"
                ]);
            }
        }
        session()->flash('success');
        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.multiple-image-upload');
    }
}