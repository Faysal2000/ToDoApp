@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-info text-white text-center">
            <h4>تفاصيل المهمة</h4>
        </div>
        <div class="card-body">

            <div class="mb-3">
                <h5 class="fw-bold">العنوان:</h5>
                <p class="form-control-plaintext">{{ $todo->title }}</p>
            </div>

            <div class="mb-3">
                <h5 class="fw-bold">الوصف:</h5>
                <p class="form-control-plaintext">{{ $todo->description ?? 'لا يوجد وصف' }}</p>
            </div>

            <div class="mb-3">
                <h5 class="fw-bold">تم الإنشاء في:</h5>
                <p class="form-control-plaintext">{{ $todo->created_at->format('Y-m-d H:i') }}</p>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('todos.index') }}" class="btn btn-secondary">← العودة إلى المهام</a>
                <a href="{{ route('todos.edit', $todo->id) }}" class="btn btn-primary">تعديل المهمة</a>
            </div>

        </div>
    </div>
</div>
@endsection
