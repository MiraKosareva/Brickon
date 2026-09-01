@extends('admin.layouts.app')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold">Редактирование категории</h1>
    <a href="{{ route('admin.categories.index') }}" class="text-gray-500 hover:text-brickon-red">← Назад</a>
</div>

<div class="bg-white rounded-lg shadow p-6 max-w-lg">
    <form action="{{ route('admin.categories.update', $category) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-medium mb-1">Название</label>
            <input type="text" name="name" value="{{ old('name', $category->name) }}" 
                   class="w-full border rounded-lg px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block font-medium mb-1">Slug</label>
            <input type="text" name="slug" value="{{ old('slug', $category->slug) }}" 
                   class="w-full border rounded-lg px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block font-medium mb-1">Описание</label>
            <textarea name="description" rows="3" 
                      class="w-full border rounded-lg px-3 py-2">{{ old('description', $category->description) }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block font-medium mb-1">Фото категории</label>
            @if($category->image)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $category->image) }}" 
                         alt="Текущее фото" 
                         class="w-20 h-20 object-cover rounded">
                </div>
            @endif
            <input type="file" name="image" accept="image/*" 
                   class="w-full border rounded-lg px-3 py-2">
            <p class="text-xs text-gray-500 mt-1">Оставьте пустым, если не хотите менять фото</p>
        </div>

        <div class="mt-6">
            <button type="submit" class="bg-brickon-red text-white px-6 py-2 rounded-lg hover:bg-red-700">
                Обновить
            </button>
        </div>
    </form>
</div>
@endsection