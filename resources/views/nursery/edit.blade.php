<x-app-layout>


    <form method="POST" action="{{ route('nursery.update', ['id' => $nursery->id]) }}">
        @csrf
        <x-section>
            <x-input-field field="name" :default="$nursery->name"/>
        </x-section>
        <x-section title="ADDRESS">
            <x-input-field field="address_line_1" :default="$nursery->address_line_1" nolabel/>
            <x-input-field field="address_line_2" :default="$nursery->address_line_2" nolabel/>
            <x-input-field field="town" :default="$nursery->town" nolabel/>
            <x-input-field field="county" :default="$nursery->county" nolabel/>
            <x-input-field field="postcode" :default="$nursery->postcode" nolabel/>

        </x-section>

        <x-section>
            <x-input-field field="telephone" :default="$nursery->telephone"/>
        </x-section>

        <x-section>
            <x-primary-button class="ml-4">
                {{ __('Update') }}
            </x-primary-button>
        </x-section>
    </form>

</x-app-layout>


