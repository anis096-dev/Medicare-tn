<div class=" mt-3">
    @if (count($images)) 
        @foreach ($images as $item)
        <div class="inline-flex">
            <img width="400px" src={{ url('storage/images/'. $item->image)}} /> <br/><br/>
        </div>  
        @endforeach
        <br>
        <div class="grid grid-cols-2 lg:grid-cols-3 gap-x-4 lg:gap-x-8 gap-y-6 sm:gap-y-8 lg:gap-y-12">
            <x-jet-secondary-button type="button" class="justify-center h-16 font-bold hover:bg-green-200" wire:click="confirmUser({{ $item->id }})" onclick="confirm('Are you sure?') || event.stopImmediatePropagation()">
                {{ __('Confirm Health Specialist') }}
            </x-jet-secondary-button>
            <x-jet-secondary-button type="button" class="flex justify-center h-16 font-bold hover:bg-red-200" wire:click="deletePhotos({{ $item->id }})" onclick="confirm('Are you sure?') || event.stopImmediatePropagation()">
                {{ __('Remove Photos') }}
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
            </x-jet-secondary-button>
        </div>
    @else
        <p> No additional photos for this user </p>
    @endif
</div>