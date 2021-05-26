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
                            <li class="cursor-pointer px-4 py-2 hover:bg-blue-100">{{ $item->label }}</li>
                        </a>
                    @endforeach 
                </ul>
            </div>
        </aside>
        <main class="bg-blue-50 p-12">
            <section class="divide-y text-gray-900">
                <!-- header -->
                <div id="header" class="relative bg-white overflow-hidden rounded-lg">
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
                            <div class="rounded-md shadow">
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
                    <img class="h-56 w-full rounded-l-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full" src="https://images.unsplash.com/photo-1532938911079-1b06ac7ceec7?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=889&q=80" alt="">
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
                        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Master Cleanse Reliac Heirloom</h1>
                        <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Whatever cardigan tote bag tumblr hexagon brooklyn asymmetrical gentrify, subway tile poke farm-to-table. Franzen you probably haven't heard of them man bun deep jianbing selfies heirloom prism food truck ugh squid celiac humblebrag.</p>
                      </div>
                      <div class="flex flex-wrap -m-4 text-center">
                        <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                          <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="text-indigo-500 w-12 h-12 mb-3 inline-block" viewBox="0 0 24 24">
                              <path d="M8 17l4 4 4-4m-4-5v9"></path>
                              <path d="M20.88 18.09A5 5 0 0018 9h-1.26A8 8 0 103 16.29"></path>
                            </svg>
                            <h2 class="title-font font-medium text-3xl text-gray-900">2.7K</h2>
                            <p class="leading-relaxed">Downloads</p>
                          </div>
                        </div>
                        <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                          <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="text-indigo-500 w-12 h-12 mb-3 inline-block" viewBox="0 0 24 24">
                              <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"></path>
                              <circle cx="9" cy="7" r="4"></circle>
                              <path d="M23 21v-2a4 4 0 00-3-3.87m-4-12a4 4 0 010 7.75"></path>
                            </svg>
                            <h2 class="title-font font-medium text-3xl text-gray-900">1.3K</h2>
                            <p class="leading-relaxed">Users</p>
                          </div>
                        </div>
                        <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                          <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="text-indigo-500 w-12 h-12 mb-3 inline-block" viewBox="0 0 24 24">
                              <path d="M3 18v-6a9 9 0 0118 0v6"></path>
                              <path d="M21 19a2 2 0 01-2 2h-1a2 2 0 01-2-2v-3a2 2 0 012-2h3zM3 19a2 2 0 002 2h1a2 2 0 002-2v-3a2 2 0 00-2-2H3z"></path>
                            </svg>
                            <h2 class="title-font font-medium text-3xl text-gray-900">74</h2>
                            <p class="leading-relaxed">Files</p>
                          </div>
                        </div>
                        <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                          <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="text-indigo-500 w-12 h-12 mb-3 inline-block" viewBox="0 0 24 24">
                              <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                            </svg>
                            <h2 class="title-font font-medium text-3xl text-gray-900">46</h2>
                            <p class="leading-relaxed">Places</p>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
                <!-- contact -->
                <div id="contact" class="relative bg-blue-50 overflow-hidden">
                    <div class="container px-5 py-24 mx-auto flex sm:flex-nowrap flex-wrap">
                      <div class="lg:w-2/3 md:w-1/2 bg-gray-300 rounded-lg overflow-hidden sm:mr-10 p-10 flex items-end justify-start relative">
                        <iframe width="100%" height="100%" class="absolute inset-0" frameborder="0" title="map" marginheight="0" marginwidth="0" scrolling="no" 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d25656.842368304155!2d8.761381942417746!3d36.50332026727691!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12fb124ea3099bff%3A0x6bef4f37f93342da!2sJendouba!5e0!3m2!1sfr!2stn!4v1621873402103!5m2!1sfr!2stn" 
                        style="filter: grayscale(1) contrast(1.2) opacity(0.4);"></iframe>
                        <div class="bg-white relative flex flex-wrap py-6 rounded shadow-md">
                          <div class="lg:w-1/2 px-6">
                            <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs">ADDRESS</h2>
                            <p class="mt-1">17 AV Farhat Hached Jendubah 8100</p>
                          </div>
                          <div class="lg:w-1/2 px-6 mt-4 lg:mt-0">
                            <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs">EMAIL</h2>
                            <a class="text-indigo-500 leading-relaxed">admin@medicare.tn</a>
                            <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs mt-4">PHONE</h2>
                            <p class="leading-relaxed">+216-25219853</p>
                          </div>
                        </div>
                      </div>
                      <div class="lg:w-1/3 md:w-1/2 bg-white p-5 rounded-md flex flex-col md:ml-auto w-full md:py-8 mt-8 md:mt-0">
                        <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">Feedback</h2>
                        <p class="leading-relaxed mb-5 text-gray-600">Post-ironic portland shabby chic echo park, banjo fashion axe</p>
                        <div class="relative mb-4">
                          <label for="name" class="leading-7 text-sm text-gray-600">Name</label>
                          <input type="text" id="name" name="name" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        <div class="relative mb-4">
                          <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
                          <input type="email" id="email" name="email" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        <div class="relative mb-4">
                          <label for="message" class="leading-7 text-sm text-gray-600">Message</label>
                          <textarea id="message" name="message" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                        </div>
                        <button class="text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Send</button>
                        <p class="text-xs text-gray-500 mt-3">Chicharrones blog helvetica normcore iceland tousled brook viral artisan.</p>
                      </div>
                    </div>
                </div>
            </section>
        </main>
    </div>   
</div>