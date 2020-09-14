<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-6">
            <div class="overflow-hidden">
                {{-- <x-jet-welcome /> --}}
                @if (count($apps) == 0)
                    @include('partials._welcome')
                @else
                    @include('partials._dashboard')
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
