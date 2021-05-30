<div class="p-6">
    <div class="flex flex-col">
        <div class="mb-1">
            <div class="flex-col items-center md:justify-end lg:text-right justify-start px-4 py-3 space-y-2 text-left -ml-4">
                &nbsp;
                <select class="border border-gray-300 text-gray-600 h-14 pl-5 pr-10 mr-1 rounded bg-white hover:border-gray-400 focus:outline-none appearance-none" wire:model="perPage">
                    <option>10</option>
                    <option>15</option>
                    <option>25</option>
                </select>
                <x-jet-input wire:model="selectedDate" id="start_date" class="border border-gray-300 text-gray-600 h-14 pl-5 pr-10 mr-1 rounded bg-white hover:border-gray-400 focus:outline-none appearance-none" type="date" />
                <input wire:model="search" wire:click="alertInfo" type="text" class="h-14 sm:w-96 md:pr-8 sm:pl-10 rounded focus:shadow focus:outline-none" placeholder="Search...">
                <button class="border border-gray-300 text-center h-14 p-2 ml-3 border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none appearance-none" wire:click="searchClear">
                    Reset All
                </button>
                <button @if($bulkDisabled) wire:click.prevent="NodeleteSelected" @endif  wire:click.prevent="deleteSelected" onclick="confirm('Are you sure?') || event.stopImmediatePropagation()"
                class="@if($bulkDisabled) opacity-50 @endif ml-2 p-1 text-red-500 hover:text-red-700">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
        </div>
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    <input type="checkbox" wire:model="selectAll">
                                </th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">RDV Date</th> 
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Patient</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Treatment</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Passage Nbr</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Start Date</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Duration</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Disponibility/Day</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($data->whereIn('related_id', auth()->user()->id) as $item)
                                <tr>
                                    <td class="px-6 py-2">
                                        <input type="checkbox" wire:model="selectedAppointments" value="{{$item->id}}">
                                    </td>
                                    <td class="px-6 py-2 text-xs">{{ $item->created_at->format('d M Y') }}</td>
                                    <td class="px-6 py-2 text-xs capitalize">{{ $item->patient_name }}</td>
                                    <td class="px-6 py-2 text-xs capitalize">{{ $item->treatment }}</td>                                        
                                    <td class="px-6 py-2 text-xs capitalize">{{ $item->passage_number }}</td>                                        
                                    <td class="px-6 py-2 text-xs">{{  Carbon\Carbon::parse($item->start_date)->format('d M Y') }}</td>                                        
                                    <td class="px-6 py-2 text-xs">{{ $item->duration }}</td>                                        
                                    <td class="px-6 py-2 text-xs"><span class="text-white bg-blue-300 p-1 rounded-lg mr-1">{{ $item->user_dispo }}</span><span class="text-white bg-blue-300 p-1 rounded-lg">{{ $item->user_dispo2 }}</span></td>  
                                    @if($item->status=='accepted')
                                    <td class="px-6 py-2 text-xs mb-2"><span class="p-1 text-gray-50 font-bold bg-blue-500 rounded">{{$item->status}}</span></td>
                                    @elseif($item->status=='refused')
                                    <td class="px-6 py-2 text-xs mb-2"><span class="p-1 text-gray-50 font-bold bg-red-500 rounded">{{$item->status}}</span></td>
                                    @else
                                    <td class="px-6 py-2 text-xs mb-2"><span class="p-1 text-gray-50 font-bold bg-yellow-500 rounded">{{$item->status}}</span></td>
                                    @endif                                                                                 
                                    <td class="px-6 py-2 flex justify-end">
                                        <div class="flex space-x-1 justify-around mt-1">
                                            @if($item->status =='waiting')
                                            <a wire:click="updateShowModal({{ $item->id }})" class="p-1 text-blue-600 hover:bg-blue-600 hover:text-white rounded">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path></svg>
                                            </a>
                                            @else
                                            <a wire:click="showModal({{ $item->id }})" class="p-1 text-yellow-600 hover:bg-yellow-600 hover:text-white rounded">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path></svg>
                                            </a>
                                            @endif

                                        </div>
                                    </td>
                                </tr>
                            @empty
                            <tr>
                                <td class="px-6 py-4 text-sm whitespace-no-wrap" colspan="4">No Results Found</td>
                            </tr>
                            @endforelse
                        </tbody>                        
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-5">
    {{ $data->links() }}
    </div>

    {{-- Modal Form --}}
    <x-jet-dialog-modal wire:model="modalFormVisible">
        <x-slot name="title">
            {{ __('Appointment Confirmation') }}
        </x-slot>

        <x-slot name="content">
            <div class="mt-4 space-y-2">
                <x-jet-label for="status" value="{{ __('Status') }}" />
                <select wire:model="status" class="w-full border border-gray-300 text-gray-600 h-14 mr-1 rounded bg-white hover:border-gray-400 focus:outline-none appearance-none">
                    <option value="">-- Processing --</option>    
                        @foreach (App\Models\Appointment::status() as $item)
                            <option value="{{ $item }}">{{ $item }}</option>
                        @endforeach
                </select>
                @error('status') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4 space-y-2">
                <x-jet-label for="patient_email" value="{{ __('Re-write patient email') }}" />
                <span class=" font-bold text-xs text-red-700">Please confirm your patient email to notify him by using it!!</span><br>
                <span class=" font-bold text-xs text-blue-700">If your patient has another email so enter the newest email!!</span>
                <x-jet-input id="user_email" class="w-full border border-gray-300 text-gray-600 h-14 mr-1 rounded bg-white hover:border-gray-400 focus:outline-none appearance-none" type="email" wire:model.debounce.800ms="patient_email" />
                @error('patient_email') <span class="error">{{ $message }}</span> @enderror
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalFormVisible')" wire:loading.attr="disabled">
                {{ __('Nevermind') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2 bg-indigo-400 border-none" wire:click="update" wire:loading.attr="disabled">
                {{ __('Update') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>

    {{-- Show Modal--}}
    <x-jet-dialog-modal wire:model="modalShowVisible">
        <x-slot name="title">
            <div class="flex items-center justify-center px-4 py-3 text-right sm:px-8">
                <span class=" text-lg text-center text-white font-bold bg-blue-300 p-2 rounded">{{$this->treatment}}</span> 
            </div>
            <div class="flex items-center justify-center px-4 py-3 text-right sm:px-8">
                <svg xmlns="http://www.w3.org/2000/svg" class=" mr-2 text-blue-500 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span class="text-sm">{{ Carbon\Carbon::parse($this->created_at)->format('d M Y') }}</span>
            </div>
        </x-slot>

        <x-slot name="content">
            <div class="flex items-center justify-center sm:items-start sm:justify-start px-4 py-3 sm:px-8">
                <ul>
                    <li class="mb-2"><span class=" font-bold pr-2">Patient name:</span> {{$this->patient_name}}</li>
                    @if($this->status == 'accepted')
                    <li class="mb-2"><span class=" font-bold pr-2">Patient email:</span> {{$this->patient_email}}</li>
                    <li class="mb-2"><span class=" font-bold pr-2">Patient phone:</span> {{$this->patient_tel}}</li>
                    @endif
                    <li class="mb-2"><span class=" font-bold pr-2">Treatment:</span> {{$this->treatment}}</li>
                    <li class="mb-2"><span class=" font-bold pr-2">Sub Treatment:</span> {{$this->sub_treatment}}</li>
                    <li class="mb-2"><span class=" font-bold pr-2">Passage Nbre:</span> {{$this->passage_number}}</li>
                    <li class="mb-2"><span class=" font-bold pr-2">Start Date:</span> {{Carbon\Carbon::parse($this->start_date)->format('d M Y')}}</li>
                    <li class="mb-2"><span class=" font-bold pr-2">Duration:</span> {{$this->duration}}</li>
                    <li class="mb-2"><span class=" font-bold pr-2">Patient Dispo/Day:<span class="text-white bg-blue-300 p-1 rounded-lg mr-1">{{ $this->user_dispo }}</span><span class="text-white bg-blue-300 p-1 rounded-lg">{{ $this->user_dispo2 }}</span></li>
                    <li class="mb-2"><span class=" font-bold pr-2">Certificate:</span> {{$this->certificate}}</li>
                    <li class="mb-3"><span class=" font-bold pr-2">Home Mention:</span> {{$this->home_mention}}</li>
                    <li class="mb-2"><span class=" font-bold pr-2">Care place:</span> {{$this->care_place}}</li>
                    <li class="mb-4"><span class=" font-bold pr-2">Covid symptom:</span> {{$this->covid_symptom}}</li>
                    @if($this->status=='accepted')
                    <li class="mb-2"><span class=" font-bold pr-2">Status:</span> <span class="p-1 text-gray-50 font-bold bg-blue-500 rounded">{{$this->status}}</span></li>
                    @elseif($this->status=='refused')
                    <li class="mb-2"><span class=" font-bold pr-2">Status:</span> <span class="p-1 text-gray-50 font-bold bg-red-500 rounded">{{$this->status}}</span></li>
                    @else
                    <li class="mb-2"><span class=" font-bold pr-2">Status:</span> <span class="p-1 text-gray-50 font-bold bg-yellow-500 rounded">{{$this->status}}</span></li>
                    @endif
                </ul> 
            </div>
        </x-slot>

        <x-slot name="footer">
            <button class="bg-blue-500 p-2 rounded text-white px-3" wire:click="$toggle('modalShowVisible')" wire:loading.attr="disabled">
                {{ __('Back') }}
            </button>
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