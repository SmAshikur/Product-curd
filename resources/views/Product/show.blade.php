@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h2 class=""> {{$product->pname }} </h2>
                                <a href="{{url('product')}}" class="btn btn-primary ">Go to Home</a>
                            </div>
                            <div class="card-body">
                                <div>
                                    <img src="{{$product->image}}" alt=""


                                    class="img-fluid">
                                </div>
                                <div class="mt-3">
                                    <label class="badge badge-danger mb-3">  {{ $product->category->cname }} </label>
                                    <h3>${{ $product->price }}</h3>
                                </div>
                                <div class="mt-2">
                                    {{ $product->description }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
