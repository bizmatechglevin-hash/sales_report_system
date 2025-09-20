@extends('layouts.main')

@section('content')
<div class="p-6 max-w-lg mx-auto">
    <h2 class="text-2xl font-bold mb-4">Edit Branch</h2>

    <form action="{{ route('branches.update', $branch->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')
        <div>
            <label class="block font-medium">Branch Name</label>
            <input type="text" name="name" value="{{ $branch->name }}" class="w-full border rounded p-2" required>
        </div>
        <div>
            <label class="block font-medium">Branch Code</label>
            <input type="text" name="code" value="{{ $branch->code }}" class="w-full border rounded p-2" required>
        </div>
        <div>
            <label class="block font-medium">Address</label>
            <textarea name="address" class="w-full border rounded p-2" required>{{ $branch->address }}</textarea>
        </div>
        <div>
            <label class="block font-medium">Phone</label>
            <input type="text" name="phone" value="{{ $branch->phone }}" class="w-full border rounded p-2">
        </div>
        <button type="submit" class="px-4 py-2 bg-yellow-600 text-white rounded">
            Update
        </button>
        <a href="{{ route('branches.index') }}" class="ml-2 text-gray-600">Cancel</a>
    </form>
</div>
@endsection
