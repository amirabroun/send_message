@extends('layouts.app')

<nav class="bg-white navbar-light">
    <div class="row">
        <div class="col-xs-12 col-sm-6 offset-sm-3 col-md-6 offset-md-3">
            <ul class="nav justify-content-center">
                <li class="nav-item">
                    <a class="nav-link" href="">Select message</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Select message</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Select message</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Select message</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" style="margin-top: 10px;">
            <div class="card">
                <div class="card-body">
                    <form method="GET" action="{{ route('admin') }}">
                        <div class="row mb-3">
                            <label for="phone" class="col-4 col-form-label text-md-end">Phone number:</label>
                            <div class="col-6">
                                <input type="text" class="form-control" name="phone">
                            </div>
                            <div class="col-2">
                                <button type="submit" class="btn btn-primary">
                                    submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div style="margin-top: 10px;">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Phone</th>
                                <th>Service</th>
                                <th>Message</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        @foreach ($users as $key => $user)
                        <tbody>
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $user->phone  }}</td>
                                <td>{{ $user->service ?? 'null' }}</td>
                                <td>{{ $user->message ?? 'null' }}</td>
                                <td>{{ $user->status }}</td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div> 