<x-guest-layout>
    <div class="flex justify-center items-center min-h-screen bg-gradient-to-r from-[#D6DBDC] to-white">
        <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-lg dark:bg-[#2D2D2D] dark:text-white">
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="mb-6">
                    <x-input-label for="email" :value="__('Email')" class="text-lg text-dark" />
                    <x-text-input id="email" class="block mt-1 w-full px-4 py-2 rounded-md border border-[#FFD700] dark:border-[#FFD700] dark:bg-gray-800 dark:text-white focus:ring-2 focus:ring-[#FFD700] dark:focus:ring-[#FFD700]"
                                  type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
                </div>

                <!-- Password -->
                <div class="mb-6">
                    <x-input-label for="password" :value="__('Contraseña')" class="text-lg text-dark" />
                    <x-text-input id="password" class="block mt-1 w-full px-4 py-2 rounded-md border border-[#FFD700] dark:border-[#FFD700] dark:bg-gray-800 dark:text-white focus:ring-2 focus:ring-[#FFD700] dark:focus:ring-[#FFD700]"
                                  type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
                </div>

                <!-- Remember Me -->
                <div class="block mb-6">
                    <label for="remember_me" class="inline-flex items-center text-gray-700 dark:text-gray-300">
                        <input id="remember_me" type="checkbox" class="rounded border-[#FFD700] dark:border-[#FFD700] text-[#FFD700] shadow-sm focus:ring-[#FFD700] dark:focus:ring-[#FFD700]" name="remember">
                        <span class="ml-2 text-sm text-[#FFD700]">{{ __('Recuerdame') }}</span>
                    </label>
                </div>

                <!-- Forgot Password -->
                <div class="flex justify-between items-center">
                    @if (Route::has('password.request'))
                        <a class="text-sm text-[#FFD700] hover:text-[#E1B900] dark:text-[#FFD700] dark:hover:text-[#E1B900]" href="{{ route('password.request') }}">
                            {{ __('¿Olvidaste tu contraseña?') }}
                        </a>
                    @endif

                    <!-- Login Button -->
                    <x-primary-button class="bg-[#FFD700] hover:bg-[#E1B900] text-white font-semibold py-2 px-4 rounded-md transition-colors">
                        {{ __('Iniciar Sesion') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
