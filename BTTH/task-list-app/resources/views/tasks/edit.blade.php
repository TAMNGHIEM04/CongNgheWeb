@extends('layouts.app')

@section('content')
<h2>Sửa Task</h2>

<form method="POST" action="{{ route('tasks.update', $task->id) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Tiêu đề</label>
        <input class="form-control" name="title" value="{{ $task->title }}">
    </div>

    <div class="mb-3">
        <label>Mô tả</label>
        <textarea class="form-control" name="description">{{ $task->description }}</textarea>
    </div>

    <div class="mb-3">
        <label>Mô tả chi tiết</label>
        <textarea class="form-control" name="long_description">{{ $task->long_description }}</textarea>
    </div>

    <div class="mb-3">
        <input type="checkbox" name="completed" {{ $task->completed ? 'checked' : '' }}> Hoàn thành
    </div>

    <button class="btn btn-primary">Cập nhật</button>
</form>
@endsection
