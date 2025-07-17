<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Информация о студенте') }}
        </h2>
        <a href="{{ route('students.index') }}">
            <x-primary-button>Назад к списку</x-primary-button>
        </a>
    </x-slot>
    <div class="py-6">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-sm">
                    <div class="font-semibold text-gray-500 dark:text-gray-400">ID</div>
                    <div class="sm:col-span-2 text-gray-900 dark:text-gray-100">{{ $student->id }}</div>

                    <div class="font-semibold text-gray-500 dark:text-gray-400">Имя</div>
                    <div class="sm:col-span-2 text-gray-900 dark:text-gray-100">{{ $student->name }}</div>

                    <div class="font-semibold text-gray-500 dark:text-gray-400">Email</div>
                    <div class="sm:col-span-2 text-gray-900 dark:text-gray-100">{{ $student->email }}</div>

                    <div class="font-semibold text-gray-500 dark:text-gray-400">Группа</div>
                    <div class="sm:col-span-2 text-gray-900 dark:text-gray-100">{{ $student->group->title ?? '-' }}</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 