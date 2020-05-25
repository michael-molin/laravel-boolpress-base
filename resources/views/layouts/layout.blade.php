<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <title> Boolpress - @yield('title')</title>
    </head>
    <header>
        @if (session('status'))
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-danger">
                            {{ session('status') }}
                        </div>
                    </div>
                  </div>
            </div>
        @endif
    </header>
    <body>
        @yield('main')
    </body>
</html>
