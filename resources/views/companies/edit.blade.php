@extends('layouts.app')

@section('title', 'Edit Company')

@section('content')
    <div class="container">
        <a href='{{ url('companies') }}' class="btn btn-primary">
            &#x2190;
        </a>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-header bg-light text-black">
                        <h3 class="mb-0 text-center">Edit Company</h3>
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

                        <form action="{{ route('companies.update', $company->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name', $company->name) }}" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ old('email', $company->email) }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="logo" class="form-label">Logo</label>
                                <input type="file" class="form-control" id="logo" name="logo">
                            </div>
                            <div class="form-group">
                                <label for="website" class="form-label">Website</label>
                                <input type="url" class="form-control" id="website" name="website"
                                    value="{{ old('website', $company->website) }}">
                            </div>
                            <br>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-block">Update Company</button>
                            </div>
                        </form>
                    </div>
                @endsection
