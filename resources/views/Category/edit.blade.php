@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="{{url('category')}}" class="btn btn-primary">Go to Index</a>
                </div>

                <div class="card-body">
                    <form action="{{url('category/'.$category->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Category Name</label>
                            <input type="text" name="cname"
                            value="{{$category->cname}}" class="form-control">
                            @error('cname')
                                <span class="text-danger"> {{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success"> Update Category</button>
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
