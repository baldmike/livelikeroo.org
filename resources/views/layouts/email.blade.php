<html lang="{{ app()->getLocale() }}"> 
    <head>
        <meta charset="utf-8"> 
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <meta name="csrf-token" content="{{ csrf_token()}}"> 
        <script>window.laravel = { csrfToken: '{{ csrf_token() }}' }</script> 
        
        <title>LLR Email</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,400,600,700" rel="stylesheet" type="text/css">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <style>
        /* -------------------------------------
            GLOBAL
        ------------------------------------- */
        * {
            margin:0;
            padding:0;
            font-size: .7rem;
        }
        * { font-family: "Raleway", sans-serif; }

        img {
            max-width: 100%;
        }
        .collapse {
            margin:0;
            padding:0;
        }
        body {
            -webkit-font-smoothing:antialiased;
            -webkit-text-size-adjust:none;
            width: 100%!important;
            height: 100%;
        }

        .banner {
            border: 20px solid #fd7e14;
            text-align: center;
            padding: 20px;
            background-color: #fd7e14;
        }

        .email-body {
            border: 1px solid black;
            font-size: 1.2rem;
            background-color: white;
        }

        .logo-box {
            background-color: white;
            width: 100%;
        }

        /* .receipt {
            padding: 10px;
            text-align: center;
            border: 5px solid ##fd7e14;
            margin: 10px;
        } */


        </style>

    </head>

    <body>
        
        <div class="container">
            <div class="banner">

                <div class="email-body">
                
                    <a href="http://www.livelikeroo.org"><img src="{{ $message->embed(public_path() . '/images/llr_logo.png') }}" /></a>

                    <br>
                    
                    @yield('headline')

                    <br>

                    @yield('content')

                    <br>

                    @section('monthly')
                    @show
                
                    <br>

                    @section('receipt')
                    @show
                    
                </div>
            </div>

        </div>

        @section('footer')
        @show
                
    </body>

</html>
