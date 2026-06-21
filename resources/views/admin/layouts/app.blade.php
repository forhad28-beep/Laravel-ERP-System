<!DOCTYPE html>
<html>
<head>
    <title>Mini ERP</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

<div class="flex">

    @include('admin.partials.sidebar')

    <div class="flex-1">

        @include('admin.partials.navbar')

        <div class="p-6">
            @yield('content')
        </div>

    </div>

</div>

</body>
</html>