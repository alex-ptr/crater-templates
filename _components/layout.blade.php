<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>{{$title}}</title>

    <style type="text/css">
        html,body{
            min-height: 29.7cm;
            max-width: 21cm;
            padding: 0;
            margin: 0;
            font-size: 10pt;
        }
        .section{
            margin: 0.5cm 0.5cm 0;
            padding:0;
            position: relative;
        }

        /* RESET ----------------------- */
        h1, h2, h3, h4, h5, h6, p, table, tr, td {
            margin: 0;
            padding: 0;
            line-height: unset;
        }
        table{
            border-spacing: 0;
        }
        /* TEMP ----------------------- */
        th,td{
            border:1px solid black;
        }
        .section{
            background-color: rgba(12,160,80,0.1);
        }
    </style>
</head>
    <body>
        @include('app.pdf._utils.format');
        {{$slot}}
    </body>
</html>