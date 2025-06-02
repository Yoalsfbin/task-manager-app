@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">📋 タスク一覧</h1>
        <a href="{{ route('tasks.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
            ＋ 新規タスク
        </a>
    </div>

    @if ($tasks->isEmpty())
        <div class="text-gray-500 text-center">タスクがまだありません。</div>
    @else
        <div class="bg-white shadow overflow-hidden sm:rounded-md">
            <ul class="divide-y divide-gray-200">
                @foreach ($tasks as $task)
                    <li class="p-4 flex items-center justify-between">
                        <div>
                            <h2 class="text-lg font-semibold {{ $task->completed ? 'line-through text-gray-400' : '' }}">
                                {{ $task->title }}
                            </h2>
                            @if ($task->description)
                                <p class="text-sm text-gray-600">{{ $task->description }}</p>
                            @endif
                        </div>
                        <div class="flex items-center space-x-2">
                            @if (!$task->completed)
                                <form method="POST" action="{{ route('tasks.update', $task) }}">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="completed" value="1">
                                    <button class="text-green-600 hover:text-green-800" title="完了にする">✅</button>
                                </form>
                            @endif
                            <a href="{{ route('tasks.edit', $task) }}" class="text-blue-500 hover:underline">編集</a>
                            <form method="POST" action="{{ route('tasks.destroy', $task) }}">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-500 hover:text-red-700" title="削除">🗑️</button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
@endsection
