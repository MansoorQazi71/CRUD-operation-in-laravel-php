@extends('layouts.app')
@section('main')
   <div class="container">
    <div class="row">
        <div class="col-dm-12">
            <form action="/products/{{$product->id}}/update" method="POST" enctype="multipart/form-data">
            @csrf 
            @method('PUT')
             <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control" value="{{old('name', $product->name)}}"/>
                @if ($errors->has('name'))
                    <span class="text-danger">{{$errors->first('name')}}</span>
                @endif
             </div> 
             <div class="form-group">
                <label for="">Description</label>
                <textarea type="text"  name='description' class="form-control">{{old('description',$product->description)}}</textarea>
                @if ($errors->has('description'))
                    <span class="text-danger">{{$errors->first('description')}}</span>
                @endif
             </div> 
             <div class="form-group">
                <label for="">Image</label>
                <input type="file" name="image" class="form-control" />
                @if ($errors->has('image'))
                    <span class="text-danger">{{$errors->first('image')}}</span>
                @endif
             </div> 
             <button type="submit" class="btn btn-secondary">Submit</button>
             </form>
        </div>
    </div>

   </div>
   @endsection