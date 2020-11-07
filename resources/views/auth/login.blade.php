@extends('layouts.app')

@section('content')
<div class="mx-auto h-full flex justify-center items-center bg-gray-400">
    <div class="w-96 bg-blue-900 p-6 rounded-xl shadow-xl">
        <p class="text-white text-5xl">Dot</p>
        <h2 class="text-white text-3xl">Welcome Back!</h2>
        <h3 class="text-blue-400 text-xl">Enter Your credintials below</h3>

        <form method="POST" action="{{ route('login') }}" class="mt-8">
            @csrf
            <div class="relative mb-4">
                <label for="email" class="uppercase text-blue-500 absolute pl-3 pt-1 text-xs font-bold">E-mail</label>
                <div class="col-md-6">
                    <input id="email" name="email" type="email" class="text-white pt-8 w-full rounded p-3 bg-blue-800 placeholder-blue-500 outline-none focus:bg-blue-700" value="{{ old('email') }}" autocomplete="email" autofocus placeholder="Enter Your Email">

                    @error('email')
                            <strong class="text-red-500 text-sm mt-1">{{ $message }}</strong>
                    @enderror
                </div>
            </div>

            <div class="relative">
                <label for="password" class="uppercase text-blue-500 absolute pl-3 pt-1 text-xs font-bold">{{ __('Password') }}</label>
                <div class="col-md-6">
                    <input id="password" type="password" class="text-white pt-8 w-full rounded p-3 bg-blue-800 placeholder-blue-500 outline-none focus:bg-blue-700" name="password" autocomplete="current-password" placeholder="Enter Your Password">
                    @error('password')
                        <strong class="text-red-500 text-sm mt-1">{{ $message }}</strong>
                    @enderror
                </div>
            </div>

            <div class="mt-2">
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="text-white" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>

            <div class="w-full my-4">
                <button type="submit" class=" bg-blue-100 w-full py-2 text-blue-900 rounded">
                    {{ __('Login') }}
                </button>
            </div>

            <div class="flex justify-between text-white text-sm font-bold">
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    Forgot Your Password?
                </a>
                <a class="btn btn-link" href="{{ route('register') }}">
                    Register
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
