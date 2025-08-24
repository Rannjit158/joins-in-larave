@extends('layoutes.app')
@section('content')

    <div class="max-w-lg mx-auto bg-white shadow-lg rounded-lg p-6">
        <h1 class="text-2xl font-bold mb-6">Add New Teacher</h1>

        <form action="{{ route('teacher.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block text-gray-700 font-medium">Name</label>
                <input type="text" name="name" class="w-full p-2 border rounded" required>
                @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-gray-700 font-medium">Age</label>
                <input type="number" name="age" class="w-full p-2 border rounded" required>
                @error('age') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Save
            </button>
            <a href="{{ route('teacher.index') }}" class="ml-2 text-gray-600 hover:underline">Cancel</a>
        </form>
    </div>
    @endsection

