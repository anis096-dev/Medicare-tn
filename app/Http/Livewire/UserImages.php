<?php

namespace App\Http\Livewire;

use App\Models\Image;
use Livewire\Component;

class UserImages extends Component
{
    public $userId;

    protected $listeners = [
        'getUserId',
    ];

    public function getUserId($userId)
    {
        $this->userId = $userId;
    }

    public function render()
    {
        return view('livewire.user-images', [
            'images' => Image::where('user_id', '=', $this->userId)->get()
        ]);
    }
}
