<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <x-input-field field="name"/>
        <x-input-field field="organisation"/>
        <x-input-field field="email" type="email"/>
        <x-input-field field="password" type="password"/>
        <x-input-field field="password_confirmation" type="password"/>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
               href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
