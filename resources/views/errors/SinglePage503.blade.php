<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/bootstrap.min.css">

    <title>{{config('app.name')}}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        @font-face {
            font-family:'bmitra';
            src: url( {{asset('fonts/bmitrabold.ttf')}} );
        }

        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 95vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .title {
            font-size: 60px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
        .number{letter-spacing:-10px;line-height:128px;font-size:128px;font-weight:300}
        .font-red{display:inline-block;color:#ec8c8c;text-align:left}
    </style>
</head>
<body style="font-family:'bmitra'">
    <div class="container text-center flex-center full-height">

        <div class="col-6">
            <img class="col-12" src="/img/maintenance boy.gif">
        </div>

        <div dir="rtl" class="col-6 title m-b-md">
            این صفحه در حال بروزرسانی یا تعمیر میباشد.
            <br>
            <div class="number font-red"> 503 </div>
        </div>


    </div>
</body>
</html>
