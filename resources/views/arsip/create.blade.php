<x-navbar>
    <x-layout class="mb-6">
        <x-slot:title>{{ $title ?? 'Default' }} </x-slot:title>
    </x-layout>

    <form action="{{ route('store-arsip') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class=" relative flex flex-col space-y-4 m-6">
            <div class="mb-6">
                <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 ">Nama</label>
                <input type="text" id="nama" name="nama"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                    placeholder="Nama" required />
            </div>
            <div class="mb-6">
                <label for="nomor" class="block mb-2 text-sm font-medium text-gray-900">Nomor
                </label>
                <input type="text" id="nomor" name="nomor"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                    placeholder="Nomor" required />
            </div>
            <div class="mb-6">
                <label for="jenis" class="block mb-2 text-sm font-medium text-gray-900 ">Jenis Dinas
                </label>
                <select id="jenis" name="jenis"
                    class="mb-2 text-dark bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    <option selected>Jenis Dinas</option>
                    <option value="dinas luar">Dinas Luar</option>
                    <option value="dinas dalam">Dinas Dalam</option>
                </select>
            </div>
            <div class="mb-6">
                <label for="tanggal" class="block mb-2 text-sm font-medium text-gray-900 ">Tanggal
                </label>
                <input type="date" id="tanggal" name="tanggal"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                    placeholder="tanggal" required />
            </div>
            <div class="mb-6">
                <label for="waktu" class="block mb-2 text-sm font-medium text-gray-900 ">Waktu
                </label>
                <input type="time" id="waktu" name="waktu"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                    placeholder="waktu" required />
            </div>
            <div class="mb-6">
                <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 ">Alamat
                </label>
                <input type="text" id="alamat" name="alamat"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 "
                    placeholder="alamat" required />
            </div>
            <div class="mb-6">
                <label for="dokumen" class="block mb-2 text-sm font-medium text-gray-900 ">dokumen
                </label>
                <input type="file" id="dokumen" name="dokumen"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="dokumen" required />
            </div>
            <div class="mb-6">
                <label for="keterangan" class="block mb-2 text-sm font-medium text-gray-900 ">keterangan
                </label>
                <input type="text" id="keterangan" name="keterangan"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                    placeholder="keterangan" />
            </div>
            <button type="submit" class="bg-blue-600 p-2 rounded-md text-gray-900">submit</button>
    </form>
    </div>


</x-navbar>
