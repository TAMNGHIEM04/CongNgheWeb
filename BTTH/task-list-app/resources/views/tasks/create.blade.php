@extends('layouts.app')

@section('content')
<h2>Thêm Task</h2>

<form method="POST" action="{{ route('tasks.store') }}">
    @csrf

    <div class="mb-3">
        <label>Tiêu đề</label>
        <input class="form-control" name="title">
    </div>

    <div class="mb-3">
        <label>Mô tả</label>
        <textarea class="form-control" name="description"></textarea>
    </div>

    <div class="mb-3">
        <label>Mô tả chi tiết</label>
        <textarea class="form-control" name="long_description"></textarea>
    </div>

    <div class="mb-3">
        <input type="checkbox" name="completed"> Hoàn thành
    </div>

    <button class="btn btn-success">Lưu</button>
</form>
@endsection
