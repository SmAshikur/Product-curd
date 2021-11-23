@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="{{url('product')}}" class="btn btn-primary">Go to Index</a>
                </div>

                <div class="card-body">
                    <form action="{{url('product/'.$product->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Product Name</label>
                            <input type="text" name="pname"
                            value="{{$product->pname}}" class="form-control">
                            @error('pname')
                                <span class="text-danger"> {{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Product Name</label>
                            <select name="cat_id" class="form-control">
                                @foreach ($cats as $cat )
                                    <option value="{{$cat->id}}"
                                       {{$product->cat_id==$cat->id ? 'selected' : ''}} >
                                        {{$cat->cname}}</option>
                                @endforeach
                            </select>
                            @error('cname')
                                <span class="text-danger"> {{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Product Price</label>
                            <input type="text" name="price"
                            value="{{$product->price}}" class="form-control">
                            @error('price')
                                <span class="text-danger"> {{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Product Description</label>
                           <textarea name="description" class="form-control">{{$product->description}}</textarea>
                            @error('description')
                                <span class="text-danger"> {{$message}}</span>
                            @enderror
                        </div>
                        <div class="custom-file mb-5" >
                            <label for="" class="custom-file-label">Product Image</label>
                            <input type="file" name="image" class="custom-file-input">
                            @error('image')
                                <span class="text-danger"> {{$message}}</span>
                            @enderror
                            <div class="d-flex justify-content-center ">
                                @if(!empty($product->image))
                                <img class="mb-4" src="{{asset('images/pro/'.$product->image)}}" width="70px" height="70px">
                                @else
                                <span>No image</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group d-flex justify-content-center mt-4">
                            <button type="submit" class="btn btn-success"> Update product</button>
                        </div>
                    </form>
                </div>

                <div class="card-header">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
