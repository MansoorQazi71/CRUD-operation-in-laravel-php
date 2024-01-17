@extends('layouts.app')
@section('main')
    <div class="container text-end">
        <button class="btn btn-secondary text-light my-2">
            <a href="create" class="text-light my-2">new product</a>
        </button>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Sno.</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    
                    <td>{{$loop->index+1}}</td>
                    <td><a href="products/{{$product->id}}/show" class="text-dark">{{$product->name}}</a></td>
                    <td>{{$product->description}}</td> 
                    <td>
                        <img src="products/{{$product->image}}" class="rounded-circle" style="height:50px; width:50px">
                    </td> 
                    <td>
                        <a href="products/{{$product->id}}/edit" class="btn btn-sm btn-dark">Edit</a>
                        <!-- <a href="products/{{$product->id}}/delete" class="btn btn-sm btn-danger">Delete</a> -->
                        <form action="products/{{$product->id}}/delete" class="d-inline" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td> 
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endsection