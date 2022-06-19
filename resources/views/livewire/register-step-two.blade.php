<div class="container mx-auto px-4">
    <form wire:submit.prevent="save">   
        @if (session()->has('success'))
            <script>
                setTimeout(function() {
                window.location.href = "/"
                }, 6000); // 6 second
            </script>
        @endif

        @if(auth()->user()->role == 'Health specialist')
            <div class="mt-4">
                <x-jet-label for="bio" value="{{ __('Bio') }}" />
                <textarea id="bio" wire:model="bio" name="bio" class="lg:h-40 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" type="text" placeholder="Something about you....!"></textarea>
                @error('bio') <span class="error">{{ $message }}</span> @enderror            
            </div>
            
            <div class="mt-4">
            <x-jet-label for="specialty" value="{{ __('Specialty') }}"/>
                <select id="specialty" wire:model="specialty" name="specialty" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md">
                    <option value="">{{__('-- Select a specialty --')}}</option>    
                @foreach ($specialties as $item)
                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                @endforeach
                </select>
            @error('specialty') <span class="error">{{ $message }}</span> @enderror
            </div>
        @endif

            <div class="mt-4">
            <x-jet-label for="governorate_id" value="{{ __('Governorate') }}"/>
                <select id="governorate_id" wire:model="governorate_id" wire:change="getDelegationsByGovernorateId" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md select2">
                    <option value="">{{__('--governorate--')}}</option>
                    @forelse ($governorates as $governorate)
                        <option value="{{ $governorate['id'] }}">{{ $governorate['name'] }}</option>
                    @empty
        
                    @endforelse
                </select>
            @error('governorate_id') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
            <x-jet-label for="delegation_id" value="{{ __('Delegation') }}"/>
                <select id="delegation_id" wire:model="delegation_id" wire:change="getLocationsByDelegationId" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md select2">
                    <option value="">{{__('--delegation--')}}</option>
                    @forelse ($delegations as $delegation)
                        <option value="{{ $delegation['id'] }}">{{ $delegation['name'] }}</option>
                    @empty
        
                    @endforelse
                </select>
            @error('delegation_id') <span class="error">{{ $message }}</span> @enderror
            </div>
    
            <div class="mt-4">
            <x-jet-label for="location_id" value="{{ __('Location') }}"/>
                <select id="location_id" wire:model="location_id" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md select2">
                    <option value="">{{__('--location--')}}</option>
                    @forelse ($locations as $location)
                        <option value="{{ $location['id'] }}">{{ $location['name'] }}</option>
                    @empty
        
                    @endforelse
                </select>
            @error('location_id') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="flex justify-center">
                <x-jet-secondary-button type="submit" class="mt-4 text-gray-500 text-center font-bold hover:bg-blue-200">
                    {{ __('Continue') }}
                    <div wire:loading wire:target="save">
                        <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-6 w-6 text-gray-600 animate-spin" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                    </div>
                </x-jet-secondary-button>  
            </div>
    </form>
</div>