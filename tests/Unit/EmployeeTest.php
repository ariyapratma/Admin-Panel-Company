<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Employee;
use App\Models\Company;

class EmployeeTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_employee_creation()
    {
        // Create a company using the Company factory
        $company = Company::factory()->create();

        // Create an employee using the Employee factory
        $employee = Employee::factory()->create(['company_id' => $company->id]);

        // Assert that the employee is in the database
        $this->assertDatabaseHas('employees', [
            'id' => $employee->id,
            'firstname' => $employee->firstname,
            'lastname' => $employee->lastname,
            'company_id' => $company->id,
            'email' => $employee->email,
            'phone' => $employee->phone,
        ]);
    }
}
