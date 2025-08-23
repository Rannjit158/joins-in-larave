@extends('layoutes.app')

@section('content')
<div class="max-w-lg mx-auto p-6">
    <h1 class="text-xl font-bold mb-4">Edit Faculty-Teacher Relation</h1>

    <form action="{{ route('faculty_teacher.update', $facultiesteacher->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="faculty_id" class="block mb-1 font-semibold">Faculty</label>
            <select name="faculty_id" id="faculty_id" class="w-full border p-2 rounded">
                @foreach($faculties as $faculty)
                    <option value="{{ $faculty->id }}"
                        {{ $facultiesteacher->faculty_id == $faculty->id ? 'selected' : '' }}>
                        {{ $faculty->name }}
                    </option>
                @endforeach
            </select>
            @error('faculty_id')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="teacher_id" class="block mb-1 font-semibold">Teacher</label>
            <select name="teacher_id" id="teacher_id" class="w-full border p-2 rounded">
                @foreach($teachers as $teacher)
                    <option value="{{ $teacher->id }}"
                        {{ $facultiesteacher->teacher_id == $teacher->id ? 'selected' : '' }}>
                        {{ $teacher->name }}
                    </option>
                @endforeach
            </select>
            @error('teacher_id')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">
            Update
        </button>
    </form>
</div>
@endsection
