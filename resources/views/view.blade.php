@extends('layout.main')
@section('content')
    <p>{{ $site->full_path }}</p>
    <a href="{{ route('redirect', ['url' => $site->new_path]) }}" target="_blank">
        {{ Request::root() }}/{{ $site->new_path }}
    </a>
@endsection
