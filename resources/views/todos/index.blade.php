@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-center text-white">قائمة المهام</h2>

   
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

   
    <div class="mb-3 text-end">
        <a href="{{ route('todos.create') }}" class="btn btn-primary text-white">+ إضافة مهمة جديدة</a>
    </div>

  
    <div class="table-responsive">
        <table class="table table-bordered align-middle text-center">
            <thead class="table-dark text-white">
                <tr>
                    <th>#</th>
                    <th>العنوان</th>
                    <th>الوصف</th>
                    <th>الحالة</th>
                    <th>الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($todos as $index => $todo)
                    <tr class="{{ $todo->is_completed ? 'table-secondary text-decoration-line-through' : ''  }} text-white">
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $todo->title }}</td>
                        <td>{{ $todo->description ?? '—' }}</td>
                        <td>
                            <span class="badge {{ $todo->is_completed ? 'bg-success' : 'bg-warning text-white' }}">
                                {{ $todo->is_completed ? 'مكتملة' : 'غير مكتملة' }}
                            </span>
                        </td>
                        <td>
                          
                            <form action="{{ route('todos.toggleStatus', $todo->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-sm {{ $todo->is_completed ? 'btn-warning' : 'btn-success' }} text-white">
                                    {{ $todo->is_completed ? 'إلغاء الإنجاز' : 'تم الإنجاز' }}
                                </button>
                            </form>

                          
                            <a href="{{ route('todos.edit', $todo->id) }}" class="btn btn-sm btn-primary text-white">تعديل</a>
                            <a href="{{ route('todos.show', $todo->id) }}" class="btn btn-info btn-sm text-white">عرض</a>
                            
                            <form action="{{ route('todos.destroy', $todo->id) }}" method="POST" class="d-inline text-white" onsubmit="return confirm('هل أنت متأكد أنك تريد حذف هذه المهمة؟');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger text-white">حذف</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-muted text-white">لا توجد مهام حالياً. أضف مهمة جديدة!</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
