<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('All Applications') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (session('message'))
                        <div class="p-3 mb-3 bg-lime-600">{{ Session('message') }}
                            <span id="x" class="float-end cursor-pointer">x</span>
                        </div>
                    @endif
                    <x-application-table :applications="$applications" />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
