<div class="divide-y divide-gray-100" x-data="{ show: false }">
    <nav class="flex items-center bg-blue-500 px-3 py-2 shadow-lg">
        <div>
            <button @click="show =! show" class="block h-8 mr-3 text-gray-400 items-center hover:text-gray-200 focus:text-gray-200 focus:outline-none sm:hidden">
                <svg class="w-8 fill-current" viewBox="0 0 24 24">                            
                    <path x-show="!show" fill-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"/>
                    <path x-show="show" fill-rule="evenodd" d="M18.278 16.864a1 1 0 0 1-1.414 1.414l-4.829-4.828-4.828 4.828a1 1 0 0 1-1.414-1.414l4.828-4.829-4.828-4.828a1 1 0 0 1 1.414-1.414l4.829 4.828 4.828-4.828a1 1 0 1 1 1.414 1.414l-4.828 4.829 4.828 4.828z"/>
                </svg>
            </button>
        </div>
        <div class="h-12 w-full flex items-center">
            <a class="font-bold text-white" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
        </div>
        <div class="flex justify-end sm:w-8/12">
            {{-- Top Navigation --}}
            <ul class="hidden sm:flex sm:text-left text-white text-xs">
                @foreach ($topNavLinks as $item)
                    <a href="{{ url('/'.$item->slug) }}">
                        <li class="cursor-pointer px-4 py-2 hover:bg-blue-700 rounded font-bold">{{ $item->label }}</li>
                    </a>
                @endforeach 
            </ul>
            @if (Route::has('login'))
                <div class="sm:flex sm:text-left text-white text-xs">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="cursor-pointer px-4 py-2 hover:bg-blue-700 rounded font-bold">Dashboard</a>
                    @else
                    <div class="flex justify-end sm:w-auto items-center">
                        <a href="{{ route('login') }}" class="cursor-pointer md:px-4 px-2 py-2 hover:bg-blue-700 rounded font-bold">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-0 cursor-pointer md:px-4 px-2 py-2 hover:bg-blue-700 rounded font-bold">Register</a>
                        @endif
                    </div>
                    @endauth
                </div>
            @endif
        </div>
    </nav>
    <div class="sm:flex sm:min-h-screen">
        <aside class=" md:hidden bg-blue-600 text-white divide-y divide-gray-100 divide-dashed sm:w-4/12 md:w-3/12 lg:w-2/12">
            {{-- Desktop Web View
            <ul class="hidden text-gray-200 text-xs sm:block sm:text-left">
                @foreach ($sideBarLinks as $item)
                    <a href="{{ url('/'.$item->slug) }}">
                        <li class="cursor-pointer px-4 py-2 hover:bg-blue-50">{{ $item->label }}</li>
                    </a>
                @endforeach                
            </ul> --}}

            {{-- Mobile Web View --}}
            <div :class="show ? 'block' : 'hidden'" class="pb-3 divide-y divide-gray-100 block sm:hidden">
                <ul class="text-gray-200 text-xs">
                    @foreach ($sideBarLinks as $item)
                        <a href="{{ url('/'.$item->slug) }}">
                            <li class="cursor-pointer px-4 py-2 hover:bg-blue-50 hover:text-gray-700">{{ $item->label }}</li>
                        </a>
                    @endforeach      
                </ul>

                {{-- Top Navigation Mobile Web View --}}
                <ul class="text-gray-200 text-xs">
                    @foreach ($topNavLinks as $item)
                        <a href="{{ url('/'.$item->slug) }}">
                            <li class="cursor-pointer px-4 py-2 hover:bg-blue-50 hover:text-gray-700">{{ $item->label }}</li>
                        </a>
                    @endforeach 
                </ul>
            </div>
        </aside>
        <main class="bg-gray-100 p-12 min-h-screen sm:w-8/12 md:w-9/12 lg:w-10/12">
            <section class="divide-y text-gray-900">    
                <h1 class="text-3xl font-bold">{{ $title }}</h1>
                <article>
                    <div class="mt-5 text-sm">                        
                         {!! $content !!}
                    </div>
                </article>
            </section>
        </main>
    </div>    
</div>