<div class="p-6">
        <div class="flex items-center justify-end px-4 py-3 text-right sm:px-6">
            <a class="w-8 h-8 text-blue-600 box-border hover:bg-blue-600 hover:text-white rounded" wire:click="createShowModal">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </a>
        </div>

        {{--The data table--}}
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
    
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Title</th>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Link</th>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Content</th>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"></th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @if ($data->count())
                                    @foreach ($data as $item)
                                        <tr>
                                            <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                {{ $item->title }}
                                                {!! $item->is_default_home ? '<span class="text-green-400 text-xs font-bold">[Default Home Page]</span>':''!!}
                                                {!! $item->is_default_not_found ? '<span class="text-red-400 text-xs font-bold">[Default 404 Page]</span>':''!!}
                                            </td>
                                            <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                <a
                                                    class="text-indigo-600 hover:text-indigo-900"
                                                    target="_blank"
                                                    href="{{ URL::to('/'.$item->slug)}}"
                                                >
                                                    {{ $item->slug }}
                                                </a>
                                            </td>
                                            <td class="px-6 py-4 text-sm whitespace-no-wrap">{!! \Illuminate\Support\Str::limit($item->content, 50, '...') !!}</td>
                                            <td class="px-6 py-2 flex justify-end">
                                                <div class="flex space-x-1 justify-around">
                                                    <a  wire:click="updateShowModal({{ $item->id }})" target="_blank" class="p-1 text-blue-600 hover:bg-blue-600 hover:text-white rounded">
                                                         <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path></svg>
                                                     </a>
                                                 
                                                     <button wire:click="deleteShowModal({{ $item->id }})" class="p-1 text-red-600 hover:bg-red-600 hover:text-white rounded">
                                                         <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                                     </button>
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
        <br/>
        {{ $data->links() }}

        {{--Modal Form Create_Update--}}
        <x-jet-dialog-modal wire:model="modalFormVisible">
            @if ($modelId)
            <x-slot name="title">
                {{ __('Update Page') }}
            </x-slot>
            @else
            <x-slot name="title">
                {{ __('Add Page') }}
            </x-slot>
            @endif

            <x-slot name="content">
                <div class="mt-4">
                    <x-jet-label for="title" value="{{ __('Title') }}" />
                    <x-jet-input id="title" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="title" />
                    @error('title') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="mt-4">
                    <x-jet-label for="slug" value="{{ __('Slug') }}" />
                    <div class="mt-1 flex rounded-md shadow-sm">
                        <span class="inline-flex items-center px-3 py-2 rounded-l-lg border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                            http://localhost:8000/
                        </span>
                        <x-jet-input wire:model="slug" class="inline-flex items-center w-full pl-2 py-2 rounded-r-lg rounded-l-none border border-l-0" placeholder="url-slug"/>
                    </div>
                    @error('slug') <span class="error">{{ $message }}</span> @enderror   
                </div>

                <div class="mt-4">
                    <label>
                        <input class="form-checkbox" type="checkbox" value="{{ $isSetToDefaultHomePage }}" wire:model="isSetToDefaultHomePage"/>
                        <span class="ml-2 text-sm text-gray-600">Set as the default home page</span>
                    </label>
                </div>
                <div class="mt-4">
                    <label>
                        <input class="form-checkbox" type="checkbox" value="{{ $isSetToDefaultNotFoundPage }}" wire:model="isSetToDefaultNotFoundPage"/>
                        <span class="ml-2 text-sm text-red-600">Set as the default 404 error page</span>
                    </label>
                </div>

                {{-- <div class="mt-4">
                    <x-jet-label for="title" value="{{ __('Content') }}" />
                    <div class="rounded-md shadow-sm">
                        <div class="mt-1 bg-white">                      
                            <div class="body-content overflow-x-scroll" wire:ignore>
                                <trix-editor id="content" class="trix-content break-words" x-ref="trix" wire:model.debounce.100000ms="content" wire:key="trix-content-unique-key"></trix-editor>
                            </div>
                        </div>
                    </div> 
                    @error('content') <span class="error">{{ $message }}</span> @enderror
                </div> --}}
                <div class="mt-4">
                    <x-jet-label for="content" value="{{ __('Content') }}" />
                    <textarea id="content" class="block mt-1 w-full" type="text" name="content" wire:model.debounce.100000ms="content"></textarea>
                    @error('content') <span class="error">{{ $message }}</span> @enderror            
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('modalFormVisible')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
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
                {{ __('Delete Page') }}
            </x-slot>

            <x-slot name="content">
                {{ __('Are you sure you want to delete this page? Once the page is deleted, all of its resources and data will be permanently deleted.') }}
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('modalConfirmDeleteVisible')" wire:loading.attr="disabled">
                    {{ __('Nevermind') }}
                </x-jet-secondary-button>

                <x-jet-danger-button class="ml-2" wire:click="delete" wire:loading.attr="disabled">
                    {{ __('Delete Page') }}
                </x-jet-danger-button>
            </x-slot>
        </x-jet-dialog-modal>
</div>
