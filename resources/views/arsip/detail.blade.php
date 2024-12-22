<x-navbar>
    <x-layout>
        <x-slot:title>{{ $title }}</x-slot:title>
    </x-layout>
    <a href="{{ route('list-arsip') }}">Back</a>
    <p>{{ $arsip->nama }}</p>
    <p>{{ $arsip->nomor }}</p>
    <p>{{ $arsip->tanggal }}</p>
    <p>{{ $arsip->kategori }}</p>
 
</x-navbar>