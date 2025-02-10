@extends('layouts.app')
@section('title', 'Create Kelas')

@section('content')
<div class="bg-gray-800 shadow-lg rounded-lg w-fit p-3">
    <form action="/kelas" method="post">
        @csrf
        <label for="name" class="block text-md text-gray-300 mb-3" >Nama Kelas</label>
        @error('name')
        <span class="text-red-500 text-sm italic block">{{ $message }}</span>
        @enderror
        <input value="{{old('name')}}" type="text" name="name" id="name" class="text-black mx-3 px-4 py-2 bg-gray-700 rounded-md border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500" />
        <button type="submit" class="rounded-md px-4 py-2 text-white bg-blue-600 hover:bg-blue-700 font-semibold focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300">Submit</button>
    </form>
</div>
@endsection