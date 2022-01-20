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
        .section-small{
            margin: 0.5cm auto 0;
            width: 18cm;
            position: relative;
        }
        /* RESET ----------------------- */
        h1, h2, h3, h4, h5, h6, p, table, tr, td, th {
            margin: 0;
            padding: 0;
            line-height: unset;
            text-align: left;
        }
        h1{
            text-transform: uppercase;
            font-size: 14px;
        }
        h2, h3{
            text-transform: uppercase;
            font-size: 10pt;
        }
        table{
            border-spacing: 0;
        }
        /* HELPERS ----------------------- */
        .align-right{
            margin: 0 0 0 auto;
        }
        .align-top{
            vertical-align: top;
        }
        .background {
            background-color:rgb(240, 240, 240) !important;
        }
        .background-light,
        .background-row-even tr:nth-child(even),
        .background-row-odd tr:nth-child(odd){
            background-color:rgb(245, 245, 245);
        }

        .border{
            border: 1px solid #000;
        }
        .border-bottom{
            border-bottom: 1px solid #000;
        }
        .border-left{
            border-left: 1px solid #000;
        }
        .border-right {
            border-right:1px solid #000;
        }
        .border-top {
            border-top:1px solid #000;
        }
        .font-regular{
            font-weight: regular;
        }
        .font-bold{
            font-weight: bold;
        }
        .font-small{
            font-size: 8pt;
        }
        .margin-bottom{
            margin-bottom: 0.5cm !important;
        }
        .table-cell-padding th,
        .table-cell-padding td {
            padding:.1cm;
        }
        .txt-left{
            text-align: left;
        }
        .txt-center{
            text-align: center;
        }
        .txt-right{
            text-align: right;
        }
        .txt-underline{
            text-decoration: underline;
        }
        .txt-uppercase{
            text-transform: uppercase;
        }



        /* TEMP ----------------------- */
/*         th,td{
            border:1px dotted black;
        }
        .section{
            background-color: rgba(12,160,80,0.1);
        } */
    </style>
</head>
    <body>
        {{$slot}}
    </body>
</html>