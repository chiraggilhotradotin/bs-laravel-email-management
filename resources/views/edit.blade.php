@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <form class="col-md-6 offset-md-3" action="{{route('emails.update',$email->id)}}" method="post">
            @csrf
            @method('PUT')
            <h2 class="alert alert-secondary text-center"><a href="{{route('emails.index')}}" class="text-black text-decoration-none float-start">&lt;</a>Edit Email</h2>
            <div>
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{old('name')??$email->name}}">
                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mt-3">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="{{old('email')??$email->email}}">
                @error('email')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mt-4">
                <input type="submit" class="btn btn-primary w-100" value="Update">
            </div>
        </form>
    </div>
</div>

@endsection