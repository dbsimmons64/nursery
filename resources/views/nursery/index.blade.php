<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Nurseries') }}
        </h2>
    </x-slot>

    <x-section>
        <x-table
            :table-data="$nurseries"
            resource="nursery"
            :actions="['show', 'edit', 'destroy']"
        />
    </x-section>


    <x-section>
        Boo
    </x-section>


    <x-section>
        Just wanted to say hi!
    </x-section>
    >

</x-app-layout>
