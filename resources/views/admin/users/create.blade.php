@extends('layouts.app')

@section('content')
    @include('admin.partials.errors')
    <div class="panel panel-default">
        <div class="panel-heading">
            Create A New User
        </div>

        <div class="panel-body">
            <form action="{{ route('user.store') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Name Of Tag :</label>
                    <input type="text" name="name" class="form-control">
                </div>

                <div class="form-group">
                    <label for="email">Email :</label>
                    <input type="email" name="email" class="form-control">
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Add New User</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop