@extends('layoutes.app')
@section('content')


    <div class="max-w-4xl mx-auto">
        <h1 class="text-3xl font-bold mb-6">Teachers</h1>

        @if(session('success'))
            <div class="mb-4 p-3 bg-green-200 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('teacher.create') }}" class="mb-4 inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            + Add Teacher
        </a>

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="py-3 px-4 border">ID</th>
                        <th class="py-3 px-4 border">Name</th>
                        <th class="py-3 px-4 border">Age</th>
                        <th class="py-3 px-4 border">Faculty</th>
                        <th class="py-3 px-4 border">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($teachers as $key => $teacher)
                        <tr class="hover:bg-gray-50">
                            <td class="py-2 px-4 border">{{ $teacher->id }}</td>
                            <td class="py-2 px-4 border">{{ $teacher->name }}</td>
                            <td class="py-2 px-4 border">{{ $teacher->age }}</td>
                            <td class="py-2 px-4 border">{{ $teacher->faculty->name }}</td>
                            <td class="py-2 px-4 border">
                                <a href="{{ route('teacher.edit', $teacher->id) }}" class="text-blue-600 hover:underline">Edit</a>
                                <form action="{{ route('teacher.destroy', $teacher->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline ml-2" onclick="return confirm('Delete this teacher?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

