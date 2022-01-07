@extends('layouts.app')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" style="margin-top: 100px;">
            <div class="card">
                <div class="card-body">
                    <form method="GET" action="{{ route('verify') }}">
                        <div class="row mb-3">
                            <label for="phone" class="col-md-4 col-form-label text-md-end">Your phone number:</label>
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