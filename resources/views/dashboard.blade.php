<div class="min-h-full">
    <x-navbar>
        
        <div class="  flex flex-col lg:flex-col gap-4 mb-6">

           <x-layout>
            <x-slot:title>  {{$title}}</x-slot:title> 
           </x-layout>
            
            <div class=" lg:px-10 lg:py-10 md:px-4 md:py-4 py-2 px-2 flex-1 bg-white border rounded-xl shadow-lg ">
                <h2 class=" text-2xl font-medium md:text-xl text-blue-900">
                    Selamat Datang  <strong>{{$name}}</strong> !!
                </h2>
                <p class="lg:text-base md:text-sm text-sm mt-3 max-w-[900px] ">
                    Website Arsip Surat Dinas merupakan situs Arsip Komisi Pemilihan Umum Pemerintah Kota Batu, berfungsi sebagai platform untuk meningkatkan layanan kearsipan kepegawaian dan instansi terkait
                </p>
                <img src="" alt="">
                <span class="inline-block mt-8 px-8 py-1 my-3 rounded-full text-xl font-bold text-white bg-indigo-800">
                    01:51
                </span>
            </div>

    </x-navbar>
</div>
