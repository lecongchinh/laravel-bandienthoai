@extends('admin.layout')

@section('title', 'User')

@section('content')
<!--content ==================== -->
<div class="card mb-3 container-fluid" id="table_user">
    <div class="tableUser">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @if(count($users)==0)
                    <tr>
                        <td>Empty data!</td>
                    </tr>
                @else
                    @foreach ($users as $user)
                        <tr id="user_id_{{$user->id}}">
                            <th scope="row">{{$user->id}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->role}}</td>
                            @if(Auth::user()->email != $user->email) 
                                <td>
                                    <button type="button" onclick="deleteUser({{$user->id}})" class="btn btn-primary fas fa-trash-alt"></button>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection