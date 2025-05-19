@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4 text-center">✏️ تعديل المهمة</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>حدثت بعض الأخطاء:</strong>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('todos.update', $todo->id) }}" method="POST" class="card shadow-sm p-4">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">عنوان المهمة</label>
            <input type="text" name="title" id="title" class="form-control" 
                   value="{{ old('title', $todo->title) }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">الوصف (اختياري)</label>
            <textarea name="description" id="description" class="form-control" rows="4">{{ old('description', $todo->description) }}</textarea>
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" name="is_completed" id="is_completed" class="form-check-input"
                   {{ $todo->is_completed ? 'checked' : '' }}>
            <label class="form-check-label" for="is_completed">تم الانتهاء من المهمة</label>
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('todos.index') }}" class="btn btn-secondary">رجوع</a>
            <button type="submit" class="btn btn-primary">💾 حفظ التعديل</button>
        </div>
    </form>
</div>
@endsection
