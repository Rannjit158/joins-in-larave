@extends('layoutes.app')

@section('content')
<div class="max-w-5xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Faculty - Teacher Relationships</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('faculty_teacher.create') }}"
       class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">
        + Add New
    </a>

    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-100">
                <th class="border px-4 py-2">ID</th>
                <th class="border px-4 py-2">Faculty</th>
                <th class="border px-4 py-2">Teacher</th>
                <th class="border px-4 py-2">age</th>
                <th class="border px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($facultiesteachers as $relation)
                <tr>
                    <td class="border px-4 py-2">{{ $relation->id }}</td>
                    <td class="border px-4 py-2">{{ $relation->faculty->name }}</td>
                    <td class="border px-4 py-2">{{ $relation->teacher->name }}</td>
                    <td class="border px-4 py-2">{{ $relation->teacher->age }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('faculty_teacher.edit', $relation->id) }}"
                           class="bg-yellow-500 text-white px-3 py-1 rounded">Edit</a>

                        <form action="{{ route('faculty_teacher.destroy', $relation->id) }}"
                              method="POST" class="inline-block"
                              onsubmit="return confirm('Are you sure to delete?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="bg-red-500 text-white px-3 py-1 rounded">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
