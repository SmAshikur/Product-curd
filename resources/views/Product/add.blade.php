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
                    <form action="{{url('product')}}" method="post" enctype="multipart/form-data">@csrf
                        <div class="form-group">
                            <label for="">Product Name</label>
                            <input type="text" name="pname"
                            placeholder="Enter product name" class="form-control">
                            @error('pname')
                                <span class="text-danger"> {{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Select Category</label>
                            <select name="cat_id" class="form-control">
                                @foreach ($cats as $cat )
                                    <option value="{{$cat->id}}" >{{$cat->cname}}</option>
                                @endforeach
                            </select>
                            @error('cname')
                                <span class="text-danger"> {{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Product Price</label>
                            <input type="text" name="price"
                            placeholder="Enter product name" class="form-control">
                            @error('price')
                                <span class="text-danger"> {{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Product Description</label>
                           <textarea name="description" class="form-control"></textarea>
                            @error('description')
                                <span class="text-danger"> {{$message}}</span>
                            @enderror
                        </div>

                        <div class="custom-file">
                            <label for="" class="custom-file-label">Product Image</label>
                            <input type="file" name="image" class="custom-file-input">
                            @error('image')
                                <span class="text-danger"> {{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group mt-5 d-flex justify-content-center ">
                            <button type="submit" class="btn btn-success"> Create product</button>
                        </div>
                    </form>
                </div>

                <div class="card-footer">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
