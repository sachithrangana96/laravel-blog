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

            
        @if(session('response'))

            <div class="alert alert-success">{{session('response')}}</div>

        @endif

            <div class="panel panel-default">
                <div class="panel-heading">

                    <div class="row">
                        <div class="col-md-4">Dashbord</div>
                        <div class="col-md-8">
                            <form action='{{url("/search")}}'  method="POST">
                                {{csrf_field()}}
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control" placeholder="Search for..">

                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-warning">
                                            search  <i class="fa fa-search p-5"></i>
                                        </button>
                                    </span>

                                </div>
                            </form>
                        </div>
                    </div>
                
                
                
                
                </div>

                <div class="panel-body">
                   <div class="col-md-4">


                    @if(!empty($profile))

                    <img src="{{ $profile->profile_pic }}" alt="" class="avatar"/>
                    
                    @else

                    <img src="{{url('images/Blank-Profile.png')}}" alt="" class="avatar">

                    @endif


                    @if(!empty($profile))

                    
                    <p class="lead text-center " style="margin-top:5px;">{{ $profile->name}}</p>
                    

                    @else

                   <p></p>

                    @endif



                    @if(!empty($profile))

                   
                    <p class="text-center">{{ $profile->designation }}</p>


                    @else

                    <p></p>

                    @endif

   
                   </div>


                   <div class="col-md-8">
                   
                   @if(count($posts) > 0)

                        @foreach($posts->all() as $post)

                            <h4 class="text-center">{{$post->post_title}}</h4>
                            <img src="{{$post->post_image}}" alt="" width="450" height="250">
                            <p>{{substr($post->post_body,0,75)}}</p>

                            <ul class="nav nav-pills">
                                <li role="presentaion">
                                    <a href='{{url("/view/{$post->id}")}}'>
                                        <span class="fa fa-eye"> View</span>
                                    </a>
                                </li>

                            @if(Auth::id()==1)

                                <li role="presentaion">
                                    <a href='{{url("/edit/{$post->id}")}}'>
                                        <span class="fa fa-edit"> Edit</span>
                                    </a>
                                </li>

                                <li role="presentaion">
                                    <a href='{{url("/delete/{$post->id}")}}'>
                                        <span class="fa fa-trash"> Delete</span>
                                    </a>
                                </li>

                            @endif

                            </ul>



                            <cite style="float:left;"> Posted on: {{date('M j,Y H:i', strtotime($post->updated_at))}}</cite>
                            <hr>

                        @endforeach

                   @else

                        <p>No Post Available !</p>

                   @endif

                   {{ $posts->links()}}
                   
                   </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

