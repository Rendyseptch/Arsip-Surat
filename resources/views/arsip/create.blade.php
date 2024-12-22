<x-navbar>
    <x-layout class="mb-6">
        <x-slot:title>{{ $title  ?? 'Default'}} </x-slot:title>
    </x-layout>
    <form  action="{{ route('store-arsip') }}" method="POST"  enctype="multipart/form-data">
        @csrf
        <div class=" relative flex flex-col space-y-4 m-6">
        <input type="file" name="foto">
        <input type="text" placeholder="input nama" name="nama" required> 
        <input type="text" placeholder="input nomor"  name="nomor" required>
        <input type="date" placeholder="input Tanggal Surat" name="tanggal" required> 
        <input type="text" placeholder="input Kategori"  name="kategori" required>
        <button type="submit" class="bg-blue-600 p-2 rounded-md text-white">submit</button>
    </form>
</div>
   

</x-navbar>