<x-navbar>
    @section('link')
        <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    @endsection
    <x-layout>
        <x-slot:title>{{ $title }}</x-slot:title>
    </x-layout>
    <div class="mt-5">
        @if (session('success'))
            @include('alerts.success')
        @endif
    </div>

    {{-- start jabatan --}}
    <h1 class="font-bold text-xl my-2">Jabatan</h1>
    <button data-modal-target="create-jabatan" data-modal-toggle="create-jabatan"
        class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
        type="button">
        Tambah
    </button>
    @include('jabatan.modal-create-jabatan')

    <table class="min-w-full divide-y divide-gray-200 mt-8  ">
        <thead>
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama
                </th>
                <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-center">
                    Action
                </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($jabatans as $jabatan)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $jabatan->nama }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $jabatan->alamat }}</td>
                    {{-- <td class="px-6 py-4 whitespace-nowrap">
                        <span
                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Active</span>
                    </td> --}}
                    <td class=" flex flex-col-3 gap-1 px-6 py-4 whitespace-nowrap">

                        <form action="{{ route('destroy.jabatan') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $jabatan->id }}">
                            <button type="submit"
                                class="px-4 mt-4 py-2 mx-auto my-auto font-medium text-white bg-red-600 rounded-md hover:bg-red-500 focus:outline-none focus:shadow-outline-red active:bg-red-600 transition duration-150 ease-in-out">
                                <span class="material-icons">
                                    delete
                                </span></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- End Jabatan  --}}


    {{-- start pangkat --}}
    <h1 class="font-bold text-xl my-2">pangkat</h1>
    <button data-modal-target="create-pangkat" data-modal-toggle="create-pangkat"
        class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center "
        type="button">
        Tambah
    </button>
    @include('jabatan.modal-create-pangkat')
    <table class="min-w-full divide-y divide-gray-200 mt-8  ">
        <thead>
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama
                </th>
                <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-center">
                    Action
                </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($pangkats as $pangkat)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $pangkat->nama }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $pangkat->alamat }}</td>
                    {{-- <td class="px-6 py-4 whitespace-nowrap">
                        <span
                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Active</span>
                    </td> --}}
                    <td class=" flex flex-col-3 gap-1 px-6 py-4 whitespace-nowrap">

                        <form action="{{ route('destroy.pangkat') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $pangkat->id }}">
                            <button type="submit"
                                class="px-4 mt-4 py-2 mx-auto my-auto font-medium text-white bg-red-600 rounded-md hover:bg-red-500 focus:outline-none focus:shadow-outline-red active:bg-red-600 transition duration-150 ease-in-out">
                                <span class="material-icons">
                                    delete
                                </span></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- End pangkat  --}}

    @section('script')
        <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    @endsection
</x-navbar>
