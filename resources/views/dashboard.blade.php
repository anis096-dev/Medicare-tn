<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 mb-2 overflow-hidden shadow-xl sm:rounded-lg">
                <H1 class="text-center px-3">Welcome in your personal area! as <br> <span class=" font-bold">{{Auth::user()->role}}</span></H1>
            </div>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
              @livewire('find-ehealth-care')             
            </div>
        </div>
    </div>
</x-app-layout>
