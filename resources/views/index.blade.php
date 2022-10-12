@extends('layout')
@section('content')
<style>
    .push-top {
        margin-top: 50px;
    }
</style>
<div class="push-top">
    @if(session()->get('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}  
    </div><br />
    @endif
    <div>
        <h2>To Do List</h2>
    </div>
    <table class="table">
        <thead>
            <tr class="table-warning">
                <td>Title</td>
                <td>Details</td>
                <td>Status</td>
                <td class="text-center">Action</td>
            </tr>
        </thead>
        <tbody>
        @foreach($task as $tasks)
            <tr>
                <td>{{$tasks->title}}</td>
                <td>{{$tasks->detail}}</td>
                <td>{{$tasks->status}}</td>
                <td class="text-center">
                    <a href="{{ route('tasks.edit', $tasks->id)}}" class="btn btn-primary btn-sm"">Edit</a>
                    <form action="{{ route('tasks.destroy', $tasks->id)}}" method="post" style="display: inline-block">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm"" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div>
        <a href="{{ route('tasks.create')}}" class="btn btn-success btn-sm"">Add</a>
    </div>
</div>
@endsection