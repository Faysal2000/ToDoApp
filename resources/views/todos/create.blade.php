@extends('layouts.app')

@section('content')
<div class="container">
    <h1>إضافة مهمة جديدة</h1>

    <form action="{{ route('todos.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">عنوان المهمة</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">وصف المهمة</label>
            <textarea name="description" id="description" class="form-control" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-success">حفظ المهمة</button>
        <a href="{{ route('todos.index') }}" class="btn btn-secondary">إلغاء</a>
    </form>
</div>
@endsection
