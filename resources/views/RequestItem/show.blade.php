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

                        <td>item</td>
                        <td>amount</td>

                        <td>company</td>
                        <td>Price</td>
                        <td>Date and Time</td>
                        <td>details</td>
                        <td>Make order</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($RequestItem as $item)
                        <form action="{{route('order.store')}}" method="post">
                            @csrf
                        <tr>
                            <td>{{$item->item->name}}/td>
                            <td>{{$item->amount}}</td>

                            <td>{{$item->company->name}}</td>
                            <td>{{$pricet=$item->amount* $item->item->price}}</td>
                            <td>{{$item->created_at}}</td>
                            <td>
                                <input type="hidden" name="request_item_id" value="{{$item->id}}">
                                <input type="hidden" name="supplier_id" value="{{$item->supplier_id}}">
                                <input type="hidden" name="company_id" value="{{$item->company_id}}">

                                <input type="hidden" name="total" value="{{$pricet}}">
                                <input type="text" name="details"  ></td>
                            <td>
{{--                                    <form action="{{route('RequestItem.makeOrder',$item->id)}}" method="get">--}}

                                        <button class="btn bg-success" type="submit">Accept</button>
{{--                                    </form>--}}
                            </td>
                        </tr>
                        </form>
                    @endforeach
                    </tbody>
                    @endif
                </table>
        </div>
        </div>
    </div>

@endsection
