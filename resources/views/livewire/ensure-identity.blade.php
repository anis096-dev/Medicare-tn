<div class="bg-white py-6 sm:py-8 lg:py-12">
    <div class="max-w-screen-xl px-4 md:px-8 mx-auto">
        <!-- text - start -->
        <div class="mb-10 md:mb-16">
            <h2 class="text-gray-800 text-2xl lg:text-3xl font-bold text-center mb-4 md:mb-6">Confirm Your Identity</h2>
            <p class="max-w-screen-md text-gray-500 md:text-lg text-center mx-auto font-bold">
                Great, just one last step to fully activate your account, you must upload a photo of your identity card to ensure credibility with patients.
            </p>
        </div>
        <!-- text - end -->
    
        <div class="grid-cols-2 lg:grid-cols-3 gap-x-4 lg:gap-x-8 gap-y-6 sm:gap-y-8 lg:gap-y-12">
            <form wire:submit.prevent="save">   
                @if (session()->has('success'))
                    <script>
                        setTimeout(function() {
                        window.location.href = "/"
                        }, 6000); // 6 second
                    </script>
                @endif
                <div class="mb-4">
                    {{-- <label class="form-label"></label> --}}
                    <div>
                        <div class="inline-flex justify-center mb-1">
                            @if (is_array($images) || is_object($images))                   
                            @forelse ($images as $item)
                            <div class="col-3 ml-1 mb-1">
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
                    @error('images.*') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="flex justify-center">
                    <x-jet-secondary-button type="submit" class="text-gray-500 text-center font-bold hover:bg-blue-200">
                        {{ __('Confirm') }}
                    </x-jet-secondary-button>
                    <div wire:loading wire:target="images">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 ml-2 -mb-2 animate-spin" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                    </div>
                    <div wire:loading wire:target="save">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 ml-2 -mb-2 animate-spin" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                    </div>
                </div>
            </form>
        </div>  
    </div>
</div>
