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
                <x-jet-input id="gender" class=" mr-0.5" type="radio" name="gender" value="male" required checked/>Male
                <x-jet-input id="gender" class=" ml-2 mr-0.5" type="radio" name="gender" value="female" required/>Female
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
                <x-jet-label for="tel" value="{{ __('Tel') }}" />
                <div class="mt-1 flex rounded-md shadow-sm">
                    <span class="inline-flex items-center px-3 py-2 rounded-l-lg border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                        +216
                    </span>
                    <x-jet-input id="tel" class="inline-flex items-center w-full pl-2 py-2 rounded-r-lg rounded-l-none border border-l-0" type="tel" name="tel" placeholder="enter 8 numbers here! ..." required />
                </div>
            </div>

            <div class="mt-4">
                <x-jet-label for="role" value="{{ __('Register as:') }}" />
                <select name="role" x-model="role" id='role' class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    @foreach (App\Models\Roles::all()->whereNotIn('name', 'admin') as $item)
                        <option value="{{ $item->name }}">{{ $item->name}}</option>
                    @endforeach
                </select>
                @error('role') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
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
