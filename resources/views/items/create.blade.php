@extends('layouts.app')

@section('content')
    <div class="main">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ isset($item)? 'Update Item ':'Add New Item' }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{isset($item)? route('items.update',$item) : route('items.store') }}" enctype="multipart/form-data">
                            @csrf
                            @if(isset($item))
                            @method('PUT')
                            @endif
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                           value="{{ isset($item) ? $item->name : '' }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('amount') }}</label>

                                <div class="col-md-6">
                                    <input id="amount" type="text" class="form-control @error('amount') is-invalid @enderror"
                                           name="amount" value="{{ isset($item) ? $item->amount : '' }}" required autocomplete="amount" autofocus>
                                    @error('amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('price') }}</label>

                                <div class="col-md-6">
                                    <input id="price" type="text" class="form-control @error('price') is-invalid @enderror"
                                           name="price" value="{{ isset($item) ? $item->price : '' }}" required autocomplete="price" autofocus>

                                    @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="about" class="col-md-4 col-form-label text-md-right">{{ __('about') }}</label>

                                <div class="col-md-6">
                                    <textarea id="about" type="text" class="form-control @error('about') is-invalid @enderror"
                                              name="about"  rows="3">{{ isset($item) ? $item->about : '' }}</textarea>

                                    @error('about')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="category_id" class="col-md-4 col-form-label text-md-right">{{ __('category') }}</label>

                                <div class="col-md-6">
                                    <select id="selectCategory" class="form-control" name="category_id" >
                                            <option value="">.....</option>


                                        @foreach($categories as $category)
                                            <option  @if(isset($item)){{($category->id==$item->category_id) ? 'selected' : ''}}@endif value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('image') }}</label>
                                @if(isset($item))
                                    <img src="{{asset('storage/'.$item->image)}}" alt="" width="150px">
                                @endif
                                <div class="col-md-6">
                                    <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" required autocomplete="image" autofocus>

                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
