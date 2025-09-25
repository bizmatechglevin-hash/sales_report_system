<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SaleslogController extends Controller
{
   public function show($pcId)
{
    $pc = \App\Models\Pc::findOrFail($pcId);

    // paginate saleslogs (10 per page)
   $saleslogs = \App\Models\Saleslog::where('pc_id', $pcId)
    ->with('branch')
    ->orderBy('created_at', 'desc')
    ->paginate(10); // ✅ returns Paginator


    // ✅ make sure to define $totalCoins
    $totalCoins = \App\Models\Saleslog::where('pc_id', $pc->id)->sum('coins');

    // ✅ now pass it to the view
    return view('pcs.saleslogs', compact('pc', 'saleslogs', 'totalCoins'));
}
public function create(\App\Models\Pc $pc)
{
    $branches = \App\Models\Branch::all(); // so you can pick a branch
    return view('pcs.create', compact('pc', 'branches'));
}

public function store(Request $request)
{
    $request->validate([
        'pc_id'     => 'required|exists:pcs,id',
        'branch_id' => 'required|exists:branches,id',
        'coins'     => 'required|numeric|min:1',
        'credits'   => 'required|integer|min:1',
        'ssid'      => 'nullable|string|max:255',
    ]);

    \App\Models\Saleslog::create($request->only([
        'pc_id',
        'branch_id',
        'coins',
        'credits',
        'ssid',
    ]));

    return redirect()->route('pcs.create', $request->pc_id)
                     ->with('success', 'Sales log added successfully!');
}


    
}
