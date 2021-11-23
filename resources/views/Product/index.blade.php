@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                @if(Session::has('msg'))
                <div class="alert alert-dissmissable alert-success">
                    <strong class="m-auto">{{Session::get('msg')}}</strong>
                </div>
               @endif
                <div class="card-header ml-auto">
                    <a href="{{url('product/create')}}" class="btn btn-primary ">Go For Create product</a>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>product Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Slug</th>
                            <th>Show</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        @foreach ($pro as $product )
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>
                                @if(File::exists('images/pro/'.$product->image))
                                <img src="{{asset('images/pro/'.$product->image)}}"
                                class="card-img-top" style="height: 100px; width:100px; object-fit: cover; overflow: hidden" >
                                @else
                                <img src="{{$product->image}}"
                                class="card-img-top" style="height: 100px; width:100px; object-fit: cover; overflow: hidden" >
                                @endif
                            </td>
                            <td>{{$product->pname}}</td>
                            <td>{{$product->category->cname}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->slug}}</td>
                            <td>
                                <form action="{{url('product/'.$product->id)}} " method="get" >
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Show</button>
                                   </form>
                            </td>
                            <td><a class="btn btn-success" href="{{url('product/'.$product->id.'/edit')}}">Edit</a></td>
                            <td>
                               <form action="{{url('product/'.$product->id)}} " method="post" >
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                               </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>

                </div>

                <div class="card-footer m-auto">
                    {{$pro->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
