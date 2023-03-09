@extends('layouts.app-master')

@section('content')
    <div class="container-fluid p-0">
        <h3>Add Employee</h3>

        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('employee.index') }}" class="btn btn-dark">Back</a>
            </div>

            <div class="col-md-12">
                <form action="{{ route('employee.store') }}" method="get">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="name" id="" placeholder="Enter Name"
                            value="{{ old('name') }}">
                        <label for="floatingInput">Name</label>
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        {{-- @foreach ($employees as $employee) --}}
                            <select name="branch_id" class="form-select" aria-label="Default select example" id="">
                                <option selected hidden value="">Chose Branch</option>
                                {{-- <option value="{{ $employee->branch->branch_name }}"></option> --}}
                                @foreach ($branches as $branch)
                                    <option value="{{ $branch->id }}">{{ $branch->branch_name }}</option>
                                @endforeach
                            </select>
                            @error('branch_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        {{-- @endforeach --}}

                    </div>

                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
    </div>
@endsection
