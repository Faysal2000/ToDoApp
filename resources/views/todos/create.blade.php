@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white text-center">
            <h4>إضافة مهمة جديدة</h4>
        </div>
        <div class="card-body">

            {{-- عرض أخطاء التحقق --}}
            @if ($errors->any())
                <div class="alert alert-danger text-white">
                    <strong>يوجد أخطاء في البيانات:</strong>
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- نموذج إنشاء مهمة --}}
            <form action="{{ route('todos.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label text-white">عنوان المهمة <span class="text-danger">*</span></label>
                    <input type="text" name="title" id="title" class="form-control"
                           value="{{ old('title') }}" required
                           placeholder="مثال: دراسة للامتحان">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label text-white">وصف المهمة</label>
                    <textarea name="description" id="description" class="form-control"
                              rows="4" placeholder="تفاصيل إضافية عن المهمة (اختياري)">{{ old('description') }}</textarea>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('todos.index') }}" class="btn btn-secondary text-white">← العودة إلى المهام</a>
                    <button type="submit" class="btn btn-success text-white">حفظ المهمة</button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
