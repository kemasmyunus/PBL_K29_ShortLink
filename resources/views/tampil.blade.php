<title>AdminLTE 3 | Bantuan</title>

@extends('layouts.main')
@section('container')
        <table class="table table-bordered">
            <thead>
                 <tr>
                    <th>ID</th>
                    <th>Short Link</th>
                    <th>Link</th>
                 </tr>
            </thead>
            <tbody>
                @foreach ($data as $row)
                <tr>
                    <td>{{ $row->id }}</td>
                    <td><a href="{{ route('shorten.link',$row->code) }}" target="_blank">{{ route('shorten.link',$row->code) }}</a></td>
                    <td>{{ $row->link }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endsection