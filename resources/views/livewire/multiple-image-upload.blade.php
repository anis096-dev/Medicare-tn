<div class="card text-center">
    <div class="card-body">
        <form wire:submit.prevent="save">   
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif 
            <div class="mb-3">
                {{-- <label class="form-label"></label> --}}
                <div>
                    <div class="row">
                        @if (is_array($images) || is_object($images))                   
                        @forelse ($images as $item)
                        <div class="col-3 card me-1 mb-1">
                            <img src="{{ $item->temporaryUrl() }}">
                        </div>
                        @empty
                        @endforelse
                        @endif
                    </div>
                    <label class="flex flex-col items-center px-4 py-6 bg-white rounded-md shadow-md tracking-wide uppercase border border-blue cursor-pointer hover:bg-purple-600 hover:text-white text-purple-600 ease-linear transition-all duration-150">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                        </svg>
                        <span class="mt-2 text-base leading-normal">Select a file</span>
                        <input type='file' class="hidden" wire:model="images" multiple/>
                    </label>
                </div>
                <div wire:loading wire:target="images">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-600 mt-4 animate-bounce" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                    </svg>
                </div>
                @error('images.*') <span class="error">{{ $message }}</span> @enderror
            </div>
            <button type="submit" class="btn btn-primary">Confirm</button>
            <div wire:loading wire:target="save">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 ml-2 animate-spin" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                </svg>
            </div>
        </form>
    </div>
</div>