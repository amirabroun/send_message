@extends('layouts.app')

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
                                        <input type="submit" value="{{ ($message->status == 1) ? 'on' : 'off' }}">
                                    </form>
                                </td>
                                <!-- <td>
                                    <ul class="variants">
                                        <li class="ui-variant">
                                            <label class="ui-variant">
                                                <input type="radio" value="other" name="gender" class="variant-selector" checked>
                                                <span class="ui-variant--check">نامشخص</span>
                                            </label>
                                        </li>
                                        <li class="ui-variant">
                                            <label class="ui-variant">
                                                <input type="radio" value="male" name="gender" class="variant-selector">
                                                <span class="ui-variant--check">مرد</span>
                                            </label>
                                        </li>
                                        <li class="ui-variant">
                                            <label class="ui-variant">
                                                <input type="radio" value="female" name="gender" class="variant-selector">
                                                <span class="ui-variant--check">زن</span>
                                            </label>
                                        </li>
                                    </ul>
                                </td> -->
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>