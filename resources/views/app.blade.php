<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" value="{{ csrf_token() }}" />
        <title>Laravel / Vue - Dashboard</title>
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    </head>
    <body>
        <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
            <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Laravel / Vue</a>
        </nav>
        <div class="container-fluid">
            <div class="row">
                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
                    <div id="app"></div>
                </main>
            </div>
        </div>
        <script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/jquery-3.2.1.slim.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/feather.min.js') }}"></script>
        <script>
            feather.replace()
        </script>
    </body>
</html>