@extends('layouts.app')


@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                <th>Image</th>
                <th>Title</th>
                <th>Edit</th>
                <th>Delete</th>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->featured }}</td>
                        <td>{{ $post->title }}</td>
                        {{--<td> <a href="{{ route('post.edit',['id' =>   $post->id]) }}" class="btn btn-xss btn-info">Edit</a></td>--}}

                        {{--<td> <a href="{{ route('post.delete',['id' => $post->id]) }}" class="btn btn-xss btn-danger">Delete</a></td>--}}
                    </tr>
                @endforeach

                </tbody>
            </table>

        </div>
    </div>
@stop