<div {{ $attributes->class(['relative']) }}>
    <span class="absolute inset-0 object-cover ml-20 w-[32rem] h-auto" alt="">
        <x-storyset.good-team/>
  </span>
    <div class="relative h-screen">
        <div class="px-12 py-2 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-14">
            <div class="flex flex-col items-center justify-between xl:flex-row">

                <div>
                    &nbsp;
                </div>

                @if (Route::has('login'))
                    @auth
                        <div
                            class="fixed z-0 right-52 top-52">
                            <div class="bg-purple-600 rounded-2xl px-3 py-2 hover:bg-purple-700 ">
                                <a href="{{ url('/dashboard') }}"
                                   class="font-semibold tracking-wide text-gray-50 hover:text-gray-200 dark:text-gray-200 dark:hover:text-white">
                                    Back to Dashboard
                                </a>

                            </div>
                        </div>
                    @else

                        @guest
                            <div class="w-full max-w-xl xl:px-8 xl:w-5/12">
                                <div class="bg-white rounded shadow-2xl p-7 sm:p-10 border-2 border-purple-500">
                                    <h3 class="mb-4 text-xl font-semibold sm:text-center sm:mb-6 sm:text-2xl">
                                        Log in
                                    </h3>

                                    <x-slot name="logo">
                                        <x-jet.authentication-card-logo/>
                                    </x-slot>

                                    <x-jet.validation-errors class="mb-4"/>

                                    @if (session('status'))
                                        <div class="mb-4 font-medium text-sm text-green-600">
                                            {{ session('status') }}
                                        </div>
                                    @endif


                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <div>
                                            <x-jet.label for="email" value="{{ __('Email') }}"/>
                                            <x-jet.input id="email" class="block mt-1 w-full" type="email" name="email"
                                                         :value="old('email')" required autofocus/>
                                        </div>

                                        <div class="mt-4">
                                            <x-jet.label for="password" value="{{ __('Password') }}"/>
                                            <x-jet.input id="password" class="block mt-1 w-full" type="password"
                                                         name="password" required autocomplete="current-password"/>
                                        </div>

                                        <div class="block mt-4">
                                            <label for="remember_me" class="flex items-center">
                                                <x-jet.checkbox id="remember_me" name="remember"/>
                                                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                            </label>
                                        </div>

                                        <div class="flex items-center justify-end mt-4">
                                            @if (Route::has('password.request'))
                                                <a class="underline text-sm text-gray-600 hover:text-gray-900"
                                                   href="{{ route('password.request') }}">
                                                    {{ __('Forgot your password?') }}
                                                </a>
                                            @endif

                                            <x-jet.button class="ml-4">
                                                {{ __('Log in') }}
                                            </x-jet.button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @endguest

                    @endauth
                @endif

            </div>
        </div>
    </div>
</div>
