<div>
    @if(auth()->user()->id != $user->id)
        <a wire:click="createShowModal" class="text-center items-center justify-end bg-blue-700 text-white px-14 py-3 sm:px-20 rounded-md text-sm uppercase 
        hover:shadow hover:bg-blue-500">
            Appoint
        </a> 
    @endif

    {{-- Modal Form --}}
    <x-jet-dialog-modal wire:model="modalFormVisible">
        <x-slot name="title">
            {{ __('Add Appointment') }}
        </x-slot>

        <x-slot name="content">
            <div class="mt-4">
                <x-jet-label for="treatment" value="{{ __('Treatment') }}" />
                <select wire:model="treatment" id="" class="block appearance-none w-full bg-gray-100 border border-gray-200 text-gray-700 py-3 px-4 pr-8 round leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    <option value="">-- Select a Treatment --</option>    
                    @foreach ($allTreatments->where('specialty', $user->specialty) as $item)
                        <option value="{{ $item->name }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                @error('treatment') <span class="error">{{ $message }}</span> @enderror
            </div>
           
            <div class="mt-4">
                <x-jet-label for="sub_treatment" value="{{ __('Sub Treatment') }}" />
                <select wire:model="sub_treatment" id="" class="block appearance-none w-full bg-gray-100 border border-gray-200 text-gray-700 py-3 px-4 pr-8 round leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    <option value="">-- Select a Sub Treatment --</option>    
                    @forelse ($allSubTreatments->where('treatment', $treatment) as $item)
                        <option value="{{ $item->name }}">{{ $item->name }}</option>  
                    @empty
                        <option value="{{'empty'}}">Empty!!</option>  
                    @endforelse
                </select>
                @error('sub_treatment') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <x-jet-label for="passage_number" value="{{ __('Passage Nbr') }}" />
                <select wire:model="passage_number" id="" class="block appearance-none w-full bg-gray-100 border border-gray-200 text-gray-700 py-3 px-4 pr-8 round leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    <option value="">-- Select a nbr of passage --</option>    
                    @foreach (App\Models\Appointment::passage_nbr() as $item)
                        <option value="{{ $item }}">{{ $item }}</option>
                    @endforeach
                </select>
                @error('passage_number') <span class="error">{{ $message }}</span> @enderror
            </div>
                 
            <div class="mt-4">
                <x-jet-label for="certificate" value="{{ __('Certificate') }}" />
                <div class="mt-3">
                    <label class="inline-flex items-center">
                      <input wire:model="certificate" type="radio" class="form-radio" name="certificate" id="certificate" value="Yes">
                      <span class="ml-2">Yes</span>
                    </label>
                    <label class="inline-flex items-center ml-6">
                      <input  wire:model="certificate" type="radio" class="form-radio" name="certificate" id="certificate" value="No">
                      <span class="ml-2">No</span>
                    </label>
                </div>
                @error('certificate') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <x-jet-label for="home_mention" value="{{ __('Home mention') }}" />
                <div class="mt-3">
                    <label class="inline-flex items-center">
                      <input wire:model="home_mention" type="radio" class="form-radio" name="home_mention" id="home_mention" value="Yes">
                      <span class="ml-2">Yes</span>
                    </label>
                    <label class="inline-flex items-center ml-6">
                      <input wire:model="home_mention" type="radio" class="form-radio" name="home_mention" id="home_mention" value="No">
                      <span class="ml-2">No</span>
                    </label>
                </div>
                @error('home_mention') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <x-jet-label for="start_date" value="{{ __('Start Date') }}" />
                <x-jet-input wire:model="start_date" id="start_date" class="block mt-1 w-full" type="date" />
                @error('start_date') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <x-jet-label for="duration" value="{{ __('To') }}" />
                <x-jet-input wire:model="duration" id="duration" class="block mt-1 w-full" type="date"/>
                @error('duration') <span class="error">{{ $message }}</span> @enderror
            </div>
            
            <div class="mt-4">
                <x-jet-label for="user_dispo" value="{{ __('Patient disponibility') }}" />
                <x-jet-input wire:model="user_dispo" id="user_dispo" class="block mt-1 w-full" type="time"/>
                @error('user_dispo') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <x-jet-label for="care_place" value="{{ __('Care Place') }}" />
                <select wire:model="care_place" id="" class="block appearance-none w-full bg-gray-100 border border-gray-200 text-gray-700 py-3 px-4 pr-8 round leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    <option value="">-- Select a nbr of care place --</option>    
                    @foreach (App\Models\Appointment::careplace() as $item)
                        <option value="{{ $item }}">{{ $item }}</option>
                    @endforeach
                </select>
                @error('care_place') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <x-jet-label for="covid_symptom" value="{{ __('Covid Symptom') }}" />
                <div class="mt-3">
                    <label class="inline-flex items-center">
                      <input  wire:model="covid_symptom" type="radio" class="form-radio" name="covid_symptom" id="covid_symptom" value="Yes">
                      <span class="ml-2">Yes</span>
                    </label>
                    <label class="inline-flex items-center ml-6">
                      <input  wire:model="covid_symptom" type="radio" class="form-radio" name="covid_symptom" id="covid_symptom" value="No">
                      <span class="ml-2">No</span>
                    </label>
                </div>
                @error('covid_symptom') <span class="error">{{ $message }}</span> @enderror
            </div>

        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalFormVisible')" wire:loading.attr="disabled">
                {{ __('Nevermind') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2" wire:click="create" wire:loading.attr="disabled">
                {{ __('Create') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>