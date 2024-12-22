{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <x-navbar>
        <x-layout>

            <x-slot:title> {{ $title }}</x-slot:title>
        </x-layout>

        <h1>ini halaman helo bosq</h1>
        {{-- pemaniggilan data bertype non array  --}}
{{-- <h1>Profile Nama : {{ $profils }}</h1>
        <h1>No HP : {{ $nohp }}</h1>
        <ul> --}}
{{-- pemanggilan data bertype array --}}
{{-- @foreach ($hobies as $hobi)
                <li>{{ $hobi }}</li>
            @endforeach
        </ul>
    </x-navbar>
   
</body>
</html> --}}


<x-navbar>
    <x-layout>
        <x-slot:title>{{ $title }}</x-slot:title>
    </x-layout>
    <a href="{{ route('create-arsip') }}">Tambah</a>
    <table class="min-w-full divide-y divide-gray-200 mt-8  ">
        <thead>
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nomor Surat
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Surat
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kategori</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($arsips as $arsip)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $loop->iteration}}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $arsip->nama }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $arsip->nomor }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $arsip->tanggal }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $arsip->kategori }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span
                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Active</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <button
                            class="px-4 py-2 font-medium text-white bg-blue-600 rounded-md hover:bg-blue-500 focus:outline-none focus:shadow-outline-blue active:bg-blue-600 transition duration-150 ease-in-out"><span
                                class="material-icons">
                                edit
                            </span></button>
                        <button
                            class="ml-2 px-4 py-2 font-medium text-white bg-red-600 rounded-md hover:bg-red-500 focus:outline-none focus:shadow-outline-red active:bg-red-600 transition duration-150 ease-in-out">
                            <span class="material-icons">
                                delete
                            </span></button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</x-navbar>
