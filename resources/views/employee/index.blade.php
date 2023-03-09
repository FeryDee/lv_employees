@extends('layouts.app-master')

@section('content')
    <div class="col-md-12">
        <h3>Employees</h3>
        @can('isAdmin')
            <a href="{{ route('employee.create') }}" class="btn btn-dark">Add new employee</a>
        @elsecan('isManager')
            <a href="{{ route('employee.create') }}" class="btn btn-dark">Add new employee</a>
        @endcan

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Branch</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($employee as $employee)
                    <form action="{{ route('employee.destroy', $employee->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $employee->name }}</td>
                            <td>{{ $employee->branch->branch_name }}</td>
                            <td>
                                @can('isAdmin')
                                    <div class="col-md 12 ms-auto">
                                        <a href="{{ route('employee.show',$employee->id) }}" class="btn btn-success ">View</a>
                                        <a href="{{ route('employee.edit',$employee->id) }}" class="btn btn-warning ">Edit</a>
                                        <button type="submit" class="btn btn-danger">Delete</button>

                                    </div>
                                @elsecan('isManager')
                                    <div class="col-md 12 ms-auto">
                                        <a href="{{ route('employee.show') }}" class="btn btn-success">View</a>
                                        <a href="{{ route('employee.edit') }}" class="btn btn-warning">Edit</a>
                                    </div>
                                @elsecan('isBranchManager')
                                    <div class="col-md 12 ms-auto ">
                                        <a href="{{ route('employee.show') }}" class="btn btn-success ">View</a>
                                        <a href="{{ route('employee.edit') }}" class="btn btn-warning ">Edit</a>
                                    </div>
                                @endcan
                            </td>
                        </tr>
                    </form>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
