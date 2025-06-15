@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">✏️ タスク編集</h1>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
            <ul class="list-disc pl-5 space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('tasks.update', $task) }}">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">タイトル</label>
            <input type="text" name="title" id="title" value="{{ old('title', $task->title) }}"
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">詳細</label>
            <textarea name="description" id="description" rows="4"
                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">{{ old('description', $task->description) }}</textarea>
        </div>

        <div class="flex justify-end items-center space-x-4">
            <a href="{{ route('tasks.index') }}"
               class="inline-flex items-center px-4 py-2 text-sm text-gray-700 hover:underline">
                キャンセル
            </a>
            <button type="submit"
                    class="inline-flex items-center bg-blue-600 text-sm px-4 py-2 rounded hover:bg-blue-700 transition">
                更新
            </button>
        </div>
    </form>
</div>
@endsection
