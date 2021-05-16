<div class="p-6">
    <div class="flex items-center justify-end px-4 py-3 text-right sm:px-6">
            <a class="w-8 h-8 text-blue-600 box-border hover:bg-blue-600 hover:text-white rounded" wire:click="createShowModal">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </a>
    </div>

    {{-- The data table --}}
    <div class="flex flex-col">
        <div class="flex items-center justify-end px-4 py-3 text-right sm:px-1">
            <button wire:click.prevent="deleteSelected" onclick="confirm('Are you sure?') || event.stopImmediatePropagation()"
            class="@if($bulkDisabled) opacity-50 @endif bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4">
                Delete Selected
            </button>
        </div>
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    <input type="checkbox" wire:model="selectAll"> Select All
                                </th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Days</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Times</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">                           
                            @if ($data->count())
                                @foreach ($data->where('user_id', auth()->user()->id)->unique('day') as $item)
                                    <tr>
                                        <td class="px-6 py-2">
                                            <input class="hidden" type="checkbox" wire:model="selectedTimes" value="{{$item->id}}">
                                        </td>
                                        <td class="px-6 py-2">{{ $item->day }}</td>
                                        <td class="px-6 py-2" x-data="{ show: false }">
                                            @foreach ($data->where('user_id', auth()->user()->id)->where('day', $item->day) as $item)
                                            <button @click="show = !show" :aria-expanded="show ? 'true' : 'false'" :class="{ 'active': show }" 
                                            class="bg-blue-500 px-2 py-2 ml-2 mb-2 rounded text-white text-xs font-bold items-center">
                                                {{$item->time1}}-{{$item->time2}}
                                            </button>
                                            <div class="ml-4 mb-2 px-2 py-2 items-center flex" x-show="show">
                                                <a  wire:click="updateShowModal({{ $item->id }})" target="_blank" class="p-1 text-blue-600 hover:bg-blue-600 hover:text-white rounded">
                                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path></svg>
                                                </a>

                                                <button wire:click="deleteShowModal({{ $item->id }})" class="p-1 text-red-600 hover:bg-red-600 hover:text-white rounded">
                                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                                </button>
                                            </div>
                                            @endforeach
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
    
    {{-- <div class="mt-5">
    {{ $data->links() }}
    </div> --}}

    {{-- Modal Form --}}
    <x-jet-dialog-modal wire:model="modalFormVisible">
        @if ($modelId)
        <x-slot name="title">
            {{ __('Update Time') }}
        </x-slot>
        @else
        <x-slot name="title">
            {{ __('Add Time') }}
        </x-slot>
        @endif

        <x-slot name="content">
            <div class="mt-4">
                <x-jet-label for="day" value="{{ __('day') }}" />
                <select wire:model="day" id="day" class="block appearance-none w-full bg-gray-100 border border-gray-200 text-gray-700 py-3 px-4 pr-8 round leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    <option value=" ">-- Select a Day --</option>      
                    @foreach (App\Models\TimeSetting::days() as $item)
                    <option value="{{ $item }}">{{ $item }}</option>    
                    @endforeach   
                </select>
                @error('day') <span class="error">{{ $message }}</span> @enderror
            </div>
            
            <div class="mt-4">
                <span class="text-sm font-bold text-red-600">Please enter times by order!! (ex:
                    <button class="bg-blue-500 px-2 py-2 ml-2 mb-2 rounded text-white text-xs font-bold items-center">08:00-09:30</button>
                    <button class="bg-blue-500 px-2 py-2 ml-2 mr-2 mb-2 rounded text-white text-xs font-bold items-center">12:30-14:30</button>
                    )</span>
                <x-jet-label for="time1" value="{{ __('From') }}" />
                <x-jet-input wire:model="time1" id="time1" class="block mt-1 w-full" type="time" />
                @error('time1') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <x-jet-label for="time2" value="{{ __('To') }}" />
                <x-jet-input wire:model="time2" id="time2" class="block mt-1 w-full" type="time" />
                @error('time2') <span class="error">{{ $message }}</span> @enderror
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