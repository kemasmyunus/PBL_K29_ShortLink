@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-18">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                        
                        <h2>Wellcome to the Admin Dashboard</h2>
                        {{ __('You are logged in!') }}
                        <div class="container mt-5">


                            <!-- tabel shortlink -->
                            <div class="card mt-5">
                                <?php
                                use App\Models\ShortLink;
                                $links = ShortLink::latest()->get();?>
                                <div class="card-header">
                                    <h1>Table Hasil Shortlink</h1>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>

                                                <th>Judul</th>
                                                <th>Short Link</th>
                                                <th>Link</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($links as $row)
                                            <tr>
                                                <td>{{ $row->judul }}</td>
                                                <td><a href="{{ route('shorten.link',$row->code) }}" target="_blank">{{ route('shorten.link',$row->code) }}</a></td>
                                                <td>{{ $row->link }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- tabel user -->
                            <div class="card mt-5">
                                <?php
                                use App\Models\User;
                                $users = User::latest()->get();?>
                                <div class="card-header">
                                    <h1>Table Hasil Shortlink</h1>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>User Id</th>
                                                <th>Username</th>
                                                <th>Full name</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $row)
                                            <tr>
                                                <td>{{ $row->id }}</td>
                                                <td>{{ $row->username }}</td>
                                                <td>{{ $row->fullname }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
