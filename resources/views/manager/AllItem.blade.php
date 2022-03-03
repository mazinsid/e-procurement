@extends('layouts.app')

@section('content')
    <div class="main">
@if(session()->has('error'))
    <div class="alert alert-danger">
        {{session()->get('error')}}
    </div>
    @endif
            <div class="clearfix">
                <a href="{{route('items.create')}}"
                   class="btn float-right btn-success " style="margin-bottom:10px">Add Items</a>
            </div>
                <div class="card">
                    <div class="card-header">All Items</div>
                    <div class="card-body">

                        <table class="table">
                            <thead>
                            <tr>
                                <td>name</td>
                                <td>amount</td>
                                <td>price</td>
                                <td>about</td>
                                <td>image</td>
                                <td>delete</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                <tr>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->amount}}</td>
                                    <td>{{$item->price}}</td>
                                    <td>{{$item->about}}</td>
                                    <td>
                                        <img src="{{ asset('storage/'.$item->image)}}" width="100px" height="50px" alt="" >
                                    </td>
                                    <td>
                                        <form action="{{route('items.edit',$item->id)}}" method="get">
                                            @csrf
                                            <button class="btn bg-success" type="submit">edit</button>
                                        </form>
                                        <form action="{{route('items.destroy',$item->id)}}" method="post" >
                                            @csrf
                                            @method('DELETE')
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
