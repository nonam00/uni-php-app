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
                <hr class="my-4">
                <h3 class="font-semibold text-lg mb-2">Группы, в которых читается модуль:</h3>
                @if($module->groups->count())
                    <ul class="list-disc pl-5">
                        @foreach($module->groups as $group)
                            <li>{{ $group->title }}</li>
                        @endforeach
                    </ul>
                @else
                    <p>Этот модуль пока не назначен ни одной группе.</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout> 