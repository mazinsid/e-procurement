@extends('layouts.app')

@section('content')
    @if(session()->has('error'))
        <div class="alert alert-danger">
            {{session()->get('error')}}
        </div>
    @endif

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
    </div>
</div>

    @endsection
