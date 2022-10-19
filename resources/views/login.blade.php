@extends('layout')
<section>
    <h3>Welcome to To Do List!</h3>
    <p>Sign in</p>
</section>
<section>
    <form action="/login/success" method="POST">
        @csrf
        <div>
            <label for="email">Email</label>
            <input type="email" name="email">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password">
        </div>
        <button type="submit">Login</button>
    </form>
</section>