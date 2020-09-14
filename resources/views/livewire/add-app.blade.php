<div>
    <button wire:click="showAppAddModal" wire:loading.attr="disabled" href="/apps/create" class="py-2 px-8 bg-blue-500 rounded text-white font-bold flex items-center hover:bg-blue-700">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z"></path></svg>
        <span class="ml-4">Add an app</span>
    </button>
    <x-jet-dialog-modal wire:model="showNewAppModal">
        <x-slot name="title">
            <h4 class="text-2xl font-extrabold">Add new app</h4>
        </x-slot>

        <x-slot name="content">
            Apps are a representation of the applications that you'd like to monitor their logs.
            <div class="mt-4">
                @error('name') <span class="text-red-700">{{ $message }}</span> @enderror
                <input required type="text" wire:model="name" name="name" placeholder="You awesome production app name" class="border rounded py-2 px-3 w-full">
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="dismissAppAddModal" wire:loading.attr="disabled">
                Not now
            </x-jet-secondary-button>

            <button class="ml-2 py-2 px-8 bg-blue-500 rounded text-white font-bold items-center hover:bg-blue-700" wire:click="addApp" wire:loading.attr="disabled">
                Add new application
            </button>
        </x-slot>
    </x-jet-dialog-modal>  
</div>
