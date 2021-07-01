<div>
    @if(auth()->user()->id != $user->id)
        <a wire:click="createShowModal" class="text-center items-center justify-end bg-blue-700 text-white px-14 py-3 sm:px-20
        rounded-md text-sm uppercase hover:shadow hover:bg-blue-500">
            {{__('Appoint')}}
        </a> 
    @endif

    {{-- Modal Form --}}
    <x-jet-dialog-modal wire:model="modalFormVisible">
        <x-slot name="title">
            {{ __('Appointment') }}
        </x-slot>

        <x-slot name="content">
            <div class="mt-4 space-y-2">
                <x-jet-label for="treatment" value="{{ __('Treatment') }}" />
                <select wire:model="treatment" class="w-full border border-gray-300 text-gray-600 h-14 mr-1 rounded bg-white hover:border-gray-400 focus:outline-none appearance-none">
                    <option value="">-- Select a Treatment --</option>    
                    @foreach ($allTreatments->where('specialty', $user->specialty) as $item)
                        <option value="{{ $item->name }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                @error('treatment') <span class="error">{{ $message }}</span> @enderror
            </div>
           
            <div class="mt-4 space-y-2">
                <x-jet-label for="sub_treatment" value="{{ __('Sub Treatment') }}" />
                <select wire:model="sub_treatment" class="w-full border border-gray-300 text-gray-600 h-14 mr-1 rounded bg-white hover:border-gray-400 focus:outline-none appearance-none">
                    <option value="">-- Select a Sub Treatment --</option>    
                    @forelse ($allSubTreatments->where('treatment', $treatment) as $item)
                        <option value="{{ $item->name }}">{{ $item->name }}</option>  
                    @empty
                        <option value="{{'empty'}}">Empty!!</option>  
                    @endforelse
                </select>
                @error('sub_treatment') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4 space-y-2">
                <x-jet-label for="passage_number" value="{{ __('Passage Nbr') }}" />
                <select wire:model="passage_number" class="w-full border border-gray-300 text-gray-600 h-14 mr-1 rounded bg-white hover:border-gray-400 focus:outline-none appearance-none">
                    <option value="">-- Select a nbr of passage --</option>    
                    @foreach (App\Models\Appointment::passage_nbr() as $item)
                        <option value="{{ $item }}">{{ $item }}</option>
                    @endforeach
                </select>
                @error('passage_number') <span class="error">{{ $message }}</span> @enderror
            </div>
                 
            <div class="mt-4 space-y-2">
                <div class="flex text-left ml-6">
                    <div class="w-1/2">
                        <div class="flex mb-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                            </svg>
                            <x-jet-label for="certificate" value="{{ __('Certificate') }}" />
                        </div>
                        <label class="inline-flex items-center">
                            <input wire:model="certificate" type="radio" class="form-radio" name="certificate" id="certificate" value="Yes">
                            <span class="ml-2  text-sm">Yes</span>
                        </label>
                        <label class="inline-flex items-center ml-6">
                            <input  wire:model="certificate" type="radio" class="form-radio" name="certificate" id="certificate" value="No">
                            <span class="ml-2  text-sm">No</span>
                        </label>
                        @error('certificate') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="w-1/2">
                        <div class="flex mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <x-jet-label for="home_mention" value="{{ __('Home mention') }}" />
                        </div>
                        <label class="inline-flex items-center">
                            <input wire:model="home_mention" type="radio" class="form-radio" name="home_mention" id="home_mention" value="Yes">
                            <span class="ml-2  text-sm">Yes</span>
                        </label>
                        <label class="inline-flex items-center ml-6">
                            <input wire:model="home_mention" type="radio" class="form-radio" name="home_mention" id="home_mention" value="No">
                            <span class="ml-2  text-sm">No</span>
                        </label>
                        @error('home_mention') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <div class="mt-4 space-y-2">
                <x-jet-label  for="start_date" value="{{ __('Start Date // Duration') }}" />
                <div class="flex">
                    <x-jet-input wire:model="start_date" id="start_date" class=" w-1/2 border border-gray-300 text-gray-600 h-14 mr-1 rounded bg-white hover:border-gray-400 focus:outline-none appearance-none" type="date" />
                    @error('start_date') <span class="error">{{ $message }}</span> @enderror
                
                    <select wire:model="duration" class=" w-1/2 border border-gray-300 text-gray-600 h-14 mr-1 rounded bg-white hover:border-gray-400 focus:outline-none appearance-none">
                        <option value="">-- Select a period (day) --</option>    
                        @foreach (App\Models\Appointment::duration() as $item)
                            <option value="{{ $item }}">{{ $item }}</option>
                        @endforeach
                    </select>
                    @error('duration') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            
            <div class="mt-4 space-y-2">
                <x-jet-label for="user_dispo" value="{{ __('Disponibility/Day') }}" />
                <div class="flex">
                    <x-jet-input wire:model="user_dispo" id="user_dispo" class=" w-1/2 border border-gray-300 text-gray-600 h-14 mr-1 rounded bg-white hover:border-gray-400 focus:outline-none appearance-none" type="time"/>
                    @error('user_dispo') <span class="error">{{ $message }}</span> @enderror
                    <x-jet-input wire:model="user_dispo2" id="user_dispo2" class=" w-1/2 border border-gray-300 text-gray-600 h-14 mr-1 rounded bg-white hover:border-gray-400 focus:outline-none appearance-none" type="time"/>
                    @error('user_dispo2') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="mt-4 space-y-2">
                <x-jet-label for="care_place" value="{{ __('Care Place') }}" />
                <select wire:model="care_place" class=" w-full border border-gray-300 text-gray-600 h-14 mr-1 rounded bg-white hover:border-gray-400 focus:outline-none appearance-none">
                    <option value="">-- Select a care place --</option>    
                    @foreach (App\Models\Appointment::careplace() as $item)
                        <option value="{{ $item }}">{{ $item }}</option>
                    @endforeach
                </select>
                @error('care_place') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4 space-y-2 text-left ml-6">
                <div class="flex">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.618 5.984A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016zM12 9v2m0 4h.01" />
                    </svg>
                    <x-jet-label class="text-red-500 font-bold" for="covid_symptom" value="{{ __('Covid Symptom') }}" />
                </div>    
                <label class="inline-flex items-center">
                <input  wire:model="covid_symptom" type="radio" class="form-radio" name="covid_symptom" id="covid_symptom" value="Yes">
                <span class="ml-2 text-sm">Yes</span>
                </label>
                <label class="inline-flex items-center ml-6">
                <input  wire:model="covid_symptom" type="radio" class="form-radio" name="covid_symptom" id="covid_symptom" value="No">
                <span class="ml-2 text-sm">No</span>
                </label>
                @error('covid_symptom') <span class="error">{{ $message }}</span> @enderror
            </div>

        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalFormVisible')" wire:loading.attr="disabled">
                {{ __('Nevermind') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2 bg-indigo-400 border-none" wire:click="create" wire:loading.attr="disabled">
                {{ __('Appoint') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>