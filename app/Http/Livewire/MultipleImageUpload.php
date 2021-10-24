<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Image;

class MultipleImageUpload extends Component
{
    use WithFileUploads;
 
    public $images = [];

    public function save()
    {
        $this->validate([
            'images' => 'required|array|max:3',
            'images.*' => 'image|mimes:jpeg,jpg,png|max:2048', // 1MB Max
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
            }
        }
 
        session()->flash('success', 'Images has been successfully Uploaded.');
 
        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.multiple-image-upload');
    }
}