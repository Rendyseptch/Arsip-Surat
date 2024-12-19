<x-navbar>
    <x-layout>
        <x-slot:title>{{ $title  ?? 'Default'}} </x-slot:title>
    </x-layout>
    <form action="{{ route('store-arsip') }}" method="POST">
        @csrf
        <input type="text" name="nama">
        <input type="text" name="nomor">
        <button type="submit" class="bg-blue-600 p-2 rounded-md text-white">submit</button>
    </form>
   

</x-navbar>