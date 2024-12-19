<x-navbar>
    <x-layout>
        <x-slot:title>{{ $title  ?? 'Default'}} </x-slot:title>
    </x-layout>

    <p>ini data surat</p>
    <p>{{ $nama }}</p>
    <p>{{ $nomor }}</p>
</x-navbar>