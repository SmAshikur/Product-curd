@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if(Session::has('msg'))
                <div class="alert alert-dissmissable alert-success">
                    <strong class="m-auto">{{Session::get('msg')}}</strong>
                </div>
               @endif
                <div class="card-header ml-auto mt-2">
                    <a href="{{url('category/create')}}" class="btn btn-primary ">Go For Create Category</a>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>ID</th>
                            <th>Category Name</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        @foreach ($cats as $category )
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->cname}}</td>
                            <td><a class="btn btn-success" href="{{url('category/'.$category->id.'/edit')}}">Edit</a></td>
                            <td>
                               <form action="{{url('category/'.$category->id)}} " method="post" >
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
                    {{$cats->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
