<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Добавить студента') }}
        </h2>
        <a href="{{ route('students.index') }}">
            <x-primary-button>Назад к списку</x-primary-button>
        </a>
    </x-slot>
    <div class="py-6">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('students.store') }}" method="POST">
                    @csrf
                    <x-input-label for="name" :value="__('Имя')" />
                    <x-text-input id="name" name="name" type="text" class="mt-2 mb-4 w-full" required />
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" name="email" type="email" class="mt-2 mb-4 w-full" required />
                    <x-input-label for="group_id" :value="__('Группа')" />
                    <select id="group_id" name="group_id" class="mt-2 mb-4 w-full" required>
                        <option value="">Выберите группу</option>
                        @foreach($groups as $group)
                            <option value="{{ $group->id }}">{{ $group->title }}</option>
                        @endforeach
                    </select>
                    <x-primary-button>Сохранить</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout> 