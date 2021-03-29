<x-guest-layout>
    <x-auth-card>
        <div class="flex flex-row flex-1">
            <div class="flex-1 auth__form p-3 flex flex-col items-center">
                <div class="container flex flex-col flex-1">
                    <div>
                        <img src="/img/pendo_logo.png"/>
                    </div>

                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('login') }}" class="flex flex-col flex-1 mt-8">
                    @csrf
                        <!-- Email Address -->
                        <div>
                            <x-label for="email" :value="__('Email')" />

                            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <x-label for="password" :value="__('Password')" />
                            <x-input id="password" class="block mt-1 w-full"
                                     type="password"
                                     name="password"
                                     required autocomplete="current-password" />
                        </div>

                        <div class="flex flex-row justify-center mt-4">
                            <!-- Remember Me -->
                            <div class="block mt-4">
                                <label for="remember_me" class="inline-flex items-center">
                                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                </label>
                            </div>
                        </div>
                        <div class="flex-1"></div>
                        <button type="submit" class="block bg-green-500 uppercase rounded-xl h-10 mt-10 text-white font-bold text-xl">Login</button>

                        <div class="flex flex-row justify-between mt-4">
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif
                            <a href="/register">Register</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="flex-1 auth__info-panel items-center flex p-12 hidden md:flex">
                <div style="margin-top: -100px;">
                    <h1 class="text-3xl font-bold">Complaint Tracker</h1>
                    <p class="text-lg">Sign in to enter and review user complaints.</p>
                </div>
            </div>
        </div>
    </x-auth-card>
</x-guest-layout>
