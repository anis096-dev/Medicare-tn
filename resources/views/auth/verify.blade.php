<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            {{-- <x-jet-authentication-card-logo /> --}}
            <a class="text-3xl font-medium text-black" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
        </x-slot>

        <x-jet-validation-errors class="mb-4"/>
        <form method="POST" action="{{ route('verify') }}">
            @csrf

            <div class="mt-4">
                <p>Please enter the Verification code sent to: {{session('tel')}}</p>
                <x-jet-label class=" font-bold text-center text-lg mb-1" for="tel" value="{{ __('Verification Code') }}" />
                <div class="mt-3 flex rounded-md shadow-sm">
                    <input type="hidden" name="tel" value="{{session('tel')}}">
                    <input id="verification_code" class="w-full border border-gray-300 text-gray-600 h-14 rounded bg-white hover:border-gray-400 focus:outline-none appearance-none text-center font-bold text-lg" type="tel" name="verification_code" placeholder="enter the 6 numbers here! ..." value="{{ old('verification_code') }}" autofocus/>
            </div>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button type="submit" class="ml-4 bg-blue-500 text-white border-blue-500 hover:bg-blue-500 hover:text-white hover:border-blue-500}">
                    {{ __('Verify Code') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>