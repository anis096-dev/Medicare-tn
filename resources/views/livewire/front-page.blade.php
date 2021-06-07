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
        <div class="flex justify-end sm:w-8/12">
            {{-- Top Navigation --}}
            <ul class="hidden sm:flex sm:text-left text-blue-500 text-sm">
                @foreach ($topNavLinks as $item)
                    <a href="{{ url('/'.$item->slug) }}">
                        @if($item->slug == 'contact')
                        <li class="cursor-pointer px-4 py-2 hover:bg-blue-100 rounded font-bold"><a href="#contact">{{$item->label}}</a></li>
                        @else
                        <li class="cursor-pointer px-4 py-2 hover:bg-blue-100 rounded font-bold">{{ $item->label }}</li>
                        @endif
                    </a>
                @endforeach
            </ul>
            @if (Route::has('login'))
                <div class="sm:flex sm:text-left text-blue-500 text-sm">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="cursor-pointer px-4 py-2 hover:bg-blue-100 rounded font-bold">Dashboard</a>
                    @else
                    <div class="flex justify-end sm:w-auto items-center">
                        <a href="{{ route('login') }}" class="cursor-pointer md:px-4 px-2 py-2 hover:bg-blue-100 rounded font-bold">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-0 cursor-pointer md:px-4 px-2 py-2 hover:bg-blue-100 rounded font-bold">Register</a>
                        @endif
                    </div>
                    @endauth
                </div>
            @endif
        </div>
    </nav>
    <div class="sm:min-h-screen">
        <aside class=" md:hidden bg-white text-blue-500 divide-y divide-gray-100 divide-dashed sm:w-4/12 md:w-3/12 lg:w-2/12">
            {{-- Mobile Web View --}}
            <div :class="show ? 'block' : 'hidden'" class="pb-3 divide-y divide-gray-100 block sm:hidden">
                {{-- Top Navigation Mobile Web View --}}
                <ul class="text-blue-500 text-sm font-bold">
                    @foreach ($topNavLinks as $item)
                        <a href="{{ url('/'.$item->slug) }}">
                            @if($item->slug == 'contact')
                            <li class="cursor-pointer px-4 py-2 hover:bg-blue-100"><a href="#contact">{{$item->label}}</a></li>
                            @else
                            <li class="cursor-pointer px-4 py-2 hover:bg-blue-100">{{ $item->label }}</li>
                            @endif
                        </a>
                    @endforeach 
                </ul>
            </div>
        </aside>
        <div class="border-t border-blue-600"></div>
        <main class="bg-blue-50">
            <section class="divide-y text-gray-900">
                <!-- header -->
                <div id="header" class="relative bg-white overflow-hidden pb-2">
                    <div class="max-w-full mx-auto">
                    <div class="relative z-10 pb-8 bg-transparent sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
                        <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
                        <div class="sm:text-center lg:text-left">
                            <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                            <span class="block xl:inline">Data to enrich your</span>
                            <span class="block text-indigo-600 xl:inline">online business</span>
                            </h1>
                            <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                            Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure qui lorem cupidatat commodo. Elit sunt amet fugiat veniam occaecat fugiat aliqua.
                            </p>
                            <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                            <div class=" animate-pulse rounded-md shadow">
                                <a href="#RDV" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 md:py-4 md:text-lg md:px-10">
                                Get started
                                </a>
                            </div>
                            <div class="mt-3 sm:mt-0 sm:ml-3">
                                <a href="#" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 md:py-4 md:text-lg md:px-10">
                                Live demo
                                </a>
                            </div>
                            </div>
                        </div>
                        </main>
                    </div>
                    </div>
                    <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
                    <img class="h-65 w-full rounded-b-full rounded-bl-full rounded-l-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full shadow-2xl" src="{{url('/img/infirmier.jpg')}}" alt="Image">
                    </div>
                </div>
                <!-- health Care --> 
                <div id="RDV">
                    @livewire('find-ehealth-care')
                </div> 
                <!-- Statistics -->
                <div class="text-gray-600 bg-white body-font">
                    <div class="container px-5 py-24 mx-auto">
                      <div class="flex flex-col text-center w-full mb-20">
                        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Statistics</h1>
                        <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Whatever cardigan tote bag tumblr hexagon brooklyn asymmetrical gentrify, subway tile poke farm-to-table. Franzen you probably haven't heard of them man bun deep jianbing selfies heirloom prism food truck ugh squid celiac humblebrag.</p>
                      </div>
                      <div class="flex flex-wrap -m-4 text-center">
                        <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                          <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class=" animate-bounce text-indigo-500 w-12 h-12 mb-3 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <h2 class="title-font font-medium text-3xl text-gray-900">{{App\Models\Appointment::count()}}</h2>
                            <p class="leading-relaxed">Appointments</p>
                          </div>
                        </div>
                        <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                          <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class=" animate-pulse text-indigo-500 w-12 h-12 mb-3 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor" 
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                                </svg>
                            <h2 class="title-font font-medium text-3xl text-gray-900">{{App\Models\User::where('role', 'E-Health Care')->count()}}</h2>
                            <p class="leading-relaxed">Healthcare professionals</p>
                          </div>
                        </div>
                        <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                            <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class=" animate-pulse text-indigo-500 w-12 h-12 mb-3 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                     fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                              <h2 class="title-font font-medium text-3xl text-gray-900">{{App\Models\User::where('role', 'Patient')->count()}}</h2>
                              <p class="leading-relaxed">Patients</p>
                            </div>
                        </div>
                        <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                          <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class=" animate-pulse text-indigo-500 w-12 h-12 mb-3 inline-block" viewBox="0 0 24 24"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <h2 class="title-font font-medium text-3xl text-gray-900">{{App\Models\Specialty::count()}}</h2>
                            <p class="leading-relaxed">Specialties</p>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
                <!-- contact -->
                <div id="contact" class="relative bg-blue-50 overflow-hidden">
                   @livewire('contact-form')
                </div>
            </section>
        </main>
    </div>   
</div>