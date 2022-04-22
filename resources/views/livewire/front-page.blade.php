<div class="divide-y divide-gray-100" x-data="{ show: false }">
    <nav class="flex items-center bg-white px-3 py-2 shadow-lg">
        <div>
            <button @click="show =! show" class="block h-8 mr-3 text-gray-400 items-center hover:text-gray-200 focus:text-gray-200 focus:outline-none sm:hidden">
                <svg class="w-8 fill-current" viewBox="0 0 24 24">                            
                    <path x-show="!show" fill-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"/>
                    <path x-show="show" fill-rule="evenodd" d="M18.278 16.864a1 1 0 0 1-1.414 1.414l-4.829-4.828-4.828 4.828a1 1 0 0 1-1.414-1.414l4.828-4.829-4.828-4.828a1 1 0 0 1 1.414-1.414l4.829 4.828 4.828-4.828a1 1 0 1 1 1.414 1.414l-4.828 4.829 4.828 4.828z"/>
                </svg>
            </button>
        </div>
        <div class="h-12 w-full sm:ml-4 flex items-center font-bold">
            <a class="text-blue-500 text-xl" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
        </div>
        <div class="flex justify-start sm:w-12/12">
            {{-- Top Navigation --}}
            <ul class="hidden sm:flex text-blue-500 text-sm">
                @foreach ($topNavLinks as $item)
                    <a href="{{ url('/'.$item->slug) }}">
                        <li class="cursor-pointer px-4 py-2 hover:bg-blue-100 rounded font-bold">{{__($item->label)}}</li>
                    </a>
                @endforeach
            </ul>
        </div>
        @if (Route::has('login'))
            <div class="flex text-blue-500 text-sm">
                @auth
                    <a href="{{ url('/dashboard') }}" class="cursor-pointer px-2 py-2 hover:bg-blue-100 rounded font-bold">{{__('Dashbord')}}</a>
                @else
                    <a class="flex cursor-pointer px-4 py-2 text-blue-500 hover:bg-blue-100 rounded font-bold" href="{{ route('login') }}">
                        <svg class="mr-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                        </svg>
                        {{__('Login')}}
                    </a>
                @if (Route::has('register'))
                    <a class="flex cursor-pointer pl-2 pr-4 py-2 text-blue-500 hover:bg-blue-100 rounded font-bold" href="{{ route('register') }}">
                        <svg class="mr-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                        </svg>
                        {{__('Register')}}
                    </a>
                @endif
                @endauth
            </div>
        @endif
    </nav>
    <div class="sm:min-h-screen">
        <aside class=" md:hidden bg-white text-blue-500 divide-y divide-gray-100 divide-dashed sm:w-4/12 md:w-3/12 lg:w-2/12">
            {{-- Mobile Web View --}}
            <div :class="show ? 'block' : 'hidden'" class="pb-3 divide-y divide-gray-100 block sm:hidden">
                {{-- Top Navigation Mobile Web View --}}
                <ul class="text-blue-500 text-sm font-bold">
                    @foreach ($topNavLinks as $item)
                        <a href="{{ url('/'.$item->slug) }}">
                            <li class="cursor-pointer px-4 py-2 hover:bg-blue-100">{{__($item->label)}}</li>
                        </a>
                    @endforeach 
                </ul>
            </div>
        </aside>
        <div class="border-t border-blue-600"></div>
        
        <main class="bg-blue-50">
            @if(App\Models\Page::where('slug', $title))
            @livewire($title)
            @endif
        </main>
    </div> 
</div>