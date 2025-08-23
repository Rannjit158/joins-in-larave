@extends('layoutes.app')
@section('content')


    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">Faculties List</h1>

        <a href="{{ route('faculties.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Add Faculty</a>

        @if(session('success'))
            <div class="bg-green-200 text-green-800 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <table class="min-w-full bg-white shadow rounded">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">ID</th>
                    <th class="px-4 py-2 border">Name</th>
                    <th class="px-4 py-2 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($faculties as $faculty)
                <tr>
                    <td class="px-4 py-2 border">{{ $faculty->id }}</td>
                    <td class="px-4 py-2 border">{{ $faculty->name }}</td>
                    <td class="px-4 py-2 border space-x-2">
                        <a href="{{ route('faculties.edit', $faculty->id) }}" class="bg-yellow-400 text-white px-2 py-1 rounded">Edit</a>

                        <form action="{{ route('faculties.destroy', $faculty->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>



@endsection
