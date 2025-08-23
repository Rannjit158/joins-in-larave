@extends('layoutes.app')
@section('content')


    <div class="container mx-auto max-w-md bg-white p-6 rounded shadow">
        <h1 class="text-xl font-bold mb-4">Add New Faculty</h1>

        @if($errors->any())
            <div class="bg-red-100 text-red-800 p-2 rounded mb-4">
                <ul class="list-disc pl-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('faculties.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block mb-1 font-medium">Faculty Name</label>
                <input type="text" name="name" id="name" class="w-full border px-3 py-2 rounded" value="{{ old('name') }}" required>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Add</button>
        </form>
    </div>


@endsection
