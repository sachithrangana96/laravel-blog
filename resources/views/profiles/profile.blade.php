@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">


        
                  @if(count($errors) > 0)

                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">{{$error}}</div>
                        @endforeach

                 @endif




            <div class="panel panel-default">

          
                <div class="panel-heading">profile</div>

                <div class="panel-body">

                <form class="form-horizontal" method="POST" action="{{ url('/addProfile') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Enter Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" >

            
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="designation" class="col-md-4 control-label">Designation</label>

                            <div class="col-md-6">
                                <input id="designation" type="text" class="form-control" name="designation" >

                            
                            </div>
                        </div>



                        <div class="form-group">
                            <label for="profile_pic" class="col-md-4 control-label">Profile Picture</label>

                            <div class="col-md-6">
                                <input id="profile_pic" type="file" class="form-control" name="profile_pic" >

                            
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Add Profile
                                </button>

                              
                            </div>
                        </div>
                    </form>

                
                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
