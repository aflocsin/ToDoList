@extends('layout')
<section>
    <h3>Welcome to To Do List!</h3>
    <p>Register an account.</p>
</section>
<section>
    @if(count($errors) > 0)
        <div style="color:red">
            @foreach ($errors->all() as $message)
                <ul>
                    <li>{{$message}}</li>
                </ul>
            @endforeach
        </div>
    @endif
    <form action="/store" method="POST">
        @csrf
        <div>
            <label for="name">Name</label>
            <input type="text" name="name">
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password">
        </div>
        <button type="submit">Sign Up</button>
    </form>
</section>