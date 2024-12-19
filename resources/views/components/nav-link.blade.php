{{-- <a {{ $attributes }}
    class="{{
    //  request()->is('/') 
     $active ? ' flex items-center py-2 pl-3  bg-blue-800 text-white rounded-lg' : 'flex items-center text-gray-600 hover:text-indigo-800 py-4 transition-all duration-300 hover:translate-x-1' }} "
    aria-current={{  request()->is('/') ? 'page': false }}>
    <span hreclass="material-icons-outlined mr-2 transition-all duration-300"></span>
    {{ $slot }}
</a> --}}

@props(['href', 'active' => false])

@php
// Menentukan kelas CSS berdasarkan status aktif
$classes = $active
    ? 'flex items-center py-2 pl-3 bg-blue-800 text-white rounded-lg'
    : 'flex items-center text-gray-600 hover:text-indigo-800 py-4 transition-all duration-300 hover:translate-x-1';
@endphp

<a href="{{ $href }}"
    {{ $attributes->merge(['class' => $classes]) }}
    aria-current="{{ $active ? 'page' : '' }}">
    <span class="material-icons-outlined mr-2 transition-all duration-300"></span>
    {{ $slot }}
</a>
