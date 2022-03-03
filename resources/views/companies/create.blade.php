@extends('layouts.app')

@section('content')
    <div class="main">
    <div class="container">
        @if(session()->has('error'))
            <div class="alert alert-danger">
                {{session()->get('error')}}
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add Company</div>

                    <div class="card-body">
                        <form method="POST" action="{{route('companies.store')}}">
                            @csrf

                            <div class="form-group">
                                <label for="Post title">name</label>
                                <input type="text" class="form-control " value="" name="name" placeholder="Add name Company ">
                                    </div>
                            <div class="form-group">
                                <label for="Post title">email</label>
                                <input type="email" class="form-control " value="" name="email" placeholder="Add email Company">
                            </div>
                            <div class="form-group">
                                <label for="Post title">address</label>
                                <input type="text" class="form-control " value="" name="address" placeholder="Add address Company">
                            </div>
                            <div class="form-group">
                                <label for="Post title">arbitrage</label>
                                <input type="number" class="form-control " value="" name="arbitrage" placeholder="Add arbitrage Company">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Create</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
