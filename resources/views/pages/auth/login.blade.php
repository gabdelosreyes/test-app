<x-layouts::auth>
    <div class="flex flex-col gap-6">
        <x-auth-header :title="__('Log in to your account')" :description="__('Enter your email and password below to log in')" />

        <!-- Session Status -->
        <x-auth-session-status class="text-center" :status="session('status')" />

        <form method="POST" action="{{ route('login.store') }}" class="flex flex-col gap-6">
            @csrf

            <!-- Email Address -->
            <flux:input
                name="email"
                :label="__('Email address')"
                :value="old('email')"
                type="email"
                required
                autofocus
                autocomplete="email"
                placeholder="email@example.com"
            />

            <!-- Password -->
            <div class="relative">
                <flux:input
                    name="password"
                    :label="__('Password')"
                    type="password"
                    required
                    autocomplete="current-password"
                    :placeholder="__('Password')"
                    viewable
                />

                @if (Route::has('password.request'))
                    <flux:link class="absolute top-0 text-sm end-0" :href="route('password.request')" wire:navigate>
                        {{ __('Forgot your password?') }}
                    </flux:link>
                @endif
            </div>

            <!-- Remember Me -->
            <flux:checkbox name="remember" :label="__('Remember me')" :checked="old('remember')" />

            <div class="flex items-center justify-end">
                <flux:button variant="primary" type="submit" class="w-full" data-test="login-button">
                    {{ __('Log in') }}
                </flux:button>
            </div>
        </form>

        @if (Route::has('register'))
            <div class="space-x-1 text-sm text-center rtl:space-x-reverse text-zinc-600 dark:text-zinc-400">
                <span>{{ __('Don\'t have an account?') }}</span>
                <flux:link :href="route('register')" wire:navigate>{{ __('Sign up') }}</flux:link>
            </div>
        @endif

        <flux:separator text="OR" class="my-5"/>

        <flux:button
            as="a"
            href="{{ route('google.login') }}"
            color="white"
            variant="primary"
            class="flex items-center gap-2"
        >
            {{-- Google icon --}}
            <svg class="w-5 h-5" viewBox="0 0 45 48" aria-hidden="true">
                <path fill="white"
                    d="M43.6 20.5H42V20H24v8h11.3C33.8 32.1 29.3 35 24 35
                        c-6.1 0-11-4.9-11-11s4.9-11 11-11
                        c2.8 0 5.4 1.1 7.4 2.9l5.7-5.7
                        C33.6 6.1 28.1 4 24 4
                        12.9 4 4 12.9 4 24s8.9 20 20 20
                        20-8.9 20-20c0-1.2-.1-2.3-.4-3.5z"/>
            </svg>

            <span>Login with CvSU Gmail</span>
        </flux:button>


    </div>
</x-layouts::auth>
