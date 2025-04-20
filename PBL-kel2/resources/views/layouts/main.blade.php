<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <style>
        main>.container {
            padding: 60px 15px 0;
        }
    </style>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body class="d-flex flex-column h-100">
    @include('layouts.header')


    {{-- begint page content --}}

    <main class="flex-shrink-0">
        <div class="container">


            @yield('content')

        </div>
        
       
    </main>
    @include('layouts.footer')

   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
