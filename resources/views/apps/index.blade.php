<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div class="flex items-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Apps 
                </h2>
                <livewire:app-chooser/>
            </div>
            <div class="flex items-center">
                <livewire:add-app>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                @if (count($apps) == 0)
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                        @include('partials._welcome')
                    </div>
                @else
                    @if (auth()->user()->apps()->count() > 0)
                        <livewire:app-id/>
                    @endif
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                            <livewire:app-logs/>
                    </div>
                @endif
        </div>
    </div>
</x-app-layout>
