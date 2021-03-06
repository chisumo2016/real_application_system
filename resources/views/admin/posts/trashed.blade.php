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

                        <td> <a href="" class="btn  btn-success">Edit</a></td>
                        <td> <a href="{{ route('posts.restore',['id' => $post->id]) }}" class="btn  btn-info">Restore</a></td>

                        {{--<td> <a href="{{ route('post.delete',['id' => $post->id]) }}" class="btn  btn-success">Restore</a></td>--}}
                        <td> <a href="{{ route('posts.kill',   ['id' => $post->id]) }}" class="btn  btn-danger">Delete</a></td>
                    </tr>
                @endforeach

                </tbody>
            </table>

        </div>
    </div>
@stop