<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet" />

</head>

<body class="font-poppins">
    <div class="antialiased bg-gray-50 dark:bg-gray-900">
        @include('layout.navbar')

        <!-- Sidebar -->
        @include('layout.sidebar')

        <main class="p-4 md:ml-64 h-auto pt-20">
            @yield('content')
        </main>
    </div>
    @include('sweetalert::alert')
    @stack('scripts')
</body>

</html>
