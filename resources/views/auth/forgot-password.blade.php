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

                    <div class="flex-1 flex flex-col justify-between mt-10">
                        <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <!-- Email Address -->
                            <div>
                                <x-label for="email" :value="__('Email')" />
                                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                            </div>

                            <div class="flex flex-row mt-4">
                                <button type="submit" class="block flex-1 bg-green-500 uppercase rounded-xl h-10 px-5 text-white font-bold text-lg">{{ __('Email Password Reset Link') }}</button>
                            </div>
                        </form>
                        <div class="flex flex-row justify-between mt-4">
                            <a href="/login">Login</a>
                            <a href="/register">Register</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex-1 auth__info-panel items-center flex p-12 hidden md:flex">
                <div style="margin-top: -100px;">
                    <h1 class="text-3xl font-bold">Forgot your password?</h1>
                    <p class="text-lg">No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>
                </div>
            </div>
        </div>
    </x-auth-card>
</x-guest-layout>
