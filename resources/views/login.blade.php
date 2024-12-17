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
            <div class="bg-white p-6 rounded-lg shadow-lg w-96">
                <h2 class="text-2xl font-bold mb-6 text-center">Login</h2>
                <!-- Success/Error Alerts -->
                @if(session('message'))
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                        <p>{{ session('message') }}</p>
                    </div>
                @elseif(session('error'))
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
                        <p>{{ session('error') }}</p>
                    </div>
                @endif

                <!-- Login Form -->
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-4">
                        <label for="user_email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="user_email" id="user_email" class="w-full p-2 border border-gray-300 rounded-md" required>
                    </div>

                    <div class="mb-4">
                        <label for="user_nim" class="block text-sm font-medium text-gray-700">NIM</label>
                        <input type="text" name="user_nim" id="user_nim" class="w-full p-2 border border-gray-300 rounded-md" required>
                    </div>

                    <div class="flex justify-center">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg w-full">Login</button>
                    </div>

                    <div class="flex justify-center">
                        <a href="{{ route('register') }}">Don't have an account? Register here.</a>
                    </div>
                </form>
            </div>
        </div>
</body>
</html>
