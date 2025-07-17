<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Редактировать студента') }}
        </h2>
        <a href="{{ route('students.index') }}">
            <x-primary-button>Назад к списку</x-primary-button>
        </a>
    </x-slot>
    <div class="py-6">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('students.update', $student) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')
                    <div>
                        <x-input-label for="name" :value="__('Имя')" />
                        <x-text-input id="name" name="name" type="text" class="mt-2 w-full" value="{{ $student->name }}" required />
                    </div>
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" name="email" type="email" class="mt-2 w-full" value="{{ $student->email }}" required />
                    </div>
                    <div>
                        <x-input-label for="group_id" :value="__('Группа')" />
                        <select id="group_id" name="group_id" class="mt-2 w-full" required>
                            @foreach($groups as $group)
                                <option value="{{ $group->id }}" @selected($group->id == $student->group_id)>{{ $group->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <x-primary-button>Сохранить</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout> 