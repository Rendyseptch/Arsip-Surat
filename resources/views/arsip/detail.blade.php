<x-navbar>
    <x-layout>
        <x-slot:title>{{ $title }}</x-slot:title>
    </x-layout>
    {{-- Detail Surat  --}}
    <div class="bg-white overflow-hidden shadow rounded-lg border">
        <div class="px-4 py-5 sm:px-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                {{ $arsip->nama }}
            </h3>
            <p class="mt-1 max-w-2xl text-sm text-gray-500">
                {{ $arsip->nomor }}
            </p>
        </div>
        <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
            <dl class="sm:divide-y sm:divide-gray-200">
                <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Tanggal
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $arsip->tanggal }}
                    </dd>
                </div>
                <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Waktu
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $arsip->waktu }}
                    </dd>
                </div>
                <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Alamat
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $arsip->alamat }}
                    </dd>
                </div>
                <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Keterangan
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $arsip->keterangan }}
                    </dd>
                </div>
            </dl>
        </div>
    </div>
    {{-- End Detail Surat  --}}

    {{-- Detail Dokumen  --}}

    {{-- End Detail Dokumen  --}}
    <!-- This is an example component -->

    <div class="text-end">

        <h1 class="my-2 mb-4">View This Dokumen</h1>
        <a target="_blank" href="{{ asset('dokumen-surat/' . $arsip->dokumen) }}"
            class="bg-green-400 p-3 my-2 text-white font-bold rounded-md">Open the pdf!</a>
    </div>
    @if (Auth::check() && Auth::user()->role === 1)
        {{-- Detail Pegawai  --}}
        <div class="bg-white shadow-md rounded-md overflow-hidden max-w-full mx-auto mt-5">
            <div class="bg-gray-100 py-2 px-4">
                <h2 class="text-xl font-semibold text-gray-800">List Pegawai</h2>
            </div>
            <ul class="divide-y divide-gray-200">
                @foreach ($arsip->users as $user)
                    <li class="flex items-center py-4 px-6">
                        <span class="text-gray-700 text-lg font-medium mr-4">1.</span>
                        <div class="flex-1">
                            <h3 class="text-lg font-medium text-gray-800">{{ $user->pegawai->nama }}</h3>
                            <p class="text-gray-600 text-base">{{ $user->pegawai->nip }}</p>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
    {{-- End Detail Pegawai  --}}
</x-navbar>
`
