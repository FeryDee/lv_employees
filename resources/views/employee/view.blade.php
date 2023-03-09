@extends('layouts.app-master')
@section('content')
    <main class="content">

        <div class="container-fluid p-0">

            <div class="row">
                <div class="col-md-4 ms-auto my-4">
                    <a href="{{ route('employee.index') }}" class="btn btn-dark">Back</a>
                </div>
            </div>

            <div class="card content-center col-md-6">

                <h4>Employee Information</h4>

                <div class="row">
                    <div class="col-md-6">
                        <p>EmployeeName::{{ $employee->name }}</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
