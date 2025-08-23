@extends('layoutes.app')

@section('content')
<div class="max-w-lg mx-auto p-6">
    <h1 class="text-xl font-bold mb-4">Create Faculty-Teacher Relation</h1>

    <form action="{{ route('faculty_teacher.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label for="faculty_id" class="block mb-1 font-semibold">Faculty</label>
            <select name="faculty_id" id="faculty_id" class="w-full border p-2 rounded">
                <option value="">-- Select Faculty --</option>
                @foreach($faculties as $faculty)
                    <option value="{{ $faculty->id }}" {{ old('faculty_id') == $faculty->id ? 'selected' : '' }}>
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
                <option value="">-- Select Teacher --</option>
                @foreach($teachers as $teacher)
                    <option value="{{ $teacher->id }}" {{ old('teacher_id') == $teacher->id ? 'selected' : '' }}>
                        {{ $teacher->name }}
                    </option>
                @endforeach
            </select>
            @error('teacher_id')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
            Save
        </button>
    </form>
</div>
@endsection
