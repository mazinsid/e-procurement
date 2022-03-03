@extends('layouts.app')

@section('content')
    <div class="main">
    @if(session()->has('error'))
        <div class="alert alert-danger">
            {{session()->get('error')}}
        </div>
    @endif
    <div class="clearfix">
        <a href="{{route('users.create')}}"
           class="btn float-right btn-success " style="margin-bottom:10px">Add users</a>
    </div>
    <div class="card">
        <div class="card-header">All users</div>
        <div class="card-body">
            @if($users->count()>0)
                <table class="table">
                    <thead>
                    <tr>
                        <td>name</td>
                        <td>email</td>
                        <td>role</td>

                        <td>controle</td>
                        <td>delete</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->role}}</td>

                            <td>

                                    <form action="{{route('manager.delete',$user->id)}}" method="get">
                                        <button class="btn bg-danger" type="submit">delete</button>
                                    </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    @endif
                </table>
        </div>
    </div>
    </div>

@endsection
