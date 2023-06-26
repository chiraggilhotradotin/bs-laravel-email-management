@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <h2 class="text-center">Emails <a href="{{route('emails.create')}}" class="btn btn-primary">+</a></h2>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            @foreach($emails as $email)
            <tr>
                <td>{{$email->id}}</td>
                <td>{{$email->name}}</td>
                <td>{{$email->email}}</td>
                <td>


                    <form action="{{route('emails.destroy', $email->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <div class="btn-group">
                            <a href="{{route('emails.edit', $email->id)}}" class="btn btn-info">Edit</a>
                            <input type="submit" class="btn btn-danger" value="Destroy" onclick="return confirm('Do you really want to delete?');">
                        </div>
                    </form>

                </td>
            </tr>
            @endforeach
        </table>
    </div>
    {{$emails->links()}}
</div>
@endsection