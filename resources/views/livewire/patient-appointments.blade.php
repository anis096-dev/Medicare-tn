<div class="p-6">
    <div class="flex flex-col">
        <div class="mb-1">
            <div class="flex items-center sm:justify-end justify-center px-4 py-3 text-right sm:px-8">
                &nbsp;
                <select class="border border-gray-300 text-gray-600 h-14 pl-5 pr-10 mr-1 rounded bg-white hover:border-gray-400 focus:outline-none appearance-none" wire:model="perPage">
                    <option>10</option>
                    <option>15</option>
                    <option>25</option>
                </select>
                <input wire:model="search" wire:click="alertInfo" type="text" class="h-14 sm:w-96 md:pr-8 sm:pl-10 rounded focus:shadow focus:outline-none" placeholder="Search...">
                <button class="-ml-8" wire:click="searchClear">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="flex items-center sm:justify-end justify-center text-left sm:px-20">
                <span class=" text-gray-400 text-xs font-bold">Search for RDV by date(YYYY-MM-DD)!!</span>
            </div>
        </div>
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">RDV Date</th> 
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">E-healthCare name</th> 
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Treatment</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Passage Nbr</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Start Date</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Duration</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Disponibility/Day</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">status</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($data->whereIn('user_id', auth()->user()->id) as $item)
                                <tr>
                                    <td class="px-6 py-2 text-xs">{{ $item->created_at->format('d M Y') }}</td>
                                    <td class="px-6 py-2 text-xs capitalize">{{ $item->related_name }}</td>
                                    <td class="px-6 py-2 text-xs capitalize">{{ $item->treatment }}</td>                                        
                                    <td class="px-6 py-2 text-xs capitalize">{{ $item->passage_number }}</td>                                        
                                    <td class="px-6 py-2 text-xs">{{Carbon\Carbon::parse($this->start_date)->format('d M Y')}}</td>                                        
                                    <td class="px-6 py-2 text-xs">{{ $item->duration }}</td>                                        
                                    <td class="px-6 py-2 text-xs">{{ $item->user_dispo }}</td>  
                                    @if($item->status=='accepted')
                                    <td class="px-6 py-2 text-xs mb-2"><span class="p-1 text-gray-50 font-bold bg-blue-500 rounded">{{$item->status}}</span></td>
                                    @elseif($item->status=='refused')
                                    <td class="px-6 py-2 text-xs mb-2"><span class="p-1 text-gray-50 font-bold bg-red-500 rounded">{{$item->status}}</span></td>
                                    @else
                                    <td class="px-6 py-2 text-xs mb-2"><span class="p-1 text-gray-50 font-bold bg-yellow-500 rounded">{{$item->status}}</span></td>
                                    @endif                                                                                 
                                    <td class="px-6 py-2 flex justify-end">
                                        <div class="flex space-x-1 justify-around mt-1">
                                            <a wire:click="showModal({{ $item->id }})" class="p-1 text-yellow-600 hover:bg-yellow-600 hover:text-white rounded">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path></svg>
                                            </a>
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
                    <li class="mb-2"><span class=" font-bold pr-2">E-health care name:</span> {{$this->related_name}}</li>
                    <li class="mb-2"><span class=" font-bold pr-2">Patient name:</span> {{$this->patient_name}}</li>
                    <li class="mb-2"><span class=" font-bold pr-2">Patient email:</span> {{$this->patient_email}}</li>
                    <li class="mb-2"><span class=" font-bold pr-2">Treatment:</span> {{$this->treatment}}</li>
                    <li class="mb-2"><span class=" font-bold pr-2">Sub Treatment:</span> {{$this->sub_treatment}}</li>
                    <li class="mb-2"><span class=" font-bold pr-2">Passage Nbre:</span> {{$this->passage_number}}</li>
                    <li class="mb-2"><span class=" font-bold pr-2">Start Date:</span> {{Carbon\Carbon::parse($this->start_date)->format('d M Y')}}</li>
                    <li class="mb-2"><span class=" font-bold pr-2">Duration:</span> {{$this->duration}}</li>
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
</div>