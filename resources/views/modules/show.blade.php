<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Информация о модуле') }}
        </h2>
        <a href="{{ route('modules.index') }}">
            <x-primary-button>Назад к списку</x-primary-button>
        </a>
    </x-slot>
    <div class="py-6">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <p><strong>ID:</strong> {{ $module->id }}</p>
                <p><strong>Название:</strong> {{ $module->title }}</p>
                <p><strong>Описание:</strong> {{ $module->description }}</p>
                <p><strong>Преподаватель:</strong> {{ $module->teacher->name ?? '-' }}</p>
                <p><strong>Группы:</strong>
                    @foreach($module->groups as $group)
                        <span class="inline-block bg-gray-200 rounded px-2 py-1 text-xs mr-1">{{ $group->title }}</span>
                    @endforeach
                </p>
            </div>
        </div>
    </div>
</x-app-layout> 