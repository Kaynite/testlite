@extends('layouts.app')

@section('content')
<div class="mx-auto h-full flex justify-center items-center bg-gray-400">
    <div class="w-96 bg-blue-900 px-6 py-3 rounded-xl shadow-xl">
        <p class="text-white text-5xl">Dot</p>
        <h3 class="text-blue-400 text-xl">Enter Your Information below</h3>

        <form method="POST" action="{{ route('register') }}" class="mt-8">
            @csrf
            <div class="relative mb-4">
                <label for="name" class="uppercase text-blue-500 absolute pl-3 pt-1 text-xs font-bold">Name</label>
                <div class="col-md-6">
                    <input id="name" type="text" name="name" class="pt-8 w-full text-white rounded p-3 bg-blue-800 placeholder-blue-500 outline-none focus:bg-blue-700" value="{{ old('name') }}" autocomplete="name" autofocus placeholder="Enter Your name">

                    @error('name')
                        <strong class="text-red-500 text-sm mt-1">{{ $message }}</strong>
                    @enderror
                </div>
            </div>

            <div class="relative mb-4">
                <label for="email" class="uppercase text-blue-500 absolute pl-3 pt-1 text-xs font-bold">E-mail</label>
                <div class="col-md-6">
                    <input id="email"
                        type="email" name="email" class="pt-8 w-full text-white rounded p-3 bg-blue-800 placeholder-blue-500 outline-none focus:bg-blue-700" value="{{ old('email') }}" autofocus placeholder="Enter Your Email">

                    @error('email')
                        <strong class="text-red-500 text-sm mt-1">{{ $message }}</strong>
                    @enderror
                </div>
            </div>

            <div class="relative mb-4">
                <label for="password" class="uppercase text-blue-500 absolute pl-3 pt-1 text-xs font-bold">Password</label>
                <div class="col-md-6">
                    <input id="password" type="password" class="pt-8 w-full text-white rounded p-3 bg-blue-800 placeholder-blue-500 outline-none focus:bg-blue-700" name="password" placeholder="Enter Your password">
                    @error('password')
                        <strong class="text-red-500 text-sm mt-1">{{ $message }}</strong>
                    @enderror
                </div>
            </div>

            <div class="relative">
                <label for="password2" class="uppercase text-blue-500 absolute pl-3 pt-1 text-xs font-bold">Confirm Password</label>
                <div class="col-md-6">
                    <input id="password2" type="password" class="pt-8 w-full text-white rounded p-3 bg-blue-800 placeholder-blue-500 outline-none focus:bg-blue-700" name="password_confirmation" placeholder="Confirm your password">
                </div>
            </div>

            <div class="w-full my-4">
                <button type="submit" class=" bg-blue-100 w-full py-2 text-blue-900 rounded">
                    Register
                </button>
            </div>

            <div class="flex justify-between text-white text-sm font-bold">
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    Forgot Your Password?
                </a>
                <a class="btn btn-link" href="{{ route('login') }}">
                    Login
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
