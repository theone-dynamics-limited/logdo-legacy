<select wire:model="selectedAppID" class="py-2 px-4 pl-4 rounded ml-6 block w-full text-blue-500 font-extrabold leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
    @if (count($apps) != 0)
        @foreach ($apps as $app)
            <option value="{{ $app->id }}">{{ $app->name }}</option>
        @endforeach
    @else
        <option value="none">No apps yet</option>
    @endif
</select>
