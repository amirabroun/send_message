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
        <div style="margin-top: 10px;">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>message</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        @foreach ($messages as $key => $message)
                        <tbody>
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $message->message  }}</td>
                                <td>
                                    <form method="POST" action="{{ route('selectMessage') }}">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $message->id }}">
                                        <input type="submit" value="{{ ($message->status == 1) ? 'on' : 'off' }}" <?php if ($message->status) echo ('style="background: green;"'); ?>>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>