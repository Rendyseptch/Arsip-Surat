{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <x-navbar>
        <x-layout>

            <x-slot:title> {{ $title }}</x-slot:title>
        </x-layout>

        <h1>ini halaman helo bosq</h1>
        {{-- pemaniggilan data bertype non array  --}}
{{-- <h1>Profile Nama : {{ $profils }}</h1>
        <h1>No HP : {{ $nohp }}</h1>
        <ul> --}}
{{-- pemanggilan data bertype array --}}
{{-- @foreach ($hobies as $hobi)
                <li>{{ $hobi }}</li>
            @endforeach
        </ul>
    </x-navbar>
   
</body>
</html> --}}


<x-navbar>
    <x-layout>
        <x-slot:title>{{ $title }}</x-slot:title>
    </x-layout>
    <a href="{{ route('create-arsip') }}">Tambah</a>
    <x-input>  </x-input>

</x-navbar>
