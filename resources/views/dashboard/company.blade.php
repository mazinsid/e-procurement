@extends('layouts.app')

@section('content')
    <div class="main">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card text-center text-white bg-info">
                <div class="card-header">Request Order {{$request}}</div>
                <div class="card-body">
                    request wat  {{$request_count}}<br>
                    Order  {{$requestOrder_count}}<br>
                    Delivered  {{$OrderDelivered_count}}
                </div>
        </div>
    </div>
        <div class="col-md-6">
            <div class="card text-center text-white bg-info">
                <div class="card-header">invoices {{$invoices_count}}</div>
                <div class="card-body">
                    Not Payment  {{$invoices_NOT_pay_count}}<br>
                    Payment  {{$invoices_pay__count}}
                </div>
        </div>
    </div>
</div>
</div>
    @endsection
