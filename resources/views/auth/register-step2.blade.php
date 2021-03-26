<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            {{-- <x-jet-authentication-card-logo /> --}}
            <a class="text-3xl font-medium text-black" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register-step2.store') }}">
            @csrf

            <div>
                <x-jet-label for="adresse" value="{{ __('Adresse') }}" />
                <x-jet-input id="adresse" class="block mt-1 w-full" type="text" name="adresse" :value="old('adresse')"/>
            </div>

            <div class="mt-4">
                <x-jet-label for="bio" value="{{ __('Bio') }}" />
                <textarea id="bio" class="block mt-1 w-full" type="text" name="bio" :value="old('bio')"></textarea>
                @error('bio') <span class="error">{{ $message }}</span> @enderror            
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button class="ml-4">
                    {{ __('Finish Registeration') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
