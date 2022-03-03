@extends('layouts.app')

@section('content')
    <div class="main">
        @if(session()->has('error'))
            <div class="alert alert-danger">
                {{session()->get('error')}}
            </div>
        @endif

        @if($invoices->count()>0)
            <table class="table">
                <thead>
                <tr>
                    <td>Date and Time</td>
                    <td>user</td>
                    <td>company</td>
                    <td>Item</td>
                    <td>Amount</td>
                    <td>Total Price</td>
                    <td>...</td>
                </tr>
                </thead>
                <tbody>

                @foreach($invoices as $invoice)
                    <tr>
                        {{--                            <td>{{$Orders->request_item_id->name}}</td>--}}
                        <td>{{$invoice->created_at}}</td>
                        <td>{{$invoice->order->request_item->user->name}}</td>
                        <td>{{$invoice->company->name}}</td>
                        <td>{{$invoice->order->request_item->item->name}}</td>
                        <td>{{$invoice->order->request_item->amount}}</td>
                        <td>{{$invoice->order->total}}</td>

                        <td>
                            {{--                        @if($invoice->status_invoice!='Payment')--}}
                            {{--                            <form action="{{route('invoice.payment',$invoice->id)}}" method="get">--}}
                            {{--                                <button class="btn bg-success" type="submit">Payment</button>--}}
                            {{--                            </form>--}}
                            {{--                        @endif--}}
                        </td>
                    </tr>
{{--                    {{$totals=$totals+$invoice->order->total}}--}}
                @endforeach
                <tr>
{{--                    {{$totals}}--}}
                </tr>
                </tbody>
                @endif
            </table>
    </div>
    </div>
    </div>

@endsection
