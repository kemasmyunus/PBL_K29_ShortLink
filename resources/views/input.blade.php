<title>AdminLTE 3 | Home</title>
@extends('layouts.main')
@section('container')
    <div class="container mt-5">
        <h1>Laravel - Create URL Shortener</h1>
        @if(session('success'))
        <div class="alert alert-success">{{ session ('success') }}</div>
        @endif
        <div class="card">
            <div class="card-header">
                <form method="post" action="{{ route('generate.shorten.link.post') }}">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" name="link" class="form-control" placeholder="Enter URL">
                    <input type="text" name="judul" class="form-control" placeholder="Masukkan Judul">
                    <div class="input-group-addon">
                        <button class="btn btn-success">Generate Shorten Link</button>
                    </div>
                </div>
                @error('link') <p class="m-0 p-0 text text-danger"> {{ $message }}</p>@enderror
                </form>
                @if (session('success'))
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Short Link</th>
                                <th>Link</th>
                            </tr>
                        </thead>
                        @foreach ($Tautan as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td><a href="{{ route('shorten.link',$row->code) }}" target="_blank">{{ route('shorten.link',$row->code) }}</a></td>
                            <td>{{ $row->link }}</td>
                        </tr>
                        @endforeach
        
                    </table>
                @endif
            </div>
        </div>
    </div>
    @endsection