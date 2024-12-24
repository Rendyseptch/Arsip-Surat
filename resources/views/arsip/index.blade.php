<x-navbar>
    <x-layout>
        <x-slot:title>{{ $title }}</x-slot:title>
    </x-layout>
    @if (Auth::check() && Auth::user()->role === 1)
        <a class="bg-blue-600 text-white px-2 py-2 mt-8 rounded-lg m-lg-2" href="{{ route('create-arsip') }}">Tambah</a>
    @endif
    <div class="mt-5">
        @if (session('success'))
            @include('alerts.success')
        @endif
    </div>
    <table class="min-w-full divide-y divide-gray-200 mt-8  ">
        <thead>
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nomor Surat
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Surat
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Alamat</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($arsips as $arsip)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $arsip->nama }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $arsip->nomor }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $arsip->tanggal }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $arsip->alamat }}</td>
                    {{-- <td class="px-6 py-4 whitespace-nowrap">
                        <span
                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Active</span>
                    </td> --}}
                    <td class=" flex flex-col-3 gap-3 px-6 py-4 whitespace-nowrap">
                        {{-- <a class=" bg-blue-500 p-2" href="/arsip/{{ $arsip->id }}">view</a> --}}
                        <a href="/arsip/{{ $arsip->id }}"
                            class="px-4 py-2 mx-auto my-auto font-medium text-white bg-blue-600 rounded-md hover:bg-blue-500 focus:outline-none focus:shadow-outline-blue active:bg-blue-600 transition duration-150 ease-in-out"><span
                                class="material-symbols-outlined">
                                format_list_bulleted
                            </span></a>
                        <link rel="stylesheet"
                            href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=format_list_bulleted" />

                        @if (Auth::check() && Auth::user()->role === 1)
                            <a href="/edit-arsip/{{ $arsip->id }}"
                                class="px-4 py-2 mx-auto my-auto font-medium text-white bg-blue-600 rounded-md hover:bg-blue-500 focus:outline-none focus:shadow-outline-blue active:bg-blue-600 transition duration-150 ease-in-out"><span
                                    class="material-icons ">
                                    edit
                                </span></a>
                            <form action="{{ route('destroy.arsip') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $arsip->id }}">
                                <button type="submit"
                                    class="px-4 mt-4 py-2 mx-auto my-auto font-medium text-white bg-red-600 rounded-md hover:bg-red-500 focus:outline-none focus:shadow-outline-red active:bg-red-600 transition duration-150 ease-in-out">
                                    <span class="material-icons">
                                        delete
                                    </span></button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</x-navbar>
