@extends("layouts.admins.app")
@section('auth')
    @php
        $chek = true;

    @endphp
@endsection
@section('content')
   @livewire("login-admin")
@endsection
