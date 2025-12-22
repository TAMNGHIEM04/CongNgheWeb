@extends('layouts.app')

@section('content')
<h2>Danh sách Task</h2>

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Tiêu đề</th>
        <th>Mô tả</th>
        <th>Trạng thái</th>
        <th>Hành động</th>
    </tr>

    @foreach($tasks as $task)
    <tr>
        <td>{{ $task->id }}</td>
        <td>{{ $task->title }}</td>
        <td>{{ $task->description }}</td>
        <td>{{ $task->completed ? 'Hoàn thành' : 'Chưa hoàn thành' }}</td>
        <td>
            <a class="btn btn-info btn-sm" href="{{ route('tasks.show', $task->id) }}">Xem</a>
            <a class="btn btn-warning btn-sm" href="{{ route('tasks.edit', $task->id) }}">Sửa</a>

            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">Xóa</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
