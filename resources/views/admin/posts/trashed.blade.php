@extends('layouts.app')


@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                <th>Image</th>
                <th>Title</th>
                <th>Edit</th>
                <th>Restore</th>
                <th>Destroy</th>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td><img src="{{ $post->featured }}" alt="{{$post->title}}" width="50px" height="50px"></td>
                        <td>{{ $post->title }}</td>
                        <td> <a href="" class="btn  btn-info">Edit</a></td>

                        <td> <a href="{{ route('post.delete',['id' => $post->id]) }}" class="btn  btn-success">Restore</a></td>
                        <td> <a href="{{ route('post.delete',['id' => $post->id]) }}" class="btn  btn-danger">Restore</a></td>
                    </tr>
                @endforeach

                </tbody>
            </table>

        </div>
    </div>
@stop