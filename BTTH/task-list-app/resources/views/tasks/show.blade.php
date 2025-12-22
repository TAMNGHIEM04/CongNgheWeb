@extends('layouts.app')

@section('content')
<h2>Chi tiết Task</h2>

<p><b>Tiêu đề:</b> {{ $task->title }}</p>
<p><b>Mô tả:</b> {{ $task->description }}</p>
<p><b>Mô tả chi tiết:</b> {{ $task->long_description }}</p>
<p><b>Trạng thái:</b> {{ $task->completed ? 'Hoàn thành' : 'Chưa hoàn thành' }}</p>

<a href="{{ route('tasks.index') }}" class="btn btn-secondary">Quay lại</a>
@endsection
