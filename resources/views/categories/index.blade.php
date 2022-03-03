@extends('layouts.app')

@section('content')
    <div class="main">
@if(session()->has('error'))
    <div class="alert alert-danger">
        {{session()->get('error')}}
    </div>
    @endif
            <div class="clearfix">
                <a href="{{route('categories.create')}}"
                   class="btn float-right btn-success " style="margin-bottom:10px">Add users</a>
            </div>
                <div class="card">
                    <div class="card-header">All users</div>
                    <div class="card-body">

                        <table class="table">
                            <thead>
                            <tr>
                                <td>name</td>
                                <td>controle</td>
                                <td>delete</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{$category->name}}</td>




{{--                                            <form action="{{route('categories.edit')}}" method="get">--}}
                                                <button class="btn bg-primary" type="submit">edit </button>
                                            </form>

                                        <td>

{{--                                                <form action="{{route('categories.delete')}}" method="get">--}}
                                                    <button class="btn bg-danger" type="submit">delete</button>
                                                </form>

                                        </td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
                </div>

@endsection
