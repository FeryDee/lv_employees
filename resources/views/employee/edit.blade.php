@extends('layouts.app-master')

@section('content')
<div class="container-fluid p-0">
    <h3>Edit Employee</h3>

    <div class="row">
        <div class="col-md 12 ms-auto my-4">
            <a href="{{ route('employee.index') }}" class="btn btn-dark">Back</a>
        </div>

        <div class="col-md-12">
            <form action="{{ route('employee.update',$employee->id) }}" method="post">
                @csrf
                @method('put')
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="name" id=""
                        placeholder="Enter Name" value="{{$employee->name}}">
                    <label for="floatingInput">Name</label>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button  type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
