<div class="p-6">
    <div class="bg-blue-100 p-4 auto-cols-max rounded-md">
        <div class="flex">
            <span class=" text-red-600 pr-1">
                <svg xmlns="http://www.w3.org/2000/svg" class=" h-5 w-5 " viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                </svg>
            </span>
            <span class="font-bold">{{__('Health specialist')}}:</span>
            <span class=" bg-red-500 rounded-md box-border text-white text-xs font-bold p-1 ml-2">{{App\Models\User::where('role','Health specialist')->count()}}</span>
        </div>
        <div class="flex mt-2">
            <span class=" text-blue-600 pr-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                </svg>
            </span>
            <span class="font-bold">{{__('Patients')}}:</span>
            <span class=" bg-blue-500 rounded-md box-border text-white text-xs font-bold p-1 ml-2">{{App\Models\User::where('role','Patient')->count()}}</span>
        </div>
    </div>
    {{-- The data ehealth table --}}
    <div class="flex flex-col">
        <div class="mb-1">
            <div class="flex-col items-center md:justify-end lg:text-right justify-start px-4 py-3 space-y-2 text-left -ml-4">
                &nbsp;
                <select class="border border-gray-300 text-gray-600 h-14 pl-5 pr-10 mr-1 rounded bg-white hover:border-gray-400 focus:outline-none appearance-none" wire:model="perPage">
                    <option>10</option>
                    <option>15</option>
                    <option>25</option>
                </select>
                <input wire:model="search" wire:click="alertInfo" type="text" class="h-14 sm:w-96 md:pr-8 sm:pl-10 rounded focus:shadow focus:outline-none" placeholder="Search...">
                <select wire:model="selectedRole" class="border border-gray-300 text-gray-600 h-14 rounded bg-white hover:border-gray-400 focus:outline-none appearance-none">
                    <option value="">--role--</option>
                    @forelse(App\Models\Roles::all() as $item)
                    <option>{{$item->name}}</option>    
                    @empty
                    <option>empty..</option>
                    @endforelse
                </select>
                <select wire:model="selectedGender" class="border border-gray-300 text-gray-600 h-14 mr-1 rounded bg-white hover:border-gray-400 focus:outline-none appearance-none">
                    <option value="">--gender--</option>
                    <option value="{{'m'}}">male</option>
                    <option value="{{'f'}}">female</option>
                </select>
                <button class="border border-gray-300 text-center ml-2 h-14 p-2 mr-1 border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none appearance-none" wire:click="searchClear">
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
                                    {{-- <input type="checkbox" wire:model="selectAll" wire:click="adminAlert"> --}}
                                    select
                                </th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Photo</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Gender</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Date of Birth</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Phone</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Role</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Specialty</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">                           
                                @forelse ($data as $item)
                                    <tr>
                                        @if($item->role != 'admin')
                                        <td class="px-6 py-2">
                                            <input type="checkbox" wire:model="selectedUsers" value="{{$item->id}}">
                                        </td>
                                        @else
                                        <td class="px-6 py-2">
                                            <input type="checkbox" wire:model="selectedUsers" wire:click="adminAlert" value="{{$item->id}}" class=" text-red-500 bg-red-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.618 5.984A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016zM12 9v2m0 4h.01" />
                                            </svg>
                                        </td>
                                        @endif
                                        <td class="px-6 py-2">
                                        <img class="h-8 w-8 rounded-full object-cover" src="{{ $item->profile_photo_url }}" alt="{{ $item->name }}" />
                                        </td>
                                        <td class="px-6 py-2">{{ $item->name }}</td>
                                        <td class="px-6 py-2">
                                            <span class="flex">
                                            {{ $item->email }}
                                            @if(!is_null($item->email_verified_at))
                                            <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 h-5 w-5 text-green-600" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                            </svg>
                                            @endif
                                            </span>
                                        </td>
                                        @if($item->gender=='m')
                                        <td class="px-6 py-2">Male</td>
                                        @else
                                        <td class="px-6 py-2">Female</td>
                                        @endif
                                        <td class="px-6 py-2">{{ $item->date_of_birth }}</td>
                                        <td class="px-6 py-2">
                                            <span class="flex">
                                                {{ $item->tel }}
                                                @if($item->isVerified == 1)
                                                <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 h-5 w-5 text-green-600" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                                </svg>
                                                @endif
                                            </span>
                                        </td>
                                        <td class="px-6 py-2">{{ $item->role }}</td>
                                        <td class="px-6 py-2">{{ $item->specialty }}</td> 
                                        <td class="px-6 py-2 flex justify-end">
                                            <div class="flex space-x-1 justify-around">
                                                @if($item->role == 'Health specialist')
                                                <a href="{{ route('user.show', [$item->id]) }}" target="_blank" class="p-1 text-yellow-600 hover:bg-yellow-600 hover:text-white rounded">
                                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path></svg>
                                                </a>
                                                @endif
                                                @if($item->role != 'admin')
                                                <a  wire:click="updateShowModal({{ $item->id }})" target="_blank" class="p-1 text-blue-600 hover:bg-blue-600 hover:text-white rounded">
                                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path></svg>
                                                </a>
                                            
                                                <button wire:click="deleteShowModal({{ $item->id }})" class="p-1 text-red-600 hover:bg-red-600 hover:text-white rounded">
                                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                                </button>
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
        @if ($modelId)
            <x-slot name="title">
                {{ __('Update User') }}
            </x-slot>
            @else
            <x-slot name="title">
                {{ __('Add User') }}
            </x-slot>
        @endif

        <x-slot name="content">
            <div class="mt-4">
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input wire:model="name" id="name" class="block mt-1 w-full" type="text" />
                @error('name') <span class="error">{{ $message }}</span> @enderror
            </div>

            @if($role=='Health specialist')
            <div class="mt-4">
                <x-jet-label for="specialty" value="{{ __('Specialty') }}"/>
                <select wire:model="specialty" id="specialty" class="block appearance-none w-full bg-gray-100 border border-gray-200 text-gray-700 py-3 px-4 pr-8 round leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        <option value="">-- Select a Sepecialty --</option>    
                    @foreach (App\Models\Specialty::all() as $item)
                        <option value="{{ $item->name }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                @error('specialty') <span class="error">{{ $message }}</span> @enderror
            </div>
            @else 
            <div class="mt-4">
                <x-jet-label for="specialty" value="{{ __('Specialty') }}"/><span class=" text-red-600 font-bold"> Just For Health specialist!!</span>
                <select wire:model="specialty" id="specialty" class="block appearance-none w-full bg-gray-100 border border-gray-200 text-gray-700 py-3 px-4 pr-8 round leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        <option value="{{$this->specialty = ''}}">-- Select a Sepecialty --</option>    
                </select>
                @error('specialty') <span class="error">{{ $message }}</span> @enderror
            </div>
            @endif

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input wire:model="email" id="email" class="block mt-1 w-full" type="email" />
                @error('email') <span class="error">{{ $message }}</span> @enderror            
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
