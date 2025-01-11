<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <nav class="bg-amber-950">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">

                <!-- Conditional Navigation: Based on Role -->
                @if (session('role_id') == 2)
                    <!-- ADMIN Navigation -->
                    <div class="flex items-center space-x-4">
                        <a href="/home">
                            <img class="h-10 w-auto"
                                src="https://1.bp.blogspot.com/-emQ1ckCOpio/YLZG9eE_XII/AAAAAAAAFNI/hPk8UF707xo7PgDTeKXc7dkA5g6hhGBtACLcBGAsYHQ/w1200-h630-p-k-no-nu/Logo%2BUniversitas%2BCiputra.png"
                                alt="Your Company">
                        </a>
                        <!-- Admin-Specific Menu -->
                        <div class="hidden sm:flex space-x-4">
                            <a href="/courses"
                                class="{{ request()->is('courses') ? 'text-white' : 'text-gray-400 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium">Courses</a>
                            <a href="/users"
                                class="{{ request()->is('users') ? 'text-white' : 'text-gray-400 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium">Students</a>
                            <a href="/approved"
                                class="{{ request()->is('approved') ? 'text-white' : 'text-gray-400 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium">Approved</a>
                            <a href="/admins"
                                class="{{ request()->is('admins') ? 'text-white' : 'text-gray-400 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium">Admin</a>
                        </div>
                    </div>
                @else
                    <!-- BASIC Navigation for Mahasiswa -->
                    <div class="flex items-center space-x-4">
                        <!-- Logo -->
                        <a href="/home">
                            <img class="h-10 w-auto"
                                src="https://1.bp.blogspot.com/-emQ1ckCOpio/YLZG9eE_XII/AAAAAAAAFNI/hPk8UF707xo7PgDTeKXc7dkA5g6hhGBtACLcBGAsYHQ/w1200-h630-p-k-no-nu/Logo%2BUniversitas%2BCiputra.png"
                                alt="Your Company">
                        </a>
                        <!-- Mahasiswa Menu -->
                        @if (session('role_id') == 1)
                            <div class="hidden sm:flex space-x-4">
                                <!-- Accepted Courses Menu -->
                                <a href="/user/accepted-courses"
                                    class="{{ request()->is('user/accepted-courses') ? 'text-white' : 'text-gray-400 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium">
                                    Accepted Courses
                                </a>
                            </div>
                        @endif
                    </div>

                @endif

                <!-- User Greeting and Profile Section -->
                <div class="ml-auto relative flex items-center space-x-4">
                    @if (session('user_name'))
                        <span class="text-white text-lg font-semibold mr-4">Hello, {{ session('user_name') }}!</span>
                    @endif

                    <!-- Profile Button -->
                    <div>
                        <button type="button"
                            class="flex items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                            id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                            <span class="sr-only">Open user menu</span>
                            @if (session('image'))
                                <img class="h-10 w-10 rounded-full" src="{{ asset('storage/' . session('image')) }}"
                                    alt="Profile Picture">
                            @else
                                <img class="h-10 w-10 rounded-full"
                                    src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                    alt="Default Profile Picture">
                            @endif
                        </button>

                        <!-- Dropdown Menu -->
                        <div id="dropdown-menu"
                            class="hidden absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black/5 focus:outline-none"
                            role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button">
                            {{-- <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem">Your Profile</a> --}}
                            <a href="/logout" class="block px-4 py-2 text-sm text-gray-700" role="menuitem">Sign out</a>
                        </div>
                    </div>
                </div>

            </div>
    </nav>

    <!-- Dropdown Toggle Script -->
    <script>
        // Menampilkan/menghilangkan dropdown menu
        const userMenuButton = document.getElementById('user-menu-button');
        const dropdownMenu = document.getElementById('dropdown-menu');

        userMenuButton.addEventListener('click', () => {
            dropdownMenu.classList.toggle('hidden');
        });

        // Menutup dropdown saat klik di luar
        document.addEventListener('click', (event) => {
            if (!userMenuButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.add('hidden');
            }
        });
    </script>
</body>

</html>
