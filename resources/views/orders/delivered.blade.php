@extends('layouts.app')

@section('content')
    <div class="main">
    @if(session()->has('error'))
        <div class="alert alert-danger">
            {{session()->get('error')}}
        </div>
    @endif

            @if($Orders->count()>0)
                <table class="table">
                    <thead>
                    <tr>
                        <td>Date and Time</td>
                        <td>Gross Amount</td>
                        <td>user</td>
                        <td>supplier</td>
                        <td>Item</td>
                        <td>Details</td>
                        <td>...</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($Orders as $Order)
                        <tr>
{{--                            <td>{{$Orders->request_item_id->name}}</td>--}}
                            <td>{{$Order->created_at}}</td>
                            <td>{{$Order->total}}</td>
                            <td>{{$Order->request_item->user->name}}</td>
                            <td><a href="{{route('suppliers.profile',$Order->request_item->supplier->id)}}">{{$Order->request_item->supplier->name}}</a></td>
                            <td>{{$Order->request_item->item->name}}</td>
                            <td>{{$Order->details}}</td>

                            <td>
                                @if($Order->status_order!='invoice')
                                    <form action="{{route('invoice.store')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="order_id" value="{{$Order->id}}">
                                        <input type="hidden" name="supplier_id" value="{{$Order->supplier_id}}">
                                        <input type="hidden" name="company_id" value="{{$Order->company_id}}">
                                        <button class="btn bg-success" type="submit">Invoice</button>
                                    </form>
                                    @endif
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
