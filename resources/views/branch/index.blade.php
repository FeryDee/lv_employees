@extends('layouts.app-master')

@section('content')
    <div class="col-md-12">
        <h3>Branch</h3>
        @can('isAdmin')
            <a href="{{ route('branch.create') }}" class="btn btn-dark">Add new branch</a>
        @elsecan('isManager')
            <a href="{{ route('branch.create') }}" class="btn btn-dark">Add new branch</a>
        @endcan

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Branch_name</th>
                </tr>
            </thead>
            <tbody>
                <form action="{{ route('branch.index') }}" method="get">
                    @csrf
                    @method('delete')
                    @foreach ($branches as $branch)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $branch->branch_name }}</td>
                            <td>
                                @can('isAdmin')
                                    <div class="col-md 12 ms-auto">
                                        <a href="{{ route('branch.show')}}" class="btn btn-success ">View</a>
                                        <a href="{{ route('branch.edit')}}" class="btn btn-warning ">Edit</a>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </div>
                                @elsecan('isManager')
                                    <div class="col-md 12 ms-auto">
                                        <a href="{{ route('branch.show')}}" class="btn btn-success">View</a>
                                        <a href="{{ route('branch.edit')}}" class="btn btn-warning">Edit</a>
                                    </div>
                                @elsecan('isBranchManager')
                                    <div class="col-md 12 ms-auto ">
                                        <a href="{{ route('branch.show')}}" class="btn btn-success ">View</a>
                                        <a href="{{ route('branch.edit')}}" class="btn btn-warning ">Edit</a>
                                    </div>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </form>
            </tbody>
        </table>
    </div>
@endsection
