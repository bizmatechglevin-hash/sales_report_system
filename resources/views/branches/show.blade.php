@extends('layouts.main')

@section('content')
<div class="p-6 bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold">🏢 {{ $branch->name }} — PCs</h2>
        <a href="{{ route('branches.index') }}" class="text-sm text-blue-600 hover:underline">← Back to Branches</a>
    </div>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <!-- Add PC form -->
    <form method="POST" action="{{ route('pcs.store', $branch->id) }}" class="mb-6 flex space-x-2">
        @csrf
        <input type="text" name="name" placeholder="Enter PC name (ex: PC 1)" required
               class="flex-1 border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-400">
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">➕ Add PC</button>
    </form>

    <!-- PCs table -->
    <div class="overflow-x-auto bg-white rounded-lg shadow-sm border">
        <table class="w-full">
            <thead class="bg-gray-100 text-left">
                <tr>
                    <th class="px-4 py-3 border-b">#</th>
                    <th class="px-4 py-3 border-b">PC Name</th>
                    <th class="px-4 py-3 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($branch->pcs as $i => $pc)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 border-b">{{ $i + 1 }}</td>
                        <td class="px-4 py-3 border-b">💻 {{ $pc->name }}</td>
                        <td class="px-4 py-3 border-b">
                            <form method="POST" action="{{ route('pcs.destroy', [$branch->id, $pc->id]) }}" onsubmit="return confirm('Delete this PC?')" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800">🗑 Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-4 py-6 text-center text-gray-500">No PCs yet. Add one above.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
