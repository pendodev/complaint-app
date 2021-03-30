<x-guest-layout>
    <x-auth-card>
        <div class="flex flex-row flex-1">
            <div class="flex-1 auth__form p-3 flex flex-col items-center">
                <div class="container flex flex-col flex-1">
                    <div>
                        <img src="/img/pendo_logo.png"/>
                    </div>

                    @if (session('status') == 'verification-link-sent')
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                        </div>
                    @endif

                    <div class="mt-4 flex-1 flex flex-col items-center justify-between">
                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf

                            <div class="mt-14">
                                <button type="submit" class="block flex-1 bg-green-500 uppercase rounded-xl h-10 px-5 text-white font-bold text-lg">{{ __('Resend Verification Email') }}</button>
                            </div>
                        </form>

                        <a href="{{ route('logout') }}">Logout</a>
                    </div>
                </div>
            </div>
            <div class="flex-1 auth__info-panel items-center flex p-12 hidden md:flex">
                <div style="margin-top: -100px;">
                    <h1 class="text-3xl font-bold">Thanks for signing up!</h1>
                    <p class="text-lg">Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.</p>
                </div>
            </div>
        </div>
    </x-auth-card>
</x-guest-layout>
