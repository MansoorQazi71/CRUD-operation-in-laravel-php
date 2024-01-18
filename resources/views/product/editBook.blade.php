@extends('layouts.app')
@section('main')
   <div class="container">
    <div class="row">
        <div class="col-dm-12">
            <form action="/books/{{$books->id}}/update" method="POST" enctype="multipart/form-data">
            @csrf 
            @method('PUT')
             <div class="form-group">
                <label for="">Book Name</label>
                <input type="text" name="name" class="form-control" value="{{old('name', $books->name)}}"/>
                @if ($errors->has('name'))
                    <span class="text-danger">{{$errors->first('name')}}</span>
                @endif
             </div> 
             <div class="form-group">
                <label for="">Book Author</label>
                <textarea type="text"  name='author' class="form-control">{{old('author',$books->author)}}</textarea>
                @if ($errors->has('author'))
                    <span class="text-danger">{{$errors->first('author')}}</span>
                @endif
             </div> 
             <div class="form-group">
                <label for="">Publish Date</label>
                <input type="date" name="publish_date" class="form-control" />
                @if ($errors->has('publish_date'))
                    <span class="text-danger">{{$errors->first('publish_date')}}</span>
                @endif
             </div> 
             <button type="submit" class="btn btn-secondary">Submit</button>
             </form>
        </div>
    </div>

   </div>
   @endsection