
<x-guest-layout >
    <x-authentication-card>
        <x-slot name="logo">
            <h1 style="color:white; font-size: 40px"> Registration </h1>

        </x-slot>


        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">

            @csrf
            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name"  class="form-control form-control-lg" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name"  />

            </div>

            <div>
                <x-label for="surname" value="{{ __('Surname') }}" />
                <x-input id="surname"  class="form-control form-control-lg" class="block mt-1 w-full" type="text" name="surname" :value="old('surname')" required autofocus autocomplete="surnname" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="form-control form-control-lg" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>
            <div class="mt-4">
                <x-label for="study_programme" value="{{ __('Study Programme(ONLY for students)') }}" />
                <select name="study_programme">
                    <option value="NONE"> NONE </option>
                    <option value="IT"> IT </option>
                    <option value="PS"> PS </option>
                    <option value="INFO"> INFO </option>
                </select>
            </div>
            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="form-control form-control-lg" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation"  class="form-control form-control-lg" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>
            <div class="mt-4">
                <x-label for="role_id" value="{{ __('Register as: ') }}" />
                <select name="role_id">
                    <option value="1"> Student </option>
                    <option value="2"> Teacher </option>
                </select>
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ms-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>

    </x-authentication-card>
</x-guest-layout>

