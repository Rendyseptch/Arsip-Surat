<x-navbar>
    <x-layout>
        <x-slot:title>{{ $title ?? 'Default' }} </x-slot:title>
    </x-layout>
    {{-- <form action="{{ route('update-arsip') }}" method="POST">
        @csrf
        <input type="hidden" name="id" id="" value="{{ $arsip->id }}">
        <input type="text" placeholder="input nama" name="nama" value="{{ $arsip->nama }}" required>
        <input type="text" placeholder="input nomor"  name="nomor" value="{{ $arsip->nomor }}" required>
        <input type="date" placeholder="input Tanggal Surat" name="tanggal" value="{{ $arsip->tanggal }}" required>
        <input type="text" placeholder="input Kategori"  name="kategori" value="{{ $arsip->kategori }}" required>
        <button type="submit" class="bg-blue-600 p-2 rounded-md text-white">submit</button>
    </form> --}}

    <form action="{{ route('update-arsip') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $arsip->id }}">
        <div class=" relative flex flex-col space-y-4 m-6">
            <div class="mb-6">
                <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                <input type="text" id="nama" name="nama"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{ $arsip->nama }}" required />
            </div>
            <div class="mb-6">
                <label for="nomor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor
                </label>
                <input type="text" id="nomor" name="nomor"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{ $arsip->nomor }}" required />
            </div>
            <div class="mb-6">
                <label for="tanggal" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                </label>
                <input type="date" id="tanggal" name="tanggal"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{ $arsip->tanggal }}" required />
            </div>
            <div class="mb-6">
                <label for="waktu" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Waktu
                </label>
                <input type="time" id="waktu" name="waktu"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{ $arsip->waktu }}" required />
            </div>
            <div class="mb-6">
                <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat
                </label>
                <input type="text" id="alamat" name="alamat"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{ $arsip->alamat }}" required />
            </div>
            <div class="mb-6">
                <label for="dokumen" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">dokumen
                </label>
                <input type="hidden" name="oldDokumen" value="{{ $arsip->dokumen }}">
                <input type="file" id="dokumen" name="dokumen"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
            </div>
            <div class="mb-6">
                <label for="keterangan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">keterangan
                </label>
                <input type="text" id="keterangan" name="keterangan"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{ $arsip->keterangan }}" />
            </div>
            <button type="submit" class="bg-blue-600 p-2 rounded-md text-white">submit</button>
    </form>


</x-navbar>
