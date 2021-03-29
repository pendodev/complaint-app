@extends('layouts.master')

@section('body')
    <div class="flex items-center justify-center h-screen">
        <div class="" style="width: 100%; max-width: 968px;">
            <div class="auth-container flex flex-col flex-1">
                @section('content')
                @show
            </div>
            <div class="copyright">
                &copy; Copyright {{now()->format('Y')}} Pendo Management, LLC.
            </div>
        </div>

    </div>
@endsection

