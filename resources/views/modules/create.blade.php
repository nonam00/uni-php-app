<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Добавить модуль') }}
        </h2>
        <a href="{{ route('modules.index') }}">
            <x-primary-button>Назад к списку</x-primary-button>
        </a>
    </x-slot>
    <div class="py-6">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('modules.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <x-input-label for="title" :value="__('Название')" />
                        <x-text-input id="title" name="title" type="text" class="mt-2 w-full" required />
                    </div>
                    <div>
                        <x-input-label for="description" :value="__('Описание')" />
                        <textarea id="description" name="description" class="mt-2 w-full"></textarea>
                    </div>
                    <div>
                        <x-input-label for="teacher_id" :value="__('Преподаватель')" />
                        <select id="teacher_id" name="teacher_id" class="mt-2 w-full" required>
                            <option value="">Выберите преподавателя</option>
                            @foreach($teachers as $teacher)
                                <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <x-input-label for="groups" :value="__('Группы')" />
                        <select id="groups" name="groups[]" class="mt-2 w-full" multiple>
                            @foreach($groups as $group)
                                <option value="{{ $group->id }}">{{ $group->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <x-primary-button>Сохранить</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout> 