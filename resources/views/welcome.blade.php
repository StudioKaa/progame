<?php
    //BIJ AANPASSEN SECPERSEC: actual_end wordt automatisch juist geupdate!! Het klopt dat virtual_hours gelijk blijft. De virtuele tijd is even lang, maar de werkelijke tijd tikt sneller richting het virtuele eind.
?>

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
            <timer :actual_end="{{ $actual_end }}" :secpersec="{{ $secpersec }}" :daysperweek="{{ $daysperweek }}" :hoursperday="{{ $hoursperday }}"></timer>
        <card></card>
        </div>
        <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
