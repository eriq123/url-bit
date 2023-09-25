@extends('layout.main')
@section('content')
    <form action="{{ route('shorten') }}" method="POST">
        @csrf
        <input type="text" name='url'>
        <button>
            submit
        </button>
    </form>
@endsection
