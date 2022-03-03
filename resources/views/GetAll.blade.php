@extends('layouts.app')

@section('content')
    <div class="main">
@if(session()->has('error'))
    <div class="alert alert-danger">
        {{session()->get('error')}}
    </div>
    @endif
            <div class="row col-sm-12">
                    @foreach($items as $item)
                        <div class="col-sm-4">
                            <div class="thumbnail">
                         <img src="{{ asset('storage/'.$item->image)}}" width="200" height="100">

                                <p><strong><a href="#">
                                    @foreach($categories as $category)
                                      {{$category->name}}
                                    @endforeach
                                        </a>
                                    </strong>
                                </p>

                                <div class="product_title"><a href="#">{{$item->name}}</a></div>
                                <div class="product_price">{{$item->price}}</div>
                                <form action="{{route('RequestItem.store')}}" method="post" >
                                    @csrf
                                    <input type="hidden" name="item_id" value="{{$item->id}}">
                                    <input type="hidden" name="amount" value="{{$item->amount}}">
                                    <input type="hidden" name="supplier_id" value="{{$item->supplier_id}}">
                                    <div class="product_price"><input class="form-control" type="number" name="amount"></div>
                                    <button class="btn bg-success" type="submit">Request</button>
                                    <br>
                                </form>
                            </div>
                        </div>
                <br>
                <span></span>

                <!-- action-wrap -->
                            @endforeach
            </div>
    </div>
@endsection
