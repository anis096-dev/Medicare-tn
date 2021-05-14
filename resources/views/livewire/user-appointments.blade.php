<div class="p-6">
    @if(auth()->user()->role != 'E-health Care')
    @if(session()->has('message'))
        <style>
            /*Toast open/load animation*/
            .alert-toast {
                -webkit-animation: slide-in-right 0.5s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
                        animation: slide-in-right 0.5s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
            }
            /*Toast close animation*/
            .alert-toast input:checked ~ * {
                -webkit-animation: fade-out-right 0.7s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
                        animation: fade-out-right 0.7s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
            }
            /* -------------------------------------------------------------
            * Animations generated using Animista * w: http://animista.net, 
            * ---------------------------------------------------------- */
            @-webkit-keyframes slide-in-top{0%{-webkit-transform:translateY(-1000px);transform:translateY(-1000px);opacity:0}100%{-webkit-transform:translateY(0);transform:translateY(0);opacity:1}}@keyframes slide-in-top{0%{-webkit-transform:translateY(-1000px);transform:translateY(-1000px);opacity:0}100%{-webkit-transform:translateY(0);transform:translateY(0);opacity:1}}@-webkit-keyframes slide-out-top{0%{-webkit-transform:translateY(0);transform:translateY(0);opacity:1}100%{-webkit-transform:translateY(-1000px);transform:translateY(-1000px);opacity:0}}@keyframes slide-out-top{0%{-webkit-transform:translateY(0);transform:translateY(0);opacity:1}100%{-webkit-transform:translateY(-1000px);transform:translateY(-1000px);opacity:0}}@-webkit-keyframes slide-in-bottom{0%{-webkit-transform:translateY(1000px);transform:translateY(1000px);opacity:0}100%{-webkit-transform:translateY(0);transform:translateY(0);opacity:1}}@keyframes slide-in-bottom{0%{-webkit-transform:translateY(1000px);transform:translateY(1000px);opacity:0}100%{-webkit-transform:translateY(0);transform:translateY(0);opacity:1}}@-webkit-keyframes slide-out-bottom{0%{-webkit-transform:translateY(0);transform:translateY(0);opacity:1}100%{-webkit-transform:translateY(1000px);transform:translateY(1000px);opacity:0}}@keyframes slide-out-bottom{0%{-webkit-transform:translateY(0);transform:translateY(0);opacity:1}100%{-webkit-transform:translateY(1000px);transform:translateY(1000px);opacity:0}}@-webkit-keyframes slide-in-right{0%{-webkit-transform:translateX(1000px);transform:translateX(1000px);opacity:0}100%{-webkit-transform:translateX(0);transform:translateX(0);opacity:1}}@keyframes slide-in-right{0%{-webkit-transform:translateX(1000px);transform:translateX(1000px);opacity:0}100%{-webkit-transform:translateX(0);transform:translateX(0);opacity:1}}@-webkit-keyframes fade-out-right{0%{-webkit-transform:translateX(0);transform:translateX(0);opacity:1}100%{-webkit-transform:translateX(50px);transform:translateX(50px);opacity:0}}@keyframes fade-out-right{0%{-webkit-transform:translateX(0);transform:translateX(0);opacity:1}100%{-webkit-transform:translateX(50px);transform:translateX(50px);opacity:0}}
        </style>

        <!--Toast-->
        <div class="alert-toast fixed bottom-0 right-0 m-8 w-5/6 md:w-full max-w-sm">
            <input type="checkbox" class="hidden" id="footertoast">

            <label class="close cursor-pointer flex items-start justify-between w-full p-2 bg-blue-500 h-24 rounded shadow-lg text-white" title="close" for="footertoast">
            {{session('message')}}            
            <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
            </svg>
            </label>
        </div>
    @endif
        <div class="flex items-center justify-end px-4 py-3 text-right sm:px-6">
            <a  wire:click="createShowModal" class="flex-auto text-center bg-blue-700 text-white py-3 rounded-md text-sm uppercase hover:shadow 
            hover:bg-blue-500 transform hover:scale-105 motion-reduce:transform-none">
                Appoint
            </a> 
        </div>
    @endif

    @if(auth()->user()->role != 'Patient')
    {{-- The data table --}}
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Patient</th> 
                                @if(auth()->user()->role != 'E-health Care')
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">E-health Care</th>
                                @endif
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Treatment</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Passage Nbr</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Start Date (From:)</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Duration (To:)</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Patient Disponibility</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">status</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">                           
                            @if ($data->count())
                                @foreach ($data->where('related_id', $user->id) as $item)
                                    <tr>
                                        <td class="px-6 py-2">{{ $item->user->name }}</td>
                                        @if(auth()->user()->role != 'E-health Care')
                                        <td class="px-6 py-2">{{ $item->related_name }}</td>
                                        @endif
                                        <td class="px-6 py-2">{{ $item->treatment }}</td>                                        
                                        <td class="px-6 py-2">{{ $item->passage_number }}</td>                                        
                                        <td class="px-6 py-2">{{ $item->start_date }}</td>                                        
                                        <td class="px-6 py-2">{{ $item->duration }}</td>                                        
                                        <td class="px-6 py-2">{{ $item->user_dispo }}</td>  
                                        <td class="px-6 py-2">{{ $item->status }}</td>                                                                              
                                        <td class="px-6 py-2 flex justify-end">
                                            <div class="flex space-x-1 justify-around">
                                                <a  wire:click="updateShowModal({{ $item->id }})" target="_blank" class="p-1 text-blue-600 hover:bg-blue-600 hover:text-white rounded">
                                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path></svg>
                                                </a>
                                                
                                                @if(auth()->user()->role == 'admin')
                                                <button wire:click="deleteShowModal({{ $item->id }})" class="p-1 text-red-600 hover:bg-red-600 hover:text-white rounded">
                                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                                </button>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else 
                                <tr>
                                    <td class="px-6 py-4 text-sm whitespace-no-wrap" colspan="4">No Results Found</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-5">
    {{ $data->links() }}
    </div>
    @endif

    {{-- Modal Form --}}
    <x-jet-dialog-modal wire:model="modalFormVisible">
        @if ($modelId)
        <x-slot name="title">
            {{ __('Update Appointment') }}
        </x-slot>
        @else
        <x-slot name="title">
            {{ __('Add Appointment') }}
        </x-slot>
        @endif

        <x-slot name="content">
            <div class="mt-4">
                <x-jet-label for="treatment" value="{{ __('Treatment') }}" />
                <select wire:model="treatment" id="" class="block appearance-none w-full bg-gray-100 border border-gray-200 text-gray-700 py-3 px-4 pr-8 round leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    <option value="">-- Select a Treatment --</option>    
                    @foreach (App\Models\Treatment::all() as $item)
                        <option value="{{ $item->name }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                @error('treatment') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <x-jet-label for="sub_treatment" value="{{ __('Sub Treatment') }}" />
                <select wire:model="sub_treatment" id="" class="block appearance-none w-full bg-gray-100 border border-gray-200 text-gray-700 py-3 px-4 pr-8 round leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    <option value="">-- Select a Sub Treatment --</option>    
                    @foreach (App\Models\SubTreatment::all() as $item)
                        <option value="{{ $item->name }}">{{ $item->name }}</option>
                    @endforeach
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
                <x-jet-label for="status" value="{{ __('Status') }}" />
                <select wire:model="status" class="block appearance-none w-full bg-gray-100 border border-gray-200 text-gray-700 py-3 px-4 pr-8 round leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    {{-- @if ($modelId) --}}
                    <option value="">-- Processing --</option>    
                        @foreach (App\Models\Appointment::status() as $item)
                            <option value="{{ $item }}">{{ $item }}</option>
                        @endforeach
                    {{-- @endif --}}
                </select>
                @error('status') <span class="error">{{ $message }}</span> @enderror
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

            @if ($modelId)
                <x-jet-button class="ml-2" wire:click="update" wire:loading.attr="disabled">
                    {{ __('Update') }}
                </x-jet-danger-button>
            @else
                <x-jet-button class="ml-2" wire:click="create" wire:loading.attr="disabled">
                    {{ __('Create') }}
                </x-jet-danger-button>
            @endif            
        </x-slot>
    </x-jet-dialog-modal>

    {{-- The Delete Modal --}}
    <x-jet-dialog-modal wire:model="modalConfirmDeleteVisible">
        <x-slot name="title">
            {{ __('Delete Modal Title') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you want to delete this item?') }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalConfirmDeleteVisible')" wire:loading.attr="disabled">
                {{ __('Nevermind') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="delete" wire:loading.attr="disabled">
                {{ __('Delete Item') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>