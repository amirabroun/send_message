@extends('layouts.app')

<nav class="bg-white navbar-light">
    <div class="row">
        <div class="col-xs-12 col-sm-6 offset-sm-3 col-md-6 offset-md-3">
            <ul class="nav justify-content-center">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin') }}">Admin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user') }}">User</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('messages') }}">Message</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" style="margin-top: 100px;">
            <div class="card">
                <div class="card-body">
                    Welcome to Sanjeman!
                </div>
            </div>
        </div>
    </div>
</div>