@extends('layouts.app')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" style="margin-top: 5px;">
            <div class="card">
                <div class="card-body">
                    <form method="GET" action="{{ route('search') }}">
                        <div class="row mb-3">
                            <label for="phone" class="col-md-4 col-form-label text-md-end">Phone number:</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="phone">
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
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
                @isset($users)
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
                @endisset
                </div>
            </div>
        </div>
    </div>
</div>