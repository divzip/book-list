<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Book List App</title>
        <link href="{{ asset('css/main.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        <script src="https://cdn.jsdelivr.net/gh/Eonasdan/tempus-dominus@master/dist/js/tempus-dominus.js"></script>
        <script src="https://getdatepicker.com/6/js/plugins/customDateFormat.js"></script>
        <link href="https://cdn.jsdelivr.net/gh/Eonasdan/tempus-dominus@master/dist/css/tempus-dominus.css" rel="stylesheet"/>
    </head>
    <body>
        <div id="wrapper" class="container">
            <!-- Navigation -->
            @include('theme.header')
            <!-- Content -->
            <div id="page-wrapper">
                @yield('content')
            </div>
        </div>
        <script src="{{ asset('js/main.js') }}"></script>
    </body>
</html>