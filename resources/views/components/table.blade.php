@props([
    'tableData',
    'hidden_fields' => [],
    'hideId' => true,
    'actions' => [],
    'resource',
])

@php
    if($hideId) {
        $hidden_fields[] = 'id';
    }
@endphp

@if($tableData->isEmpty())
    nothing to see
@else
    <table class="min-w-full text-left text-sm font-light">
        <thead class="border-b font-medium dark:border-neutral-500">
        <tr>
            @foreach($tableData[0]->getAttributes() as $key => $value)
                @if(!in_array($key, $hidden_fields))
                    <th scope="col" class="px-6 py-4">{{ Str::headline($key) }}</th>
                @endif
            @endforeach
            @if(!empty($actions))
                <th scope="col" class="px-6 py-4">Actions</th>
            @endif
        </tr>
        </thead>
        <tbody>
        @foreach($tableData as $rowData)
            <tr class="border-b dark:border-neutral-500">
                @foreach($rowData->getAttributes() as $key => $value)
                    @if(!in_array($key, $hidden_fields))
                        <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $value }}</td>
                    @endif
                @endforeach

                {{-- Add any actions that may have been defined--}}
                @if(!empty($actions))
                    <td class="whitespace-nowrap px-6 py-4 font-medium">
                        @foreach($actions as $action)
                            @if(in_array($action, ['show', 'edit']))
                                <a href="{{ route($resource . '.' . $action, ['id' => $rowData->id]) }}">{{ $action }}
                                    | </a>
                            @endif

                            {{-- Delete is a little different as we have to call a modal to confirm the action--}}
                            @if($action == 'destroy')
                                <a
                                    href="#"
                                    x-data=""
                                    x-on:click.prevent="$dispatch('open-modal', { target: 'confirm-{{$resource}}-delete', url: '{{ route($resource . '.' . $action, ['nursery' => $rowData->id]) }}' })"
                                >{{ $action }}
                                </a>
                            @endif

                        @endforeach

                    </td>

                @endif
            </tr>

        @endforeach
        </tbody>
    </table>

    <x-delete-modal name="confirm-{{$resource}}-delete"/>
@endif


