@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Hello from {{ config('app.name', 'Laravel') }}</h1>
    </div>
@endsection
