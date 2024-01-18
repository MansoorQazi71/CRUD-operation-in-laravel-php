@extends('layouts.app')
@section('main')
    <div class="container text-end">
        <button class="btn btn-secondary text-light my-2">
            <a href="newBook" class="text-light my-2">new book</a>
        </button>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Sno.</th>
                    <th scope="col">Book Name</th>
                    <th scope="col">Book Author</th>
                    <th scope="col">Publish_Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                <tr>
                    
                    <td>{{$loop->index+1}}</td>
                    <td><a href="/books/{id}" class="text-dark">{{$book->name}}</a></td>
                    <td>{{$book->author}}</td> 
                    <td>
                        {{$book->publish_date}}
                    </td> 
                    <td>
                        <a href="/books/{{$book->id}}/edit" class="btn btn-sm btn-dark">Edit</a>
                        {{-- <!-- <a href="products/{{$product->id}}/delete" class="btn btn-sm btn-danger">Delete</a> --> --}}
                        <form action="/books/{{$book->id}}/destroy" class="d-inline" method="POST">
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