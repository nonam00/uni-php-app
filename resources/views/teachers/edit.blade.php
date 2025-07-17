<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Редактировать преподавателя') }}
        </h2>
        <a href="{{ route('teachers.index') }}">
            <x-primary-button>Назад к списку</x-primary-button>
        </a>
    </x-slot>
    <div class="py-6">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('teachers.update', $teacher) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')
                    <div>
                        <x-input-label for="name" :value="__('Имя')" />
                        <x-text-input id="name" name="name" type="text" class="mt-2 w-full" value="{{ $teacher->name }}" required />
                    </div>
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" name="email" type="email" class="mt-2 w-full" value="{{ $teacher->email }}" required />
                    </div>
                    <x-primary-button>Сохранить</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout> 