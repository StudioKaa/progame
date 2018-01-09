<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>ProGAME</title>

        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    </head>
    <body>
        <div id="app">
            <timer timestamp="{{ time() + 3310 }}"></timer>
            <div class="button">
                <button>Kaart</button>
            </div>
        </div>
        <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
    </body>
    
    
    
</html>
