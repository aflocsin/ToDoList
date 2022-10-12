@extends('layout')
@section('content')
<style>
    .container {
        max-width: 450px;
    }
    .push-top {
        margin-top: 50px;
    }
</style>
<div class="card push-top">
    <div class="card-header">
        Edit & Update
    </div>
    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div><br />
        @endif
        <form method="post" action="{{ route('tasks.update', $task->id) }}">
            <div class="form-group">
            @csrf
            @method('PATCH')
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" value="{{ $task->title }}"/>
            </div>
            <div class="form-group">
                <label for="detail">Details</label>
                <input type="text" class="form-control" name="detail" value="{{ $task->detail }}"/>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <input type="text" class="form-control" name="status" value="{{ $task->status }}"/>
            </div>
            <button type="submit" class="btn btn-block btn-danger">Update Task</button>
        </form>
    </div>
</div>
@endsection