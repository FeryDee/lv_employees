@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
            <h1>Dashboard</h1>
            <p>Ony Authentication users can asses this session</p>

            @can('isAdmin')
                <button class="btn btn-success btn-lg">Admin Access</button>
            @elsecan('isManager')
                <button class="btn btn-success btn-lg">Manager Access</button>
            @elsecan('isBranchManager')
                <button class="btn btn-success btn-lg">Branch Manager Access</button>
            @else
                <button class="btn btn-success btn-lg">User Access</button>
            @endcan
        @endauth

        @guest
            <h1>Home Page</h1>
            <p>You are in home page</p>
        @endguest
    </div>
@endsection
