<x-app-layout>

<style>
    :root {
        --main-color: #4a76a8;
    }

    .bg-main-color {
        background-color: var(--main-color);
    }

    .text-main-color {
        color: var(--main-color);
    }

    .border-main-color {
        border-color: var(--main-color);
    }
</style>

<div class="bg-blue-50 -mb-6">
    <div class="container mx-auto my-5 p-5">
        <div class="md:flex no-wrap md:-mx-2 ">
            
            <!-- Left Side -->
            <div class="w-full md:w-3/12 md:mx-2">
                <!-- Profile Card -->
                <div class="bg-white p-3 border-t-4 border-blue-400">
                    <div class="image overflow-hidden">
                        <img class="h-auto w-full mx-auto"
                            src="{{$user->profile_photo_url }}" alt="{{ $user->name }}" >
                    </div>
                    <h1 class="text-gray-900 font-bold text-xl leading-8 my-1 capitalize">{{$user->name}}</h1>
                    <h3 class="text-gray-600 font-bold font-lg text-semibold leading-6 capitalize">{{$user->specialty}}</h3>
                    <p class="text-sm text-gray-500 hover:text-gray-600 leading-6 capitalize">{{$user->bio}}</p>
                    <ul class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                        <li class="flex items-center py-3">
                            <span>Rated</span>
                            <span class="ml-auto">
                                @if($avgrating->count() > 0)
                                ⭐<strong>{{round($avgrating->avg('rating'), 1)}}/5</strong>
                                @else
                                <strong>Rate me!</strong>⭐
                                @endif
                            </span>
                        </li>
                        <li class="flex items-center py-3">
                            <span>Status</span>
                            <span class="ml-auto">
                                {{ \Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}
                                @if(Cache::has('is_online' . $user->id))
                                <span class="bg-green-500 py-1 px-2 rounded text-white text-sm">Online</span>
                                @else
                                <span class="bg-red-500 py-1 px-2 rounded text-white text-sm">Offline</span>
                                @endif
                            </span>
                        </li>
                        <li class="flex items-center py-3">
                            <span>Member since</span>
                            <span class="ml-auto">{{$user->created_at->format('d M Y')}}</span>
                        </li>
                    </ul>
                </div>
                <!-- End of profile card -->
                <div class="my-4"></div>
                <!-- Calender -->
                <div class="bg-white p-3">
                    <div class="flex items-center space-x-3 font-semibold text-gray-900 text-xl leading-8">
                        <span class="text-blue-500">
                            <svg class="h-5 fill-current" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                            </svg>
                        </span>
                        <span>Calender</span>
                        @livewire('user-appointments', ['user' => $user], key($user->id))
                    </div>
                    <div class="mt-4">
                        <ul class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                            @foreach (App\Models\TimeSetting::days() as $day)
                            <li class="flex items-center py-3">
                            <span class="text-blue-800 text-sm font-bold">{{$day}}</span>
                            </li>
                                @forelse (App\Models\TimeSetting::all()->where('user_id', $user->id)->where('day', $day) as $item)
                                <button class="bg-blue-500 px-2 py-2 ml-1 mb-2 rounded text-white text-xs font-bold items-center transform hover:scale-125 motion-reduce:transform-none">
                                    {{$item->time1}}-{{$item->time2}}
                                </button>
                                @empty
                                <div class="text-teal-600"><span class=" text-gray-400 text-xs">No Times added!</span></div>
                                @endforelse
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- End of Calender -->
                <div class="my-4"></div>
                <!-- Friends card -->
                <div class="bg-white p-3 hover:shadow">
                    <div class="flex items-center space-x-3 font-semibold text-gray-900 text-xl leading-8">
                        <span class="text-blue-500">
                            <svg class="h-5 fill-current" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </span>
                        <span>Similar Profiles</span>
                    </div>
                    <div class="grid grid-cols-3">
                        <div class="text-center my-2">
                            <div class="relative inline-block">
                                <hr class="mx-32 md:inline-flex border-t border-gray-300"/>
                                @foreach ($user::latest()->where('specialty', $user->specialty)->paginate(7) as $item)
                                <div class="flex relative my-3">
                                    <div class="ml-2">
                                        <a href="{{ route('user.show', [$item->id]) }}" class="text-main-color">
                                            <img class="object-cover w-10 h-10 border-white rounded-full" src="{{ $item->profile_photo_url }}" alt="{{ $item->name }}">
                                        </a>
                                        @if(Cache::has('is_online' . $item->id))
                                        <div  class="bg-green-500 rounded-full w-3 h-3 absolute bottom-0 right-38"></div>
                                        @else
                                        <div class="bg-red-500 rounded-full w-3 h-3 absolute bottom-0 right-38"></div>
                                        @endif
                                    </div>
                                    <div class="flex-auto items-center ml-4 mt-1">
                                        <div class="text-gray-700 font-semibold">
                                            {{$item->specialty}}
                                        </div>
                                        <div class="text-gray-600 text-xs font-thin">
                                            {{$item->gender}}
                                        </div>
                                    </div>
                                    <div class="text-red-400 text-xs ml-4 mt-1">{{ \Carbon\Carbon::parse($item->last_seen)->diffForHumans() }}</div>
                                </div>
                                <div class="border-t border-gray-100"></div>
                                @endforeach
                                <div class="border-t border-gray-100"></div>
                                <div class="ml-2">
                                    <a href="{{ route( 'dashboard') }}" class="text-main-color">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="m-2 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                                        </svg>
                                    </a>
                                    <div  class="bg-green-500 rounded-full w-3 h-3 absolute bottom-0 right-18"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of friends card -->
            </div>
           
            <!-- Right Side -->
            <div class="w-full md:w-9/12">
                <!-- Profile tab -->                
                <!-- About Section -->
                <div class=" mt-4 md:mt-0 bg-white p-3 shadow-sm rounded-sm">
                    <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                        <span clas="text-green-500">
                            <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </span>
                        <span class="tracking-wide">About</span>
                    </div>
                    <div class="text-gray-700">
                        <div class="grid md:grid-cols-2 text-sm">
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Full Name</div>
                                <div class="px-4 py-2 capitalize">{{$user->name}}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Marital Status</div>
                                <div class="px-4 py-2 capitalize">{{$user->marital_status}}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Gender</div>
                                @if($user->gender=='m')
                                <div class="px-4 py-2 capitalize">male</div>
                                @else
                                <div class="px-4 py-2 capitalize">female</div>
                                @endif
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-bold">Contact No.</div>
                                <div class="px-4 py-2">
                                    <h6 class="font-bold">+216{{$user->tel}}</h6>
                                    <a href="tel:+216{{$user->tel}}">
                                        <svg  class="text-blue-500 h-6 w-6 -mt-6 ml-28" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M17.924 2.617a.997.997 0 00-.215-.322l-.004-.004A.997.997 0 0017 2h-4a1 1 0 100 2h1.586l-3.293 3.293a1 1 0 001.414 1.414L16 5.414V7a1 1 0 102 0V3a.997.997 0 00-.076-.383z" />
                                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <div class="grid grid-cols-2">
                                @if($item->role == 'E-health Care') 
                                <div class="px-4 py-2 font-semibold">Cabinet Address</div>
                                @else
                                <div class="px-4 py-2 font-semibold">Current Address</div>
                                @endif
                                <div class="px-4 py-2 capitalize">{{$user->adresse}}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Permanant Address</div>
                                <div class="px-4 py-2 capitalize">{{$user->adresse2}}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-bold">Email.</div>
                                <div class="px-2 py-2">
                                    <a class="text-blue-800" href="mailto:{{$user->email}}">
                                        {{$user->email}}
                                    </a>
                                </div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Birthday</div>
                                <div class="px-4 py-2">{{$user->date_of_birth}}</div>
                            </div>
                        </div>
                    </div>
                    {{-- <button class="block w-full text-blue-800 text-sm font-semibold rounded-lg hover:bg-gray-100 focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4">Show
                        Full Information
                    </button> --}}
                </div>
                <!-- End of about section -->
                <div class="my-4"></div>
                <!-- Experience and education -->
                <div class="bg-white p-3 shadow-sm rounded-sm">

                    <div class="grid md:grid-cols-2">
                        <div>
                            <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                <span clas="text-green-500">
                                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </span>
                                <span class="tracking-wide">Experience</span>
                            </div>
                            <ul class="list-inside space-y-2">
                                @forelse (App\Models\Experience::all()->where('user_id', $user->id) as $item)
                                <li>
                                    <div class="text-teal-600"><strong class="text-blue-800 capitalize">{{$item->occupation}}</strong> at <strong class="capitalize">{{$item->company}}</strong>.</div>
                                    <div class="text-gray-500 text-xs">From <strong>{{$item->start_date}}</strong> To <strong>{{$item->end_date}}</strong></div>
                                </li>
                                @empty
                                <li>
                                    <div class="text-teal-600">No experiences added!</div>
                                    <div class="text-gray-500 text-xs">start date - end date</div>
                                </li>
                                @endforelse
                            </ul>
                        </div>
                        <div class="mt-4 md:mt-0">
                            <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                <span clas="text-green-500">
                                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path fill="#fff" d="M12 14l9-5-9-5-9 5 9 5z" />
                                        <path fill="#fff"
                                            d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                                    </svg>
                                </span>
                                <span class="tracking-wide">Education</span>
                            </div>
                            <ul class="list-inside space-y-2">
                                @forelse (App\Models\Education::all()->where('user_id', $user->id) as $item)
                                <li>
                                    <div class="text-teal-600"><strong class="text-blue-800 capitalize">{{$item->formation}}</strong> at <strong class="capitalize">{{$item->institute}}</strong>.</div>
                                    <div class="text-gray-500 text-xs">From <strong>{{$item->start_date}}</strong> To <strong>{{$item->end_date}}</strong></div>
                                </li>
                                @empty
                                <li>
                                    <div class="text-teal-600">No Education added!</div>
                                    <div class="text-gray-500 text-xs">start date - end date</div>
                                </li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                    <!-- End of Experience and education grid -->
                </div>
                <!-- End of experience and education -->
                <div class="my-4"></div>
                <!-- Rating -->
                @if(($user->role == 'E-health Care'))
                @livewire('user-ratings', ['user' => $user], key($user->id))
                @endif
                <!-- End of profile tab -->
            </div>
        </div>
    </div>
</div>

</x-app-layout>
