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
    @if (session('success'))
        @include('alerts.success')
    @endif
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

    <table class="min-w-full divide-y divide-gray-200 mt-8  ">
        <thead>
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No_Hp
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">jabatan</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">pangkat</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($pegawais as $pegawai)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $pegawai->pegawai->nama }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $pegawai->pegawai->no_hp }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $pegawai->pegawai->jabatan->nama }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $pegawai->pegawai->pangkat->nama }}</td>
                    {{-- <td class="px-6 py-4 whitespace-nowrap">
                        <span
                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Active</span>
                    </td> --}}
                    <td class=" flex flex-col-3 gap-3 px-6 py-4 whitespace-nowrap">
                        @if ($pegawai->surats->contains($arsip->id))
                            <form action="{{ route('toggle') }}" method="POST">
                                @csrf
                                <input type="hidden" name="user" value="{{ $pegawai->id }}">
                                <input type="hidden" name="surat" value="{{ $arsip->id }}">
                                <button type="submit"
                                    class="px-4 mt-4 py-2 mx-auto my-auto font-medium text-white bg-red-600 rounded-md hover:bg-red-500 focus:outline-none focus:shadow-outline-red active:bg-red-600 transition duration-150 ease-in-out">
                                    <span class="material-icons">
                                        delete
                                    </span></button>
                            </form>
                        @else
                            <form action="{{ route('toggle') }}" method="POST">
                                @csrf
                                <input type="hidden" name="user" value="{{ $pegawai->id }}">
                                <input type="hidden" name="surat" value="{{ $arsip->id }}">
                                <button type="submit"
                                    class="px-4 mt-4 py-2 mx-auto my-auto font-medium text-white bg-green-600 rounded-md hover:bg-green-500 focus:outline-none focus:shadow-outline-red active:bg-red-600 transition duration-150 ease-in-out">
                                    <span class="material-icons">
                                        add
                                    </span></button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</x-navbar>
