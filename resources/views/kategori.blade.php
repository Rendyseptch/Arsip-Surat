{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Ini halaman Pengalaman</h1>
    <h1> sebagai {{ $nama }}</h1>
    <h1> pada posisi{{ $posisi }}</h1>
    <h1> dari tahun {{ $tahun }}</h1>
    <ul>
        @foreach ($pengalamans as $pengalaman)
        <li>
          {{ $pengalaman}}  
        </li>
        @endforeach
    </ul>
    
</body>
</html> --}}


<x-navbar>
    <x-layout>
        <x-slot:title>{{ $title }}</x-slot:title>
    </x-layout>
</x-navbar>