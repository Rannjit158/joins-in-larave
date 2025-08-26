@extends('layoutes.app')

@section('content')
<div class="max-w-lg mx-auto p-6">
    <h1 class="text-xl font-bold mb-4">Edit Faculty-Teacher Relation</h1>

    <form action="{{ route('faculty_teacher.update', $facultiesteacher->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <!-- Faculty Section -->
        <div>
            <label for="faculty_id" class="block mb-1 font-semibold">Faculty</label>
            @foreach($faculties as $faculty)
                <div>
                    <label>
                        <input type="checkbox"
                               name="faculty_id[]"
                               value="{{ $faculty->id }}"
                               {{ in_array($faculty->id, (array) $facultiesteacher->faculty_id) ? 'checked' : '' }}>
                        {{ $faculty->name }}
                    </label>
                </div>
            @endforeach

            @error('faculty_id')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <!-- Teacher Section -->
        <div>
            <label for="teacher_id" class="block mb-1 font-semibold">Teacher</label>
            @foreach($teachers as $teacher)
                <div>
                    <label>
                        <input type="checkbox"
                               name="teacher_id[]"
                               value="{{ $teacher->id }}"
                               {{ in_array($teacher->id, (array) $facultiesteacher->teacher_id) ? 'checked' : '' }}>
                        {{ $teacher->name }}
                    </label>
                </div>
            @endforeach

            @error('teacher_id')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit Button -->
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">
            Update
        </button>
    </form>
</div>
@endsection
