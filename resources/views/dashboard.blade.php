@extends('layouts.app')
@section('title', 'Home')

@section('content')
<p>Selamat datang {{session()->get('username')}}!</p>
@endsection