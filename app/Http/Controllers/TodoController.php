<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();
        $todos = $user->todos()->latest()->get();

        return view('todos.index', compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        /** @var \App\Models\User $user */
        $user = auth()->user();

        $user->todos()->create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('todos.index')->with('success', 'تمت إضافة المهمة بنجاح!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();

        $todo = $user->todos()->findOrFail($id);

        return view('todos.edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        /** @var \App\Models\User $user */
        $user = auth()->user();

        $todo = $user->todos()->findOrFail($id);

        $todo->update([
            'title' => $request->title,
            'description' => $request->description,
            'is_completed' => $request->has('is_completed') ? 1 : 0,
        ]);

        return redirect()->route('todos.index')->with('success', 'تم تعديل المهمة بنجاح!');
    }




    public function toggleStatus($id)
{
    $todo = auth()->user()->todos()->findOrFail($id);
    $todo->is_completed = !$todo->is_completed;
    $todo->save();

    return redirect()->route('todos.index')->with('success', 'تم تحديث حالة المهمة!');
}








    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();

        $todo = $user->todos()->findOrFail($id);
        $todo->delete();

        return redirect()->route('todos.index')->with('success', 'تم حذف المهمة بنجاح!');
    }
}
