<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Nursery Details') }}
        </h2>
    </x-slot>
    <x-section title="Name">

        <p class="mt-3">
            {{ $nursery->name }}
        </p>
    </x-section>

    <x-section title="Address">
        <p>{{ $nursery->address_line_1 }}</p>
        <p>{{ $nursery->address_line_2 }}</p>
        <p>{{ $nursery->postcode }}</p>
        <p>{{ $nursery->county }}</p>
    </x-section>

    <x-section title="Telephone">
        <p>{{ $nursery->telephone }}</p>
    </x-section>
</x-app-layout>
