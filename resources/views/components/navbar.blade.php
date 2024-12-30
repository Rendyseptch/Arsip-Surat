<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project KPU</title>
    <link
        href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    @yield('link')
    <style>
        :root {
            --header-height: 4rem;
            --sidebar-width: 240px;
        }

        @keyframes slideDown {
            from {
                transform: translateY(-100%);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes slideUp {
            from {
                transform: translateY(20px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        // .animate-slide-down {
        //    animation: slideDown 0.5s ease-out;
        //  }

        .animate-fade-in {
            animation: fadeIn 0.5s ease-out;
        }

        .animate-slide-up {
            animation: slideUp 0.5s ease-out forwards;
        }
    </style>
</head>

<body class="bg-indigo-50 min-h-screen overflow-x-hidden">

    <header class="fixed w-full bg-white text-indigo-800 z-50 shadow-lg animate-slide-down">
        <div class="max-w-7xl mx-auto px-4 py-2 flex items-center justify-between h-16">
            <button class="mobile-menu-button p-2 lg:hidden">
                <span class="material-icons-outlined text-2xl">menu</span>
            </button>
            <div class="text-xl font-bold text-blue-900">
                Arsip<span class="text-indigo-800 mx-1">Dinas Luar</span>KPU
            </div>
            <div class="flex items-center space-x-2">
                <span
                    class="material-icons-outlined p-2 text-2xl cursor-pointer hover:text-indigo-800 transition-transform duration-300 hover:scale-110 hidden md:block">search</span>
                <span
                    class="material-icons-outlined p-2 text-2xl cursor-pointer hover:text-indigo-800 transition-transform duration-300 hover:scale-110 hidden md:block">notifications</span>
                <img class="w-10 h-10 rounded-full transition-transform duration-300 hover:scale-110 object-cover"
                    src="https://i.pinimg.com/564x/de/0f/3d/de0f3d06d2c6dbf29a888cf78e4c0323.jpg" alt="Profile">
            </div>
        </div>
    </header>

    <div class="pt-16 max-w-7xl mx-auto flex">

        <aside
            class="sidebar fixed lg:static w-[240px] bg-indigo-50 h-[calc(100vh-4rem)] lg:h-auto transform -translate-x-full lg:translate-x-0 transition-transform duration-300 z-45 overflow-y-auto p-4">
            <div
                class="bg-white rounded-xl shadow-lg mb-6 p-4 transition-all duration-300 hover:-translate-y-1 hover:shadow-xl">

                <x-nav-link href="/dashboard" :active="request()->is('dashboard')"><span class="material-icons mr-2">dashboard </span>
                    Dashboard</x-nav-link>
                {{-- akses untuk admin saja  --}}
                @if (Auth::check() && Auth::user()->role === 1)
                    <x-nav-link href="/jabatan" :active="request()->is('jabatan')"><span class="material-icons mr-2">category</span>
                        Jabatan & Pangkat</x-nav-link>
                    <x-nav-link href="/user-managements" :active="request()->is('user-managements')"><span
                            class="material-icons mr-2">category</span>
                        Users Management</x-nav-link>
                @endif
                {{-- end akses untuk admin saja  --}}
                <x-nav-link href="/arsip" :active="request()->is('arsip')"><span class="material-icons mr-2">receipt</span>
                    Arsip Surat</x-nav-link>


                <div
                    class="bg-white rounded-xl shadow-lg p-4 transition-all duration-300 hover:-translate-y-1 hover:shadow-xl">

                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit"
                            class="flex items-center text-gray-600 hover:text-indigo-800 py-4 transition-all duration-300 hover:translate-x-1">
                            <span class="material-icons-outlined mr-2">power_settings_new</span>
                            Log out

                        </button>
                    </form>
                </div>
        </aside>

        <main class="flex-1 p-4">
            <div class="top-10">
                {{ $slot }}
            </div>
        </main>
    </div>


    @yield('script')
    <script>
        // Mobile menu functionality
        const mobileMenuButton = document.querySelector('.mobile-menu-button');
        const sidebar = document.querySelector('.sidebar');
        const overlay = document.querySelector('.overlay');

        function toggleMobileMenu() {
            sidebar.classList.toggle('translate-x-0');
            overlay.classList.toggle('hidden');
            setTimeout(() => overlay.classList.toggle('opacity-0'), 0);
            document.body.style.overflow = sidebar.classList.contains('translate-x-0') ? 'hidden' : '';
        }

        mobileMenuButton.addEventListener('click', toggleMobileMenu);
        overlay.addEventListener('click', toggleMobileMenu);

        // Close mobile menu on window resize if open
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 1024 && sidebar.classList.contains('translate-x-0')) {
                toggleMobileMenu();
            }
        });

        // Notification animation
        const notificationIcon = document.querySelector('.material-icons-outlined:nth-child(2)');
        setInterval(() => {
            notificationIcon.classList.add('scale-110');
            setTimeout(() => notificationIcon.classList.remove('scale-110'), 200);
        }, 5000);
    </script>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>

</html>
