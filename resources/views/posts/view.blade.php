@extends('layouts.app')

<style>
    .avatar{
        border-radius:100%;
        max-width:100%;
    }

</style>

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

      

            <div class="panel panel-default">

                <div class="panel-heading">Post View</div>

                <div class="panel-body">

                   <div class="col-md-4">

                        <ul class="list-group">
                             @if(count($categories) > 0)
                                 @foreach($categories->all() as $category)
                                    <li class="list-group-item"><a href='{{url("category/{$category->id}")}}'>{{$category->category}}</a></li>
                                 @endforeach

                             @else

                                <p>No Category Found !</p>

                             @endif
                        </ul>

                   </div>


                  <div class="col-md-8">
                   
                        
                   @if(count($posts) > 0)

                            @foreach($posts->all() as $post)

                                <h4 class="text-center">{{$post->post_title}}</h4>
                                <img src="{{$post->post_image}}" alt="" width="450" height="250">
                                <p>{{$post->post_body}}</p>

                                <ul class="nav nav-pills">
                                    <li role="presentaion">
                                        <a href='{{url("/like/{$post->id}")}}'>
                                            <span class="fa fa-thumbs-up"> Like ({{$likeCtr}})</span>
                                        </a>
                                    </li>

                                    <li role="presentaion">
                                        <a href='{{url("/dislike/{$post->id}")}}'>
                                            <span class="fa fa-thumbs-down"> Delike ({{$dislikeCtr}})</span>
                                        </a>
                                    </li>

                                    <li role="presentaion">
                                        <a href='{{url("/comment/{$post->id}")}}'>
                                            <span class="fa fa-comments"> Comment</span>
                                        </a>
                                    </li>

                                </ul>



                            @endforeach

                            @else

                            <p>No Post Available !</p>

                            @endif


                                 
                                    @if(session('response'))

                                    <div class="alert alert-success">{{session('response')}}</div>

                                    @endif



                            <form action='{{url("/comment/{$post->id}")}}' method="POST">

                                {{csrf_field()}}
                                <div class="form-group">

                                    <textarea  id="comment"  rows="6"  name="comment" class="form-control"></textarea>

                                </div>

                                <div class="form-group">
                                    <button  type="submit" class="btn btn-success btn-lg btn-block"> POST COMMENT</button>
                                </div>
                            
                            </form>


                            <h3 class="text-center">Comments</h3>

                            @if(count($comments) > 0)

                                    @foreach($comments->all() as $comment)

                                        <p class="text-center">{{$comment->comment}}</p>
                                        <p class="text-center">Posted By : {{$comment->name}}</p>
                                        <hr>
                                    @endforeach
                            @endif
                 
                   
                   </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
