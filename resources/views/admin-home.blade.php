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
                            @if(session('success'))
                            <div class="alert alert-success">{{ session ('success') }}</div>
                            @endif
                            <div class="card">
                                <div class="card-header">
                                    <h1>Form Pemendek Tautan</h1>
                                </div>
                                <div class="card-body">
                                    <form method="post" action="{{ route('generate.shorten.link.post') }}">
                                    @csrf
                                    <div class="input-group mb-3">
                                        <input type="text" name="link" class="form-control" placeholder="Masukkan Tautan">
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="text" name="code" class="form-control" placeholder="Masukkan Tautan Kustom (Opsional)">
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="text" name="judul" class="form-control" placeholder="Masukkan Judul Tautan (Opsional)">

                                        <div class="input-group-addon">
                                            <button class="btn btn-success">Generate Shorten Link</button>
                                        </div>
                                    </div>
                                    @error('link') <p class="m-0 p-0 text text-danger"> {{ $message }}</p>@enderror
                                    </form>
                                </div>
                            </div>
                            <div class="card mt-5">
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
                                            @foreach ($shortLinks as $row)
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
