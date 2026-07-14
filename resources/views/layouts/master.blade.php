<!-- resources/views/layouts/master.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&display=swap" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-pO6x0Q5Z0sXbdU8NdP8VcoE4cIVjFZpCjA7HeUQqjq95MZ0zZL+6k3q2v3K5xFj4/vK7t0ZYzZ5bK3KqXUnKvg==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <style type="text/tailwindcss">
        :root { --primary-color: #1193d4; }
        body { font-family: 'Inter', sans-serif; }
        @layer utilities {
            .bg-rpCreamLight { background-color: #fef6e4; }
            .border-rpGrayMedium { border-color: #d1d5db; }
            .bg-rpOrange { background-color: #f97316; }
            .border-rpWhite { border-color: #ffffff; }
        }
    </style>

    <title>@yield('title', 'Jahidul Islam')</title>
    <link rel="icon" href="{{ asset('upload/favicon.jpeg') }}" type="image/x-icon" />
</head>
<body class="bg-gray-50 text-gray-800">
    @include('layouts.header')

    <main class="flex-grow">
        @yield('content')
    </main>
    <a href="https://wa.me/8801612152443" target="_blank"
        class="fixed bottom-6 right-6 text-white rounded-full z-50 flex items-center justify-center"
        title="Chat with me on WhatsApp">
       <img src="{{ asset('backend/images/whatsapp.png') }}" 
         alt="WhatsApp" 
         class="w-20 h-20 object-contain">
    </a>
    @include('layouts.footer')
</body>
</html>
