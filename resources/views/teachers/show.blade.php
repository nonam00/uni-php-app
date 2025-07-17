<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Информация о преподавателе') }}
        </h2>
        <a href="{{ route('teachers.index') }}">
            <x-primary-button>Назад к списку</x-primary-button>
        </a>
    </x-slot>
    <div class="py-6">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <p><strong>ID:</strong> {{ $teacher->id }}</p>
                <p><strong>Имя:</strong> {{ $teacher->name }}</p>
                <p><strong>Email:</strong> {{ $teacher->email }}</p>
                <hr class="my-4">
                <h3 class="font-semibold text-lg mb-2">Модули, которые ведёт преподаватель:</h3>
                @if($teacher->modules->count())
                    <ul class="list-disc pl-5">
                        @foreach($teacher->modules as $module)
                            <li>{{ $module->title }}</li>
                        @endforeach
                    </ul>
                @else
                    <p>Этот преподаватель пока не ведёт модули.</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout> 