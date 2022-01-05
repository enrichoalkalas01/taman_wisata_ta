@extends('layouts/main')

@section('title', 'Taman Wisata')

@section('content')
    <style>
        #login-page {
            padding: 5%;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh;
        }
    </style>
    <section id="login-page">
        <div style="width: 50%;">
            <div class="mb-3">
                <label for="username" class="form-label">username</label>
                <input type="text" name="username" class="form-control" id="username" placeholder="input your username here..">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="input your password here..">
            </div>
            <div class="mb-3">
                <button class="btn btn-primary">Login</button>
            </div>
        </div>
    </section>
@endsection
    