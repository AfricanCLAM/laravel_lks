@extends('layouts.app')
@section('title', 'Kelas')

@section('content')
<h1 class="text-5xl text-amber-400 mx-5 mb-8">Kelas</h1>

<table class="w-full bg-gray-700 shadow-lg rounded-lg overflow-hidden border-2 border-slate-800">
    <thead class="bg-gray-800">
        <tr>
            <th class="p-4 text-left text-gray-300 font-semibold">ID</th>
            <th class="p-4 text-left text-gray-300 font-semibold">Nama Kelas</th>
            <th class="p-4 text-left text-gray-300 font-semibold">Action</th>
        </tr>
    </thead>
    <tbody class="divide-y divide-gray-600">
        @foreach ($kelas as $k)
        <tr class="hover:bg-gray-600 transition-colors">
            <td class="p-4 text-gray-200">{{$k->id}}</td>
            <td class="p-4 text-gray-200">{{$k->nama_kelas}}</td>
            <td class="p-4 flex space-x-3">
                <a href="/kelas/{{$k->id}}/edit" class="rounded-md px-4 py-2 bg-sky-600 text-white hover:bg-sky-700 transition-colors">
                    Edit
                </a>
                <form action="/kelas/{{$k->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="rounded-md px-4 py-2 bg-red-600 text-white hover:bg-red-700 transition-colors">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<a href="/kelas/create" class="inline-block rounded-md px-6 py-3 bg-green-600 text-white hover:bg-green-700 transition-colors m-5">
    Create
</a>
@endsection