<section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto">
      <div class="flex flex-col text-center w-full mb-20">
        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">{{__('Find a Professionals')}}</h1>
        <p class="lg:w-2/3 mx-auto leading-relaxed text-base">{{__('Find an available health professional near you!!')}}</p>
        <p class="lg:w-2/3 mx-auto leading-relaxed text-base">{{__('Which professional are you looking for?')}}</p>
        <div class="flex items-center justify-center mt-2 mb-2">
            @forelse($specialties as $item)
            <a class="bg-blue-500 px-2 py-2 ml-2 mb-2 rounded text-white text-xs font-bold items-center">
                {{$item->name}}
            </a>
            @empty
            <button>empty..</button>
            @endforelse
        </div>
        <p class="lg:w-2/3 mx-auto leading-relaxed text-base underline font-bold">{{__('SIMPLE, FAST AND FREE !')}}</p>
        </div>
      <div class="mb-1">
        <!-- Filter -->
        <div class="flex-col items-center md:justify-end justify-start px-4 py-3 space-y-2 text-left -ml-4">
            <select wire:model="selectedSpecialty" class="border border-gray-300 text-gray-600 h-14 mr-1 rounded bg-white hover:border-gray-400 focus:outline-none appearance-none">
                <option value="">--specialty--</option>
                @forelse($specialties as $item)
                <option>{{$item->name}}</option>    
                @empty
                <option>empty..</option>
                @endforelse
            </select>
            <select wire:model="selectedGender" class="border border-gray-300 text-gray-600 h-14 mr-1 rounded bg-white hover:border-gray-400 focus:outline-none appearance-none">
                <option value="">--gender--</option>
                @forelse($genders as $item)
                @if($item == 'm')
                <option value="{{$item}}">male</option>
                @else
                <option value="{{$item}}">female</option>
                @endif   
                @empty
                <option>empty..</option>
                @endforelse
            </select>
            <select wire:model="selectedGovernorate" class="border border-gray-300 text-gray-600 h-14 mr-1 rounded bg-white hover:border-gray-400 focus:outline-none appearance-none">
                <option value="">--Governorate--</option>
                @forelse(App\Models\User::governorates() as $item)
                <option>{{$item}}</option>
                @empty
                <option>empty..</option>
                @endforelse
            </select>
            <select wire:model="selectedAdresse" class="border border-gray-300 text-gray-600 h-14 mr-1 rounded bg-white hover:border-gray-400 focus:outline-none appearance-none">
                <option value="">--adresse--</option>
                @forelse($adresses as $item)
                <option>{{$item->adresse}}</option>
                @empty
                <option>empty..</option>
                @endforelse
            </select>
            <select class="border border-gray-300 text-gray-600 h-14 mr-1 rounded bg-white hover:border-gray-400 focus:outline-none appearance-none" wire:model="perPage">
                <option>12</option>
                <option>24</option>
                <option>48</option>
            </select>
            <button class="border border-gray-300 text-center h-14 p-2 mr-1 border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none appearance-none" wire:click="resetFilter">
                Reset All
            </button>
        </div>
    </div>
    <div class="flex flex-wrap -m-2 mt-3">
        @forelse ($data->whereIn('role', 'E-health Care') as $item)
            <div class="p-2 lg:w-1/3 md:w-1/2 w-full">
                <a href="{{ route('user.show', [$item->id]) }}" target="_blank">
                    <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg hover:bg-blue-200 transform scale-100 hover:scale-105">
                        <img alt="team" class="w-16 h-16 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4" src="{{ $item->profile_photo_url }}" alt="{{ $item->name }}">
                        <div class="flex-grow">
                            <h2 class="text-gray-900 title-font font-medium">{{$item->name}}</h2>
                            <p class="text-gray-500"><span class="text-blue-500 font-bold">{{ $item->specialty }}</span></p>
                            <p class="text-gray-500">@:{{ $item->adresse }}</p>
                            <p class="mt-2 text-gray-500">
                                <span class="ml-auto">
                                    ⭐<strong>{{round($ratings->where('related_id', $item->id )->avg('rating'), 1)}}/5</strong>
                                </span>
                            </p>
                        </div>
                        <div>
                            <span class="ml-auto">
                                @if(Cache::has('is_online' . $item->id))
                                <span class="bg-green-700 py-1 px-2 rounded-full text-white text-sm">Online</span>
                                @endif
                            </span>
                        </div>
                    </div>
                </a>
            </div>
        @empty
            <tr>
                <div class=" animate-pulse p-2 lg:w-1/3 md:w-1/2 w-full">
                    <a href="#">
                        <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg hover:bg-blue-200 transform scale-100 hover:scale-105">
                            <img alt="team" class="w-16 h-16 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4" src="http://2.gravatar.com/avatar/2d9365469e191bf018ba7f01070a04f3?s=150&r=g&d=http://www.courtderriere.re/wp-content/plugins/userswp/assets/images/no_profile.png">
                            <div class="flex-grow">
                            <h2 class="text-gray-900 title-font font-medium">No Results Found</h2>
                            <p class="text-gray-500">.......</p>
                            <p class="text-gray-500">
                                <span class="ml-auto">
                                    ⭐<strong>0/5</strong>
                                </span>
                            </p>
                            </div>
                        </div>
                    </a>
                </div>
            </tr>
        @endforelse
    </div>
    <div class="mt-5">
    {{ $data->links() }}
    </div>
    </div>
    </div>
</section> 