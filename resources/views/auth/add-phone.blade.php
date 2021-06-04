<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            {{-- <x-jet-authentication-card-logo /> --}}
            <a class="text-3xl font-medium text-black" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
        </x-slot>

        <x-jet-validation-errors class="mb-4"/>
        <form method="POST" action="{{ route('store-phone') }}">
            @csrf

            <div class="mt-4">
                <x-jet-label class=" font-bold text-center text-lg mb-1" for="tel" value="{{ __('Phone') }}" />
                <div class="text-center">
                    <span class=" font-bold  text-sm text-blue-700">This number will be used for all transactions here!!</span><br>
                    <span class=" font-bold  text-sm text-red-500">The owner of this number will be responsible for any violation related to this account!!</span>
                </div>
                <div class="mt-3 flex rounded-md shadow-sm">
                    <x-jet-input id="tel" class="w-full border border-gray-300 text-gray-600 h-14 rounded bg-white hover:border-gray-400 focus:outline-none appearance-none text-center font-bold text-lg" type="tel" name="tel" maxlength="12" minlength="12" placeholder="+21622222222" autofocus />
                </div>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button class="ml-4 bg-blue-500 text-white border-blue-500 hover:bg-blue-500 hover:text-white hover:border-blue-500}">
                    {{ __('Verify') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>