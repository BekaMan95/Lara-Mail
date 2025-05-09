<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to {{config('app.name')}}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-blue-500/90 via-gray-700 to-gray-900 flex items-center justify-center min-h-screen text-white">
    <div class="text-center bg-opacity-60 bg-gray-800 p-8 rounded-xl shadow-lg m-8">
        <h1 class="text-4xl font-extrabold mb-4">Welcome to <span class="text-red-500">Lara-Mail</span>!</h1>
        <p class="text-lg mb-6 text-gray-300">
            Your decent and minimalist email management solution. Seamless, fast, and reliable. Let's get started!
        </p>
        <a href="/send-email" 
           class="bg-red-500 hover:bg-red-600 px-6 py-3 rounded-full text-white text-lg font-semibold shadow-md transition-transform transform hover:scale-105">
            Explore {{config('app.name')}}
        </a>
        <div class="mt-6 text-sm text-gray-400">
            <p>Powered by <a href="https://laravel.com" class="text-red-400 hover:underline">Laravel</a></p>
            <p class="mt-1">Made with ❤️ by the Lara-Mail Team</p>
        </div>
    </div>
</body>
</html>
