@extends('layout.main')
@section('content')
    <form action="{{ route('shorten') }}" method="POST">
        @csrf
        <div class="input-group">
            <input type="text" name='url' class="form-control">
            <button class="btn" type='submit'>
                Shorten
            </button>
        </div>
    </form>
@endsection
