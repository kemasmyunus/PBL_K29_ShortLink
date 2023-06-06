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
                @foreach ($posts as $row)
                <tr>
                    <td>{{ $row["title"] }}</td>
                    <td>{{ $row["author"] }}</td>
                    <td>{{ $row["body"] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endsection