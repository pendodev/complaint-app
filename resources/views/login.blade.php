@extends('layouts.auth')

@section('content')
<div class="flex flex-row flex-1">
    <div class="flex-1 auth__form p-3 flex flex-col items-center">
        <div class="container flex flex-col flex-1">
            <div>
                <img src="/img/pendo_logo.png"/>
            </div>
            <div class="mt-10">
                <input type="email" required placeholder="Email"/>
            </div>
            <div class="my-2">
                <input type="password" required placeholder="Password"/>
            </div>
            <div class="flex flex-row justify-center mt-8">
                <div class="flex items-center">
                    <div class="mr-2 w-12 h-6 flex items-center bg-gray-300 rounded-full p-1 duration-300 ease-in-out">
                        <div class="bg-white w-5 h-5 rounded-full shadow-md transform duration-300 ease-in-out"></div>
                    </div>
                    <label for="toggle" class="text-gray-700">Remember Me</label>
                </div>
            </div>
            <div class="flex-1"></div>
            <button type="submit" class="block bg-green-500 uppercase rounded-xl h-10 mt-10 text-white font-bold text-xl">Login</button>

            <div class="flex flex-row justify-between mt-4">
                <a href="/forgot-password">Forgot Password</a>
                <a href="/register">Register</a>
            </div>
        </div>
    </div>
    <div class="flex-1 auth__info-panel items-center flex p-12 hidden md:flex">
        <div style="margin-top: -100px;">
            <h1 class="text-3xl font-bold">Complaint Tracker</h1>
            <p class="text-lg">Sign in to enter and review user complaints.</p>
        </div>
    </div>
</div>
@endsection
