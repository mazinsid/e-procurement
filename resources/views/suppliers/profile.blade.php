@extends('layouts.app')
<style>
    .rating {
        display: inline-block;
        position: relative;
        height: 50px;
        line-height: 50px;
        font-size: 50px;
    }

    .rating label {
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        cursor: pointer;
    }

    .rating label:last-child {
        position: static;
    }

    .rating label:nth-child(1) {
        z-index: 5;
    }

    .rating label:nth-child(2) {
        z-index: 4;
    }

    .rating label:nth-child(3) {
        z-index: 3;
    }

    .rating label:nth-child(4) {
        z-index: 2;
    }

    .rating label:nth-child(5) {
        z-index: 1;
    }

    .rating label input {
        position: absolute;
        top: 0;
        left: 0;
        opacity: 0;
    }

    .rating label .icon {
        float: left;
        color: transparent;
    }

    .rating label:last-child .icon {
        color: #000;
    }

    .rating:not(:hover) label input:checked ~ .icon,
    .rating:hover label:hover input ~ .icon {
        color: #09f;
    }

    .rating label input:focus:not(:checked) ~ .icon:last-child {
        color: #000;
        text-shadow: 0 0 5px #09f;
    }
</style>
@section('content')
    <div class="main">
        @if(session()->has('error'))
            <div class="alert alert-danger">
                {{session()->get('error')}}
            </div>
        @endif
        <div class="card">
            <div class="card-header"><a href="#">All suppliers</a></div>
            <div class="card-body">



                    @foreach($suppliers as $supplier)

                           <p> <span> name: </span>{{$supplier->name}}</p>
                    <p> <span> address: </span> {{$supplier->address}}</p>
                    <p>  <span> phone: </span>  {{$supplier->phone}}</p>
                    <p>  <span> about: </span>  {{$supplier->about}}</p>
                        <form method="post" action="{{route('SupplierCompany.store')}}" >
                            @csrf
                            <input type="hidden" name="supplier_id" value="{{$supplier->id}}">
                            <button type="submit" class="btn btn-success">Add </button>
                        </form>
                    @endforeach

            </div>
        </div>
    </div>

@endsection
<script>
    $(':radio').change(function() {
        console.log('New star rating: ' + this.value);
    });
</script>
