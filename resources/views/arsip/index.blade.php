<x-navbar>
    <x-layout>
        <x-slot:title>{{ $title }}</x-slot:title>
    </x-layout>
    <a href="{{ route('create-arsip') }}">Tambah</a>
    <x-input>  </x-input>

</x-navbar>