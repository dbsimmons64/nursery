@props([
'field',
'type' => 'text',
'default' => null,
])

<div class="mt-4">
<x-input-label for="{{$field}}" :value="$field" />
<x-text-input id="{{$field}}" class="block mt-1 w-full" type="{{$type}}" name="{{$field}}" :value="old($field) ?? $default" required autofocus autocomplete="{{$field}}" />
<x-input-error :messages="$errors->get($field)" class="mt-2" />
</div>
