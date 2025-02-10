@extends('layouts.app')
@section('title', 'Edit Jurusan')

@section('content')
<div class="bg-gray-800 shadow-lg rounded-lg w-fit p-3">
    <form action="/jurusan/{{$jurusan->id}}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-6">
            <label for="name" class="block text-md text-gray-300 mb-3">Nama Jurusan</label>
            @error('name')
            <span class="text-red-500 text-sm italic block">{{ $message }}</span>
            @enderror
            <input type="text" name="name" id="name" class="text-black mx-3 px-4 py-2 bg-gray-700 rounded-md border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{old('name', $jurusan->nama_jurusan)}}" />
        </div>
        <div class="mb-6">
            <label for="kelas_id" class="block text-md text-gray-300 mb-3">Kelas</label>
            @error('kelas_id')
            <span class="text-red-500 text-sm italic block">{{ $message }}</span>
            @enderror
            <select name="kelas_id" id="kelas_id" class="text-white mx-3 px-4 py-2 bg-gray-700 rounded-md border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{old('kelas_id')}}">
                @foreach ($kelas as $k)
                <option value="{{$k->id}}"
                    {{$k->id == $jurusan->kelas_id ? 'selected' : ''}}>{{$k->nama_kelas}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="rounded-md px-4 py-2 text-white bg-blue-600 hover:bg-blue-700 font-semibold focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300">Submit</button>
    </form>
</div>
@endsection