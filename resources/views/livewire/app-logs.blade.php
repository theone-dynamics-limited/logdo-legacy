<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                @if (count($logs) == 0)
                    <div class="px-6 py-6 flex items-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <p class="ml-4 text-gray-500">
                            Please complete the app setup by following the docs <a href="/docs" class="underline text-gray-900">here.</a>
                        </p>
                    </div>
                @endif
                @foreach ($logs as $log)
                    <div class="flex flex-col w-full">
                        <div class="flex items-center justify-between">
                            <div class="px-6 py-4 whitespace-no-wrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                    </div>
                                    <div class="ml-4">
                                        <div class="leading-5 font-medium text-gray-900">
                                            {{ $log->created_at->toFormattedDateString() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <div class="px-6 py-4 whitespace-no-wrap">
                                    <span class="float-right px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        {{ $log->info_count }} info
                                    </span>
                                </div>
                                <div class="px-6 py-4 whitespace-no-wrap">
                                    <span class="float-right px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                        {{ $log->warning_count }} Warnings
                                    </span>
                                </div>
                                <div class="px-6 py-4 whitespace-no-wrap">
                                    <span class="float-right px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                        {{ $log->error_count }} Errors
                                    </span>
                                </div>
                                <div class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                                    <button wire:click="expandLogsFor({{$log}})">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div id="log" x-data="{ show: `{{ $showModal }}` }"
                    x-show="show"
                    x-on:close.stop="show = true"
                    x-on:keydown.escape.window="show = true"
                    class="fixed top-0 inset-x-0 px-4 pt-6 sm:px-0 sm:flex sm:items-top sm:justify-center"
                    style="display: none;">
                <div x-show="show" class="bg-gray-900 text-white rounded-lg overflow-y-scroll shadow-xl transform transition-all sm:w-full w-1/2 h-screen ml-36 mr-36 mt-24">
                    <div class="w-full bg-gray-700 h-24 pl-8 pr-8 flex items-center justify-between">
                        <p class="text-4xl font-extrabold">
                            Here are your full logs
                        </p>
                        <button wire:click="toggleLogModal">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </button>
                    </div>
                    <div class="p-8">
                        <div>
                            {!! $expandedLog !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
