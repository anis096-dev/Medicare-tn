<section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto">
      <div class="flex flex-col text-center w-full mb-20">
        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">{{__('Find a Professionals')}}</h1>
        <p class="lg:w-2/3 mx-auto leading-relaxed text-base">{{__('Find an available Health specialist near you!!')}}</p>
        <p class="lg:w-2/3 mx-auto leading-relaxed text-base">{{__('Which professional are you looking for?')}}</p>
        <div class="flex flex-col sm:flex-row items-center justify-center mt-2 mb-2">
            @forelse($specialties as $item)
            <button type="button" value="{{ $name = $item->name }}" onclick="openPopover(event,'popover-id')" class="bg-blue-500 px-2 py-2 ml-2 mb-2 rounded text-white text-sm font-bold items-center focus:bg-blue-400">
                {{ $item->name }}
            </button>
            <div id="popover-id" class="hidden bg-blue-400 border-0 mb-3 z-50 shadow-2xl font-bold leading-normal text-sm max-w-xs text-left no-underline break-words rounded-lg">
                <div class="p-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mb-1" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                    </svg>
                    @if( $item->name == $name)
                    {{$item->description}}
                    @else
                    {{__('empty..')}}
                    @endif
                </div>
            </div>
            @empty
            <button>{{__('empty..')}}</button>
            @endforelse
        </div>
        <p class="lg:w-2/3 mx-auto leading-relaxed text-base underline font-bold">{{__('SIMPLE, FAST AND FREE !')}}</p>
        </div>
      <div class="mb-1">
        <!-- Filter -->
        <div class="flex-col items-center md:justify-end justify-start px-4 py-3 space-y-2 text-left -ml-4">
            <select wire:model="selectedSpecialty" class="border border-gray-300 text-gray-600 h-14 mr-1 rounded bg-white hover:border-gray-400 focus:outline-none appearance-none">
                <option value="">{{__('--specialty--')}}</option>
                @forelse($specialties as $item)
                <option>{{$item->name}}</option>    
                @empty
                <option>{{__('empty..')}}</option>
                @endforelse
            </select>
            <select wire:model="selectedGender" class="border border-gray-300 text-gray-600 h-14 mr-1 rounded bg-white hover:border-gray-400 focus:outline-none appearance-none">
                <option value="">{{__('--gender--')}}</option>
                @forelse($genders as $item)
                @if($item == 'm')
                <option value="{{$item}}">{{__('Male')}}</option>
                @else
                <option value="{{$item}}">{{__('Female')}}</option>
                @endif   
                @empty
                <option>{{__('empty..')}}</option>
                @endforelse
            </select>
            <select wire:model="selectedGovernorate" class="border border-gray-300 text-gray-600 h-14 mr-1 rounded bg-white hover:border-gray-400 focus:outline-none appearance-none">
                <option value="">{{__('--Governorate--')}}</option>
                @forelse(App\Models\User::governorates() as $item)
                <option>{{$item}}</option>
                @empty
                <option>{{__('empty..')}}</option>
                @endforelse
            </select>
            <select wire:model="selectedAdresse" class="border border-gray-300 text-gray-600 h-14 mr-1 rounded bg-white hover:border-gray-400 focus:outline-none appearance-none">
                <option value="">{{__('--adresse--')}}</option>
                @forelse($adresses as $item)
                <option>{{$item->adresse}}</option>
                @empty
                <option>{{__('empty..')}}</option>
                @endforelse
            </select>
            <select class="border border-gray-300 text-gray-600 h-14 mr-1 rounded bg-white hover:border-gray-400 focus:outline-none appearance-none" wire:model="perPage">
                <option>12</option>
                <option>24</option>
                <option>48</option>
            </select>
            <button class="border border-gray-300 text-center h-14 p-2 mr-1 border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none appearance-none" wire:click="resetFilter">
               {{__('Reset All')}}
            </button>
        </div>
    </div>
    <div class="flex flex-wrap -m-2 mt-3">
        @forelse ($data->whereIn('role', 'Health specialist') as $item)
            <div class="p-2 lg:w-1/3 md:w-1/2 w-full">
                <a href="{{ route('user.show', [$item->id]) }}" target="_blank">
                    <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg hover:bg-blue-200 transform scale-100 hover:scale-105">
                        <img alt="team" class="w-16 h-16 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4" src="{{ $item->profile_photo_url }}" alt="{{ $item->name }}">
                        <div class="flex-grow">
                            <h2 class="text-gray-900 title-font font-medium">{{$item->name}}</h2>
                            <p class="text-gray-500"><span class="text-blue-500 font-bold">{{__($item->specialty) }}</span></p>
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
                                <span class="bg-green-700 py-1 px-2 rounded-full text-white text-sm">{{__('Online')}}</span>
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
                            <h2 class="text-gray-900 title-font font-medium">{{__('No Results Found')}}</h2>
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
    <script src="https://unpkg.com/@popperjs/core@2.9.1/dist/umd/popper.min.js" charset="utf-8"></script>
        <script>
            function openPopover(event,popoverID){
            let element = event.target;
            while(element.nodeName !== "BUTTON"){
            element = element.parentNode;
            }
            var popper = Popper.createPopper(element, document.getElementById(popoverID), {
            placement: 'top'
            });
            document.getElementById(popoverID).classList.toggle("hidden");
            }
        </script>
</section> 