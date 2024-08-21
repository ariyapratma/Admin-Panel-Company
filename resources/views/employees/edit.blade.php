<!-- resources/views/employees/edit.blade.php -->
@extends('layouts.app')

@section('title', 'Edit Employee')

@section('content')
    <div class="container">
        <a href='{{ url('employees') }}' class="btn btn-primary">
            &#x2190;
        </a>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-header bg-light text-black">
                        <h3 class="mb-0 text-center">Edit Employee</h3>
                    </div>
                    <div class="card-body">

                        <!-- Display session flash messages -->
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('employees.update', $employee->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-3">
                                <label for="firstname" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="firstname" name="firstname"
                                    value="{{ $employee->firstname }}" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="lastname" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="lastname" name="lastname"
                                    value="{{ $employee->lastname }}" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="company" class="form-label">Company</label>
                                <select class="form-control" id="company" name="company_id">
                                    @foreach ($companies as $company)
                                        <option value="{{ $company->id }}"
                                            {{ $company->id == $employee->company_id ? 'selected' : '' }}>
                                            {{ $company->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ $employee->email }}">
                            </div>
                            <div class="form-group">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                    value="{{ $employee->phone }}">
                            </div>
                            <br>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-block">Update Employee</button>
                            </div>
                        </form>
                    </div>
                @endsection
