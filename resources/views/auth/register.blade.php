<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            {{-- <x-jet-authentication-card-logo /> --}}
            <a class="text-3xl font-medium text-black" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}" x-data="{role: 'Patient'}">
            @csrf
            
            <div class="mt-4">
                <x-jet-label for="gender" class="mb-2" value="{{ __('Gender') }}"/>
                <x-jet-input id="gender" class=" mr-0.5" type="radio" name="gender" value="{{__('m')}}" required checked/><span class="font-bold">{{__('Male')}}</span>
                <x-jet-input id="gender" class=" ml-2 mr-0.5" type="radio" name="gender" value="{{__('f')}}" required/><span class="font-bold">{{__('Female')}}</span>
            </div>
            
            <div class="mt-4">
                <x-jet-label for="marital_status" class="mb-2" value="{{ __('Marital status') }}"/>
                <x-jet-input id="marital_status" class=" mr-0.5" type="radio" name="marital_status" value="{{__('single')}}" required checked/><span class="font-bold">{{__('Single')}}</span>
                <x-jet-input id="marital_status" class=" ml-2 mr-0.5" type="radio" name="marital_status" value="{{__('married')}}" required/><span class="font-bold">{{__('Married')}}</span>
            </div>

            <div class="mt-4">
                <x-jet-label for="name" value="{{ __('Name') }}"/>
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>
            
            <div class="mt-4">
                <x-jet-label for="date_of_birth" value="{{ __('Date of birth') }}" />
                <x-jet-input id="date_of_birth" class="block mt-1 w-full" type="date" name="date_of_birth" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="role" value="{{ __('Register as') }}" />
                <select name="role" x-model="role" id='role' class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    @foreach (App\Models\Roles::all()->whereNotIn('name', 'admin') as $item)
                        <option value="{{ $item->name }}">{{__($item->name)}}</option>
                    @endforeach
                </select>
                @error('role') <span class="error">{{ $message }}</span> @enderror
            </div>
            
            <div class="mt-4" x-show=" role == 'Health specialist'">
                <x-jet-label class="mb-2" for="specialty" value="{{ __('Your Specialty') }}" />
                    @foreach (App\Models\Specialty::all() as $item)
                    <ul class="sm:flex sm:text-left text-gray">
                        <li class="px-4 py-2 font-bold">
                            <x-jet-input id="specialty" type="radio" name="specialty" value="{{$item->name}}"/>{{__($item->name)}}
                        </li>
                    </ul>
                    @endforeach
                @error('specialty') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4" x-data="{ show: true }">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <div class="relative">
                   <input id="password" :type="show ? 'password' : 'text'" class="block mt-1 w-full rounded-lg border" type="password" name="password" required autocomplete="current-password" />
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
    
                        <svg class="h-6 text-gray-700" fill="none" @click="show = !show"
                          :class="{'hidden': !show, 'block':show }" xmlns="http://www.w3.org/2000/svg"
                          viewbox="0 0 576 512">
                          <path fill="currentColor"
                            d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                          </path>
                        </svg>
    
                        <svg class="h-6 text-gray-700" fill="none" @click="show = !show"
                          :class="{'block': !show, 'hidden':show }" xmlns="http://www.w3.org/2000/svg"
                          viewbox="0 0 640 512">
                          <path fill="currentColor"
                            d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z">
                          </path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="mt-4"  x-data="{ show: true }">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <div class="relative">
                <input id="password_confirmation" :type="show ? 'password' : 'text'"  class="block mt-1 w-full rounded-lg border" type="password" name="password_confirmation" required autocomplete="new-password" />
                <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
    
                    <svg class="h-6 text-gray-700" fill="none" @click="show = !show"
                      :class="{'hidden': !show, 'block':show }" xmlns="http://www.w3.org/2000/svg"
                      viewbox="0 0 576 512">
                      <path fill="currentColor"
                        d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                      </path>
                    </svg>

                    <svg class="h-6 text-gray-700" fill="none" @click="show = !show"
                      :class="{'block': !show, 'hidden':show }" xmlns="http://www.w3.org/2000/svg"
                      viewbox="0 0 640 512">
                      <path fill="currentColor"
                        d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z">
                      </path>
                    </svg>
                </div>
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>