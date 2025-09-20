<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Pc;
use Illuminate\Http\Request;

class PcController extends Controller
{
    public function store(Request $request, Branch $branch)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $branch->pcs()->create([
            'name' => $request->name,
        ]);

        return redirect()->route('branches.show', $branch->id)
                         ->with('success', 'PC added successfully!');
    }

    public function destroy(Branch $branch, Pc $pc)
    {
        if ($pc->branch_id !== $branch->id) {
            abort(403, 'Unauthorized');
        }

        $pc->delete();

        return redirect()->route('branches.show', $branch->id)
                         ->with('success', 'PC deleted successfully!');
    }
}
