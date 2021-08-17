@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">



           
                  @if(count($errors) > 0)

                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">{{$error}}</div>
                        @endforeach

                  @endif








                <div class="panel-heading">Edit Post</div>

                <div class="panel-body">

                   <div class="row">
                   
                   <form class="form-horizontal" method="POST" action="{{url('/editPost',array($posts->id))}}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="post_title" class="col-md-4 control-label">Post Title</label>

                            <div class="col-md-6">
                                <input id="post_title" type="text" class="form-control" name="post_title" value="{{ $posts->post_title }}" >

                               
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Post Body</label>

                            <div class="col-md-6">
                                <textarea id="post_body" type="text" class="form-control" name="post_body" value="" >{{$posts->post_body}}</textarea>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="category_id" class="col-md-4 control-label">Category</label>

                            <div class="col-md-6">
                                <select name="category_id" id="category_id" class="form-control">

                                <option value="{{$category->id}}">{{$category->category}}</option>

                                @if(count($categories)>0)

                                    @foreach($categories->all() as $category)

                                        <option value="{{$category->id}}">{{$category->category}}</option>

                                    @endforeach

                                @endif
                               
                                
                                </select>

                            </div>
                        </div>


                        
                        <div class="form-group">
                            <label for="post_image" class="col-md-4 control-label">Featured Image</label>

                            <div class="col-md-6">
                                <input id="profile_pic" type="file" class="form-control" name="post_image" value="" >

                            
                            </div>
                        </div>

                       

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary btn-large btn-block">
                                    Update Post
                                </button>
                            </div>
                        </div>
                    </form>
                   
                   </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
