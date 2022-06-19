<x-jet-form-section submit="save">
    <x-slot name="title">
        {{ __('Adress Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your Adress information.') }}
    </x-slot>

    <x-slot name="form">
        <div class="mt-4 col-span-6 sm:col-span-4">
            <x-jet-label for="governorate_id" value="{{ __('Governorate') }}"/>
            <span class="mt-1 font-bold text-sm text-blue-500">{{auth()->user()->governorate->name}}</span>
            <select id="governorate_id" wire:model="governorate_id" wire:change="getDelegationsByGovernorateId" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md select2">
            <option value="">{{__('--governorate--')}}</option>
            @forelse ($governorates as $governorate)
            <option value="{{ $governorate['id'] }}">{{ $governorate['name'] }}</option>
            @empty

            @endforelse
            </select>
            <x-jet-input-error for="governorate_id" class="mt-2" />
        </div>

        <div class="mt-4 col-span-6 sm:col-span-4">
            <x-jet-label for="delegation_id" value="{{ __('Delegation') }}"/>
            <span class="mt-1 font-bold text-sm text-blue-500">{{auth()->user()->delegation->name}}</span>
            <select id="delegation_id" wire:model="delegation_id" wire:change="getLocationsByDelegationId" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md select2">
            <option value="">{{__('--delegation--')}}</option>
            @forelse ($delegations as $delegation)
            <option value="{{ $delegation['id'] }}">{{ $delegation['name'] }}</option>
            @empty

            @endforelse
            </select>
            <x-jet-input-error for="delegation_id" class="mt-2" />
        </div>

        <div class="mt-4 col-span-6 sm:col-span-4">
            <x-jet-label for="location_id" value="{{ __('Location') }}"/>
            <span class="mt-1 font-bold text-sm text-blue-500">{{auth()->user()->location->name}}</span>
            <select id="location_id" wire:model.defer="location_id" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md select2">
            <option value="">{{__('--location--')}}</option>
            @forelse ($locations as $location)
            <option value="{{ $location['id'] }}">{{ $location['name'] }}</option>
            @empty

            @endforelse
            </select>
            <x-jet-input-error for="location_id" class="mt-2" />
        </div>

    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button>
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>

</x-jet-form-section>