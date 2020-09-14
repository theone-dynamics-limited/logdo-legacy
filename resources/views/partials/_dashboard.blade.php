<div class="">
    <h3 class="mb-2 font-extrabold">General team log statistics</h3>
    <div class="bg-white overflow-hidden rounded shadow flex">
        <div class="w-1/3 p-6 flex items-center justify-between">
            <div>
                <p class="px-4 rounded-full bg-green-300 text-green-800 font-bold w-16 text-sm">info</p>
                <h1 class="text-4xl text-gray-900 font-bold mt-2">{{ $total_info }}</h1>
                <p class="text-gray-400 text-sm -my-2">Recorded</p>
            </div>
            <div class="text-green-500">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
        </div>
        <div class="border-l border-r w-1/3 p-6 flex items-center justify-between">
            <div>
                <p class="px-4 rounded-full bg-yellow-300 text-yellow-800 font-bold w-24 text-sm">warnings</p>
                <h1 class="text-4xl text-gray-900 font-bold mt-2">{{ $total_warnings }}</h1>
                <p class="text-gray-400 text-sm -my-2">Recorded</p>
            </div>
            <div class="text-yellow-500">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
        </div>
        <div class="w-1/3  p-6 flex items-center justify-between">
            <div>
                <p class="px-4 rounded-full bg-red-300 text-red-800 font-bold w-20 text-sm">errors</p>
                <h1 class="text-4xl text-gray-900 font-bold mt-2">{{ $total_errors }}</h1>
                <p class="text-gray-400 text-sm -my-2">Recorded</p>
            </div>
            <div class="text-red-500">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
        </div>
    </div>
    <div class="bg-white overflow-hidden rounded shadow mt-6 p-6">
    </div>
</div>