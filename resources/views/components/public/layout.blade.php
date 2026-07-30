<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPID</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    <x-public.navbar />

    <main class="flex-1">
        {{ $slot }}
    </main>

    <x-public.footer
        email="smkn1katapang@gmail.com"
        no_telp="0891298129"
        :logo="asset('img/logo_katapang.png')"
    />
</body>
</html>
