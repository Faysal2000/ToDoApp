@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4 text-center">📝 قائمة المهام</h1>

    {{-- رسالة النجاح --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- زر إضافة مهمة جديدة --}}
    <div class="d-flex justify-content-end mb-4">
        <a href="{{ route('todos.create') }}" class="btn btn-success">
            + إضافة مهمة جديدة
        </a>
    </div>

    {{-- التحقق من وجود مهام --}}
    @if($todos->isEmpty())
        <div class="alert alert-info text-center">
            لا توجد مهام حالياً. يمكنك إضافة مهمة جديدة 👆
        </div>
    @else
        {{-- عرض قائمة المهام --}}
        <div class="row">
            @foreach ($todos as $todo)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm border-{{ $todo->is_completed ? 'success' : 'secondary' }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $todo->title }}</h5>
                            <p class="card-text">{{ $todo->description }}</p>

                            {{-- حالة المهمة --}}
                            <p>
                                @if($todo->is_completed)
                                    <span class="badge bg-success">مكتملة</span>
                                @else
                                    <span class="badge bg-secondary">غير مكتملة</span>
                                @endif
                            </p>

                            {{-- أزرار التعديل والحذف --}}
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('todos.edit', $todo->id) }}" class="btn btn-warning btn-sm">
                                    تعديل
                                </a>

                                <form action="{{ route('todos.destroy', $todo->id) }}" method="POST"
                                    onsubmit="return confirm('هل أنت متأكد أنك تريد حذف هذه المهمة؟');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
