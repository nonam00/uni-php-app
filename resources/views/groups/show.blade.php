<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Информация о группе') }}
        </h2>
        <a href="{{ route('groups.index') }}">
            <x-primary-button>Назад к списку</x-primary-button>
        </a>
    </x-slot>
    <div class="py-6">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <p><strong>ID:</strong> {{ $group->id }}</p>
                <p><strong>Название:</strong> {{ $group->title }}</p>
                <hr class="my-4">
                <h3 class="font-semibold text-lg mb-2">Студенты группы:</h3>
                @if($group->students->count())
                    <ul class="list-disc pl-5">
                        @foreach($group->students as $student)
                            <li>{{ $student->name }} ({{ $student->email }})</li>
                        @endforeach
                    </ul>
                @else
                    <p>В этой группе пока нет студентов.</p>
                @endif
                <hr class="my-4">
                <h3 class="font-semibold text-lg mb-2">Модули, которые изучает группа:</h3>
                @if($group->modules->count())
                    <ul class="list-disc pl-5">
                        @foreach($group->modules as $module)
                            <li>{{ $module->title }}</li>
                        @endforeach
                    </ul>
                @else
                    <p>Для этой группы пока не назначено модулей.</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout> 