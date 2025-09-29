<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Saleslog;
use App\Models\Pc;
use App\Models\Branch;

class SaleslogController extends Controller
{
    public function show($pcId)
    {
        $pc = Pc::findOrFail($pcId);

        // paginate saleslogs (10 per page)
        $saleslogs = Saleslog::where('pc_id', $pcId)
            ->with('branch')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        // total coins
        $totalCoins = Saleslog::where('pc_id', $pc->id)->sum('coins');

        return view('pcs.saleslogs', compact('pc', 'saleslogs', 'totalCoins'));
    }

public function create(Pc $pc)
{
    $branches = Branch::all();
    return view('pcs.create', compact('pc', 'branches'));
}


public function store(Request $request)
{
    $validated = $request->validate([
        'pc_id'     => 'required|exists:pcs,id',
        'branch_id' => 'required|exists:branches,id',
        'coins'     => 'required|numeric|min:0',
        'credits'   => 'required|numeric|min:0',
        'ssid'      => 'nullable|string',
    ]);

    Saleslog::create($validated);


  return redirect()->route('pcs.saleslogs', ['pc' => $validated['pc_id']])
                 ->with('success', 'Sales log created successfully.');
}

 public function saleslogs(Pc $pc) // route-model binding
    {
        $saleslogs = Saleslog::where('pc_id', $pc->id)
            ->with('branch')
            ->latest()
            ->get();

        $totalCoins = $saleslogs->sum('coins');

        return view('pcs.saleslogs', compact('pc', 'saleslogs', 'totalCoins'));
    }


}
