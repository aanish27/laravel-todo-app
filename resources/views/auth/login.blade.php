<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="" :status="session('status')" />

    <form method="POST" action="{{ route('login') }} ">
        @csrf

        <!-- Email Address -->
        <div class="">
            <x-input-label for="email" :value="__('Email')" class=" form-label" />
            <x-text-input id="email" class=" form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="" />
        </div>

        <!-- Password -->
        <div class="">
            <x-input-label for="password" :value="__('Password')"  class=" form-label"/>

            <x-text-input id="password" class=" form-control"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class=" form"  />
        </div>

        <!-- Remember Me -->
        <div class=" form-text">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="" name="remember">
                <span class="">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="">
            @if (Route::has('password.request'))
                <a class=" link-primary" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
                <br>
            <a href="{{ route('register') }}" class="link-primary pt-2"  >
                Sign-Up
            </a>

            <x-primary-button class="btn btn-primary  d-block ">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>






</x-guest-layout>
