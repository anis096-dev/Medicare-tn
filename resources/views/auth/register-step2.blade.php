<x-guest-layout>
    <section class="flex flex-col items-center h-screen md:flex-row lg:overflow-hidden">
        <div class="flex-none w-screen h-96 md:h-screen p-6 relative bg-white lg:block md:w-1/2 lg:w-2/2">
            <div class="absolute inset-0 w-full h-full object-cover" id="map-example-container"></div>
        </div>
        <div class="flex items-center justify-center w-full h-screen px-6 bg-white md:max-w-md lg:-mt-16 lg:max-w-full md:mx-auto md:w-1/2 xl:w-1/2 lg:px-16 xl:px-12">
            <div class="w-full h-100">
                <form class="lg:-mt-16 md:mt-6" method="POST" action="{{ route('register-step2.store') }}">
                    @csrf
                    <h1 class="mt-4 md:mt-12 text-2xl font-semibold text-black tracking-ringtighter sm:text-3xl title-font">
                        <a class="text-3xl font-medium text-black" href="{{ url('/') }}">
                            {{ config('app.name', 'Laravel') }}
                        </a>                  
                    </h1>

                    <div class="flex items-center mt-5 md:-ml-2 lg:-mt-8 justify-end">
                        <x-jet-button class="ml-6">
                            {{ __('Finish Registeration') }}
                        </x-jet-button>
                    </div>

                    @if(auth()->user()->role == 'E-health Care')
                    <div class="mt-4">
                        <x-jet-label for="bio" value="{{ __('Bio') }}" />
                        <textarea id="bio" class="lg:h-40 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" type="text" name="bio" value="{{ old('bio') }}"></textarea>
                        @error('bio') <span class="error">{{ $message }}</span> @enderror            
                    </div>
                    @endif

                    <div class="mt-4">
                        <x-jet-label for="Governorate" value="{{ __('Governorate') }}" />
                            <select id="Governorate" name="Governorate" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md">
                                <option value="">-- Select a Governorate --</option>    
                            @foreach (App\Models\User::governorates() as $item)
                                <option value="{{ $item }}">{{ $item }}</option>
                            @endforeach
                            </select>
                        @error('Governorate') <span class="error">{{ $message }}</span> @enderror
                    </div>

                    <div class="mt-4">
                        <div>
                            @if(auth()->user()->role == 'E-health Care') 
                            <x-jet-label for="adresse" value="{{ __('Adresse or Cabinet Adresse') }}" />
                            @else
                            <x-jet-label for="adresse" value="{{ __('Adresse') }}" />
                            @endif
                            <span class="font-bold text-yellow-600">If you do not find your address, try in <span class=" font-extrabold text-yellow-700">Arabic</span> or please enter your own adress!!</span>
                            <input type="search" id="adresse" name="adresse" class="block mt-2 mb-4 w-full" placeholder="Try &quot;Rue el mar&quot;" /></div>
                            @error('adresse') <span class="error">{{ $message }}</span> @enderror            
                        </div>
                    </div>
                </form>
            </div>
        </div> 
        
        <script src="https://cdn.jsdelivr.net/npm/places.js@1.19.0"></script>
        <script>
            (function() {

            var latlng = {
                lat: 33.88146,
                lng: 10.0982
            };

            var placesAutocomplete = places({
                apiKey: 'AIzaSyCsyL0pIHNe-y-822rFVamcC7WHi4fIHus',
                container: document.querySelector('#adresse')
            }).configure({
                countries: ['TN'],
                type: ['city', 'address', 'busStop', 'trainStation', 'townhall', 'airport'],
            });

            var map = L.map('map-example-container', {
                scrollWheelZoom: false,
                zoomControl: false
            });

            var osmLayer = new L.TileLayer(
                'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                minZoom: 6,
                maxZoom: 13,
                // attribution: 'Map data © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors'
                }
            );

            var markers = [];

            map.setView(new L.LatLng(latlng.lat, latlng.lng), 6);
            map.addLayer(osmLayer);

            placesAutocomplete.on('suggestions', handleOnSuggestions);
            placesAutocomplete.on('cursorchanged', handleOnCursorchanged);
            placesAutocomplete.on('change', handleOnChange);
            placesAutocomplete.on('clear', handleOnClear);

            function handleOnSuggestions(e) {
                markers.forEach(removeMarker);
                markers = [];

                if (e.suggestions.length === 0) {
                map.setView(new L.LatLng(latlng.lat, latlng.lng), 6);
                return;
                }

                e.suggestions.forEach(addMarker);
                findBestZoom();
            }

            function handleOnChange(e) {
                markers
                .forEach(function(marker, markerIndex) {
                    if (markerIndex === e.suggestionIndex) {
                    markers = [marker];
                    marker.setOpacity(1);
                    findBestZoom();
                    } else {
                    removeMarker(marker);
                    }
                });
            }

            function handleOnClear() {
                map.setView(new L.LatLng(latlng.lat, latlng.lng), 6);
                markers.forEach(removeMarker);
            }

            function handleOnCursorchanged(e) {
                markers
                .forEach(function(marker, markerIndex) {
                    if (markerIndex === e.suggestionIndex) {
                    marker.setOpacity(1);
                    marker.setZIndexOffset(1000);
                    } else {
                    marker.setZIndexOffset(0);
                    marker.setOpacity(0.5);
                    }
                });
            }

            function addMarker(suggestion) {
                var marker = L.marker(suggestion.latlng, {opacity: .4});
                marker.addTo(map);
                markers.push(marker);
            }

            function removeMarker(marker) {
                map.removeLayer(marker);
            }

            function findBestZoom() {
                var featureGroup = L.featureGroup(markers);
                map.fitBounds(featureGroup.getBounds().pad(0.5), {animate: false});
            }
            })();
        </script>                 
    </section>                
</x-guest-layout>