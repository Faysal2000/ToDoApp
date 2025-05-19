@extends('layouts.app')

@section('content')
<style>
    body, html {
        height: 100%;
    }

    .centered-container {
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>

<div class="centered-container bg-dark">
    <div class="card shadow-lg bg-dark text-white w-100" style="max-width: 600px;">
        <div class="card-header bg-success text-white text-center">
            <h4>إضافة مهمة جديدة</h4>
        </div>

        <div class="card-body">
            
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>حدثت أخطاء:</strong>
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li class="text-white">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('todos.store') }}" method="POST">
                @csrf

               
                <div class="mb-3">
                    <label for="title" class="form-label text-white">عنوان المهمة <span class="text-danger">*</span></label>
                    <input type="text" name="title" id="title"
                        class="form-control bg-secondary  border-0 @error('title') is-invalid @enderror"
                        value="{{ old('title') }}" placeholder="أدخل عنوان المهمة" required>

                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label text-dark">وصف المهمة</label>
                    <textarea name="description" id="description" rows="4"
                        class="form-control bg-secondary text-white border-0 @error('description') is-invalid @enderror"
                        placeholder="أدخل وصفًا تفصيليًا (اختياري)">{{ old('description') }}</textarea>

                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-plus-circle text-white"></i> إضافة المهمة
                    </button>
                    <a href="{{ route('todos.index') }}" class="btn btn-outline-light">إلغاء</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
