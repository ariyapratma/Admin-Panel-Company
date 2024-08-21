<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use App\Mail\EmployeeAdded;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::paginate(10); // Set pagination to 10 entries per page
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        $companies = Company::all();
        return view('employees.create', compact('companies'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'company_id' => 'required|exists:companies,id',
            'email' => 'required|email|unique:employees,email',
            'phone' => 'nullable|string|max:255',
        ]);

        $employee = Employee::create($validated);

        // Uncomment to send email notification
        // $company = Company::findOrFail($request->company_id);
        // Mail::to($company->email)->send(new EmployeeAdded($employee));

        return redirect()->route('employees.index')->with('success', 'Employee Created Successfully And Notification Sent!');
    }

    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        $companies = Company::all();
        return view('employees.edit', compact('employee', 'companies'));
    }

    public function update(Request $request, Employee $employee)
    {
        $validated = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'company_id' => 'required|exists:companies,id',
            'email' => 'required|email|unique:employees,email,' . $employee->id,
            'phone' => 'nullable|string|max:255',
        ]);

        $employee->update($validated);

        return redirect()->route('employees.index')->with('success', 'Employee Updated Successfully!');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Employee Deleted Successfully!');
    }
}
