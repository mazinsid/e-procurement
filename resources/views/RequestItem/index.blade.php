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
        <div class="card-header">All Requests</div>
        <div class="card-body">
            @if($RequestItem->count()>0)
                <table class="table">
                    <thead>
                    <tr>
                        <td>Date and Time</td>
                        <td>Gross Amount</td>
                        <td>user</td>
                        <td>supplier</td>
                        <td>Item</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($RequestItem as $item)
                        <tr>
                            <td>{{$item->created_at}}</td>
                            <td>{{$pricet=$item->amount* $item->item->price}}</td>
                            <td>{{$item->user->name}}</td>
                            <td><a href="{{route('suppliers.profile',$item->supplier->id)}}">{{$item->supplier->name}}</a></td>
                            <td>{{$item->item->name}}</td>
                            </td>
                        </tr>
                    @endforeach
                    <t>
                        <a class="btn btn-dark">  Report Download</a>
                    </t>
                    </tbody>


                    @endif
                </table>
        </div>
    </div>
    </div>

@endsection
