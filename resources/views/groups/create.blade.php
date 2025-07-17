<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Добавить группу') }}
        </h2>
        <a href="{{ route('groups.index') }}">
            <x-primary-button>Назад к списку</x-primary-button>
        </a>
    </x-slot>
    <div class="py-6">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('groups.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <x-input-label for="title" :value="__('Название')" />
                        <x-text-input id="title" name="title" type="text" class="mt-2 w-full" required />
                    </div>
                    <x-primary-button>Сохранить</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout> 