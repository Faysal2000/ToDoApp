@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg bg-dark text-white border-0 rounded-4">
        <div class="card-header bg-primary text-white rounded-top-4 d-flex align-items-center">
            <i class="bi bi-info-circle-fill me-2 fs-4"></i>
            <h4 class="mb-0 text-white">تفاصيل المهمة</h4>
        </div>

        <div class="card-body p-4">
            <h3 class="card-title mb-3">
                <i class="bi bi-list-task me-2"></i>
                {{ $todo->title }}
                <span class="badge {{ $todo->is_completed ? 'bg-success' : 'bg-warning text-white' }}">
                    {{ $todo->is_completed ? 'مكتملة' : 'غير مكتملة' }}
                </span>
            </h3>

            <p class="card-text fs-5">
                <i class="bi bi-card-text me-2 text-white"></i>
                <strong>الوصف:</strong><br>
                {{ $todo->description ?? 'لا يوجد وصف لهذه المهمة.' }}
            </p>

            <p class="card-text text-white">
                <i class="bi bi-clock-history me-2"></i>
                <strong>تاريخ الإنشاء:</strong> {{ $todo->created_at->format('Y-m-d H:i') }}<br>
                <i class="bi bi-arrow-repeat me-2"></i>
                <strong>آخر تحديث:</strong> {{ $todo->updated_at->format('Y-m-d H:i') }}
            </p>

            <div class="mt-4 d-flex justify-content-between text-white">
                <a href="{{ route('todos.edit', $todo->id) }}" class="btn btn-outline-light">
                    <i class="bi bi-pencil-square me-1"></i> تعديل المهمة
                </a>
                <a href="{{ route('todos.index') }}" class="btn btn-light">
                    <i class="bi bi-arrow-left-circle me-1"></i> العودة إلى القائمة
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
