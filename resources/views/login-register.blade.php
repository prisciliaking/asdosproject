<!-- resources/views/auth/login.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="flex justify-center items-center min-h-screen">
        <div class="bg-amber-950 p-6 rounded-lg shadow-lg w-96">
            <!-- Switcher Buttons -->
            <div class="flex mb-4">
                <button id="loginTab"
                    class="flex-1 py-2 px-4 text-gray-700 font-semibold border-2 border-r-0 border-gray-300 hover:bg-gray-100 focus:outline-none active:bg-gray-200">
                    Login
                </button>
                <button id="registerTab"
                    class="flex-1 py-2 px-4 text-gray-500 font-semibold border-2 border-l-0 border-gray-300 hover:bg-gray-100 focus:outline-none active:bg-gray-200">
                    Register
                </button>
            </div>

            <!-- Login Form -->
            <div id="loginForm">
                <!-- Success/Error Alerts -->
                @if (session('message'))
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                        <p>{{ session('message') }}</p>
                    </div>
                @elseif(session('error'))
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
                        <p>{{ session('error') }}</p>
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-4">
                        <label for="user_email" class="block text-sm font-medium text-white">Email</label>
                        <input type="email" name="user_email" id="user_email"
                            class="w-full p-2 border border-gray-300 rounded-md" required>
                    </div>

                    <div class="mb-4">
                        <label for="user_nim" class="block text-sm font-medium text-white">Password</label>
                        <input type="text" name="user_password" id="user_password"
                            class="w-full p-2 border border-gray-300 rounded-md" required>
                    </div>

                    <div class="flex justify-center">
                        <button type="submit"
                            class="bg-orange-400 text-white px-4 py-2 rounded-lg w-full hover:bg-orange-500">
                            Login
                        </button>
                    </div>
                </form>
            </div>

            <!-- Register Form (Hidden by Default) -->
            <div id="registerForm" class="hidden">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="flex items-center justify-center w-full">
                        <label for="dropzone-file"
                            class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                        class="font-semibold">Click to upload</span> or drag and drop</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX.
                                    800x400px)</p>
                            </div>
                            <input id="dropzone-file" type="file" class="hidden" />
                        </label>
                    </div>

                    <div class="mb-4">
                        <label for="user_name" class="block text-sm font-medium text-white">Full Name</label>
                        <input type="text" name="user_name" id="user_name"
                            class="w-full p-2 border border-gray-300 rounded-md" required>
                    </div>

                    <div class="mb-4">
                        <label for="user_nim" class="block text-sm font-medium text-white">NIM</label>
                        <input type="text" name="user_nim" id="user_nim"
                            class="w-full p-2 border border-gray-300 rounded-md" required>
                    </div>

                    <div class="mb-4">
                        <label for="user_email" class="block text-sm font-medium text-white">Email</label>
                        <input type="email" name="user_email" id="user_email"
                            class="w-full p-2 border border-gray-300 rounded-md" required>
                    </div>

                    <div class="mb-4">
                        <label for="user_password" class="block text-sm font-medium text-white">Password</label>
                        <input type="password" name="user_password" id="user_password"
                            class="w-full p-2 border border-gray-300 rounded-md" required>
                    </div>

                    

                    <div class="flex justify-center">
                        <button type="submit"
                            class="bg-orange-400 text-white px-4 py-2 rounded-lg w-full hover:bg-orange-500">
                            Register
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const loginTab = document.getElementById('loginTab');
        const registerTab = document.getElementById('registerTab');
        const loginForm = document.getElementById('loginForm');
        const registerForm = document.getElementById('registerForm');

        // Set default active tab and form on page load
        window.addEventListener('DOMContentLoaded', () => {
            loginTab.classList.add('text-orange-700', 'border-orange-300', 'bg-orange-100');
            loginTab.classList.remove('text-orange-500', 'hover:bg-orange-200');
            loginForm.classList.remove('hidden');

            registerTab.classList.remove('bg-orange-100', 'text-orange-700');
            registerTab.classList.add('text-orange-500', 'hover:bg-orange-200');
            registerForm.classList.add('hidden');
        });

        // Event Listener for Login Tab
        loginTab.addEventListener('click', () => {
            loginForm.classList.remove('hidden');
            registerForm.classList.add('hidden');

            loginTab.classList.add('text-orange-700', 'border-orange-300', 'bg-orange-100');
            loginTab.classList.remove('text-orange-500', 'hover:bg-orange-200');

            registerTab.classList.remove('bg-orange-100', 'text-orange-700');
            registerTab.classList.add('text-orange-500', 'hover:bg-orange-200');
        });

        // Event Listener for Register Tab
        registerTab.addEventListener('click', () => {
            registerForm.classList.remove('hidden');
            loginForm.classList.add('hidden');

            registerTab.classList.add('text-orange-700', 'border-orange-300', 'bg-orange-100');
            registerTab.classList.remove('text-orange-500', 'hover:bg-orange-200');

            loginTab.classList.remove('bg-orange-100', 'text-orange-700');
            loginTab.classList.add('text-orange-500', 'hover:bg-orange-200');
        });
    </script>
</body>

</html>