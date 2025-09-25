@extends('layouts.main')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold mb-4">Add Sales for {{ $pc->name }}</h2>

    <form action="{{ route('saleslogs.store', $pc->id) }}" method="POST" class="bg-white p-6 rounded-lg shadow-md space-y-4">
        @csrf

        <div>
            <label class="block font-semibold">Branch</label>
            <select name="branch_id" class="w-full border rounded px-3 py-2">
                @foreach($branches as $branch)
                    <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block font-semibold">Coins</label>
            <input type="number" name="coins" class="w-full border rounded px-3 py-2" required>
        </div>

        <div>
            <label class="block font-semibold">Credits (minutes)</label>
            <input type="number" name="credits" class="w-full border rounded px-3 py-2" required>
        </div>

        <div>
            <label class="block font-semibold">SSID (optional)</label>
            <input type="text" name="ssid" class="w-full border rounded px-3 py-2">
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Save
        </button>
    </form>
</div>
@endsection
