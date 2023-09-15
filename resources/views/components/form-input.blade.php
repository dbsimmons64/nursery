
@props([
    'field',
    'field_type' => 'text',
    'label_text' => null
    ])

<label class="block font-medium text-sm text-gray-700 dark:text-gray-300">
    {{ $label_text ?? Str::upper($field) }}
</label>

<input
        id="{{ $field }}"
        type="{{ $field_type }}"
        name="{{ $field }}"
        value="{{ old($field) }}"
        class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
/>

@error('name')
  Oops: {{ $errors->first('name') }}
@enderror

