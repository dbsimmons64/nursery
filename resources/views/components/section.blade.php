@props([
    'title' => null,
    'subtitle' => null,
    ])

<div class="pt-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                @if ($title)
                    <div class="py-3">
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __($title) }}
                            </h2>


                            @if ($subtitle)
                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                    {{ __($subtitle) }}
                                </p>
                            @endif

                        </header>
                    </div>
                @endif

                {{ $slot }}
            </div>
        </div>
    </div>
</div>
