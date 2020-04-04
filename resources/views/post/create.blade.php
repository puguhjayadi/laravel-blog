@extends('layouts.app')


@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Post</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Create</h6>
        </div>
        <div class="card-body">

            <div class="row mb-4">
                <div class="col-8">
                    <a href="{{ route('post.index') }}" class="btn btn-sm btn-warning"><i class="fa fa-chevron-left"></i> Back</a>
                </div>
            </div>

            @if(session()->get('errors'))
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                {{ $error }} <br/>
                @endforeach
            </div>
            @endif

            <form role="form"  action="{{ route('post.store') }}" method="post" id="formData" enctype="multipart/form-data" class="form-horizontal">
                {{ csrf_field() }}
                <div class="pl-lg-4">
                    <div class="col-md-6">
                     <div class="form-group focused">
                        <label class="form-control-label" >User</label>
                        <select name="user_id" class="form-control">
                            <option value="" selected="" disabled="">Pilih User</option>
                            @foreach($users as $user)
                            <option value="{{$user->id}}" {{ (old('user_id') == $user->id) ? 'selected' : '' }}>{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group focused">
                        <label class="form-control-label" >Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Title" value="{{old('title')}}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group focused">
                        <label class="form-control-label" >Content</label>
                        <textarea name="content" class="form-control" placeholder="Content" >{{old('content')}}</textarea>
                    </div>
                </div>
            </div>


            <hr class="my-4">
            <div class="pl-lg-4">
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary btn-sm" id="submit"><i class="fa fa-save"></i> Save</button>
                    </div>
                </div>                  
            </div>
        </form>
    </div>
</div>

</div>

@endsection



