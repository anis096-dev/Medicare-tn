<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile information and email address.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                            wire:model="photo"
                            x-ref="photo"
                            x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-jet-label for="photo" value="{{ __('Photo') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview">
                    <span class="block rounded-full w-20 h-20"
                          x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
                </x-jet-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Remove Photo') }}
                    </x-jet-secondary-button>
                @endif

                <x-jet-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Name') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" autocomplete="name" />
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('Email') }}" />
            <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" />
            <x-jet-input-error for="email" class="mt-2" />
        </div>

        {{-- Phone --}}
        <div class="flex col-span-6 sm:col-span-4">
            <span class=" bg-blue-50 rounded-md rounded-r-none py-3 mt-1 block w-full text-center font-bold text-yellow-600">
                {{$this->user->tel}}
            </span>
            <a href="{{ route('add-phone') }}">
                <x-jet-secondary-button class="mt-1 block rounded-l-none w-full" type="button">
                    {{ __('Update phone') }}
                </x-jet-secondary-button>
            </a>
        </div>

        {{-- bio --}}
        @if(auth()->user()->role == 'Health specialist')
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="bio" value="{{ __('Bio') }}" />
            <textarea id="bio" wire:model.defer="state.bio" class="lg:h-40 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" type="text" name="bio"></textarea>
            <x-jet-input-error for="bio" class="mt-2" />
        </div>
        @endif

        {{-- Governorate --}}
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="Governorate" value="{{ __('Governorate') }}"/>
            <select id="Governorate" name="Governorate" wire:model.defer="state.Governorate" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md">
            @foreach (App\Models\User::governorates() as $item)
                <option value="{{ $item }}">{{ $item }}</option>
            @endforeach
            </select>
            <x-jet-input-error for="Governorate" class="mt-2" />
        </div>
       
        {{-- adresse --}}
        <div class="col-span-6 sm:col-span-4">
            <div>
                @if(auth()->user()->role == 'E-health Care') 
                <x-jet-label for="adresse" value="{{ __('Adresse or Cabinet Adresse') }}" />
                @else
                <x-jet-label for="adresse" value="{{ __('Adresse') }}" />
                @endif
                <span class="font-bold text-xs text-yellow-600">{{__('If you do not find your address, try in Arabic or please enter your own adress!!')}}</span>
                <x-jet-input id="adresse" type="search" class="mt-1 block w-full" wire:model.defer="state.adresse" />
                <x-jet-input-error for="adresse" class="mt-2" />
            </div>
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>   
</x-jet-form-section>