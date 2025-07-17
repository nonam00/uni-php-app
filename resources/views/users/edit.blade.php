<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Изменить роль пользователя #') . $user->id }}
        </h2>
    </x-slot>

<div class="py-12">
<div class="max-w-lg mx-auto sm:px-6 lg:px-8">
<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

    <form method="POST" action="{{ route('users.update', $user) }}" class="space-y-4">
        @csrf
        @method('PUT')
        <div>
            <label class="block mb-1" for="role">Роль</label>
            <select id="role" name="role" class="w-full border rounded px-3 py-2">
                @foreach($roles as $role)
                    <option value="{{ $role }}" @selected(old('role', $user->role) === $role)>{{ ucfirst($role) }}</option>
                @endforeach
            </select>
            @error('role')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        <div class="flex justify-end gap-2">
            <a href="{{ route('users.index') }}" class="px-4 py-2 border rounded">Отмена</a>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Сохранить</button>
        </div>
    </form>
</div></div></div>
</x-app-layout> 