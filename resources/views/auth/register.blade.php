<x-guest-layout>
    <x-auth-card>
        <div class="flex flex-row flex-1">
            <div class="flex-1 auth__form p-3 flex flex-col items-center">
                <div class="container flex flex-col flex-1">
                    <div>
                        <img src="/img/pendo_logo.png"/>
                    </div>
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors"/>

                    <form method="POST" action="{{ route('register') }}" class="flex flex-col flex-1">
                    @csrf

                    <!-- Name -->
                        <div>
                            <x-label for="name" :value="__('Name')"/>

                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                                     required autofocus/>
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-label for="email" :value="__('Email')"/>

                            <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                                     :value="old('email')" required/>
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <x-label for="password" :value="__('Password')"/>

                            <x-input id="password" class="block mt-1 w-full"
                                     type="password"
                                     name="password"
                                     required autocomplete="new-password"/>
                        </div>

                        <!-- Confirm Password -->
                        <div class="mt-4">
                            <x-label for="password_confirmation" :value="__('Confirm Password')"/>

                            <x-input id="password_confirmation" class="block mt-1 w-full"
                                     type="password"
                                     name="password_confirmation" required/>
                        </div>

                        <div class="flex-1"></div>
                        <button type="submit" class="block bg-green-500 uppercase rounded-xl h-10 mt-10 text-white font-bold text-xl">{{ __('Register') }}</button>

                        <div class="flex flex-row justify-between mt-4">
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif
                            <a href="/login">{{ __('Already registered?') }}</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="flex-1 auth__info-panel items-center flex p-12 hidden md:flex">
                <div style="margin-top: -100px;">
                    <h1 class="text-3xl font-bold">Complaint Tracker</h1>
                    <p class="text-lg">Register to enter and review user complaints.</p>
                </div>
            </div>
        </div>
    </x-auth-card>
</x-guest-layout>
