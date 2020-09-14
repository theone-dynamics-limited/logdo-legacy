<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full">
            <div>
                <img src="/img/logo/logo.png" alt="logo" class="mx-auto h-20 w-auto">
                <h1 class="mt-6 text-center text-3xl leading-9 font-extrabold text-gray-900">
                    Sign in to your account
                </h1>
                <p class="mt-2 text-center text-sm leading-5 text-gray-600">
                    Or
                    <a href="/register" class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">
                        start your 14-day free trial (jk 😁 )
                    </a>
                </p>
            </div>
            
            <form class="mt-8" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="text-center">
                    <x-jet-validation-errors class="mb-2" />
                </div>
                <input type="hidden" name="remember" value="true">
                <div class="rounded-md shadow-sm">
                    <div>
                        <input aria-label="Email address"  type="email" name="email" :value="old('email')" required autofocus class="appearance-none rounded-none relative block w-full px-3 py-4 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 sm:text-sm sm:leading-5" placeholder="Email address">
                    </div>
                    <div class="-mt-px">
                        <input aria-label="Password" type="password" name="password" autocomplete="current-password" required class="appearance-none rounded-none relative block w-full px-3 py-4 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 sm:text-sm sm:leading-5" placeholder="Password">
                    </div>
                </div>
        
                <div class="mt-6 flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember_me" type="checkbox" name="remember" class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out">
                        <label for="remember_me" class="ml-2 block text-sm leading-5 text-gray-900">
                            Remember me
                        </label>
                    </div>
            
                    <div class="text-sm leading-5">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">
                                Forgot your password?
                            </a>
                        @endif
                    </div>
                </div>
        
                <div class="mt-6">
                    <button type="submit" class="font-bold group relative w-full flex justify-center py-4 px-4 border border-transparent leading-5 rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                        Sign in
                    </button>
                </div>
            </form>
            <p class="text-center mt-4 text-sm text-gray-900">&copy {{ date('Y')}} Logdo. TrustFinity (U) Ltd</p>
        </div>
    </div>
</x-guest-layout>
