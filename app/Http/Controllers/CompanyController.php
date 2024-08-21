<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $companies = Company::paginate(10); // Set pagination to 10 entries per page
        return view('companies.index', compact('companies'));
    }

    // Show the form for creating a new resource.
    public function create()
    {
        return view('companies.create');
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:companies|max:255',
            'email' => 'nullable|email|max:255',
            'logo' => 'nullable|image|dimensions:min_width=100,min_height=100',
            'website' => 'nullable|url|max:255',
        ]);

        $logoPath = $request->file('logo') ? $request->file('logo')->store('logos', 'public') : null;

        Company::create([
            'name' => $request->name,
            'email' => $request->email,
            'logo' => $logoPath,
            'website' => $request->website,
        ]);

        return redirect()->route('companies.index')->with('success', 'Company Created Successfully!');
    }

    // Show the form for editing the specified resource.
    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }

    // Update the specified resource in storage.
    public function update(Request $request, Company $company)
    {
        $request->validate([
            'name' => 'required|max:255|unique:companies,name,' . $company->id,
            'email' => 'nullable|email|max:255',
            'logo' => 'nullable|image|dimensions:min_width=100,min_height=100',
            'website' => 'nullable|url|max:255',
        ]);

        if ($request->hasFile('logo')) {
            if ($company->logo) {
                Storage::disk('public')->delete($company->logo);
            }
            $logoPath = $request->file('logo')->store('logos', 'public');
        } else {
            $logoPath = $company->logo;
        }

        $company->update([
            'name' => $request->name,
            'email' => $request->email,
            'logo' => $logoPath,
            'website' => $request->website,
        ]);

        return redirect()->route('companies.index')->with('success', 'Company Updated Successfully!');
    }

    // Remove the specified resource from storage.
    public function destroy(Company $company)
    {
        if ($company->logo) {
            Storage::disk('public')->delete($company->logo);
        }
        $company->delete();
        return redirect()->route('companies.index')->with('success', 'Company Deleted Successfully!');
    }
}
