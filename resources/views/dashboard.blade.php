@extends('layouts.app')
@section('title', 'Main Dashboard')

@section('content')
<p>Selamat datang {{session()->get('username')}}!</p>
@endsection