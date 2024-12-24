<x-navbar>
    <x-layout>
        <x-slot:title>{{ $title ?? 'Default' }} </x-slot:title>
    </x-layout>
    <form action="{{ route('update.pegawai') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $pegawai->id }}">
        <div class=" relative flex flex-col space-y-4 m-6">
            <div class="mb-6">
                <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                <input type="text" id="nama" name="nama" value="{{ $pegawai->nama }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Nama" required />
            </div>
            <div class="mb-6">
                <label for="nip" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIP
                </label>
                <input type="text" id="nip" name="nip" value="{{ $pegawai->nip }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="nip" required />
            </div>
            <div class="mb-6">
                <label for="no_hp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No_hp
                </label>
                <input type="text" id="no_hp" name="no_hp" value="{{ $pegawai->no_hp }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="no_hp" required />
            </div>
            <div class="mb-6">
                <label for="jabatan_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jabatan
                </label>
                <select id="jabatan_id" name="jabatan_id"
                    class="mb-2 text-dark bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-dark dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @foreach ($jabatans as $jabatan)
                        <option value="{{ $jabatan->id }}"
                            {{ old('jabatan_id', $pegawai->jabatan_id) == $jabatan->id ? 'selected' : '' }}>
                            {{ $jabatan->nama }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-6">
                <label for="pangkat_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pangkat
                </label>
                <select id="pangkat_id" name="pangkat_id"
                    class="mb-2 text-dark bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-dark dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @foreach ($pangkats as $pangkat)
                        <option value="{{ $pangkat->id }}"
                            {{ old('pangkat_id', $pegawai->pangkat_id) == $pangkat->id ? 'selected' : '' }}>
                            {{ $pangkat->nama }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="bg-blue-600 p-2 rounded-md text-white">submit</button>
    </form>


</x-navbar>
