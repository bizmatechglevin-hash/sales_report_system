<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;
use App\Models\Saleslog;

class BranchController extends Controller
{
    public function index()
    
    
    {
        $branches = Branch::all();
        return view('branches.index', compact('branches'));
    }

    public function create()
    {
        return view('branches.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required|unique:branches',
            'address' => 'required',
            'phone' => 'nullable',
        ]);

        Branch::create($request->all());

        return redirect()->route('branches.index')
                         ->with('success', 'Branch created successfully.');
    }

    public function edit(Branch $branch)
    {
        return view('branches.edit', compact('branch'));
    }

    public function update(Request $request, Branch $branch)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required|unique:branches,code,' . $branch->id,
            'address' => 'required',
            'phone' => 'nullable',
        ]);

        $branch->update($request->all());

        return redirect()->route('branches.index')
                         ->with('success', 'Branch updated successfully.');
    }
     
    public function destroy(Branch $branch)
    {
        $branch->delete();

        return redirect()->route('branches.index')
                         ->with('success', 'Branch deleted successfully.');
    }
    
public function show($identifier)
{
    // If identifier is numeric → find by ID
    if (is_numeric($identifier)) {
        $branch = \App\Models\Branch::findOrFail($identifier);
    } else {
        // Otherwise → find by first word of branch name
        $branch = \App\Models\Branch::whereRaw("SUBSTRING_INDEX(name, ' ', 1) = ?", [$identifier])
            ->firstOrFail();
    }

    // Load related PCs
    $branch->load('pcs');

    // Calculate total sales
    $totalSales = $branch->pcs()->sum('sales');

    return view('branches.show', compact('branch', 'totalSales'));
}




}
