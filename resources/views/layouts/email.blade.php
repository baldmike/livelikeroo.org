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
            font-size: .9rem;
            text-align: center;
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
            border: 10px solid #fd7e14;
            padding: 20px;
            background-color: #fd7e14;
        }

        .headline {
            padding: 20px;
            margin: 10px;
        }

        .email-body {
            border: 1px solid black;
            padding: 10px;
            font-size: 1.2rem;
            background-color: white;
        }

        .logo-box {
            background-color: white;
            width: 100%;
        }

        .email-content {
            padding: 20px;
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

                    <div class="row">
                        <div style="text-align: center;">
                            <a href="http://www.livelikeroo.org"><img src="{{ $message->embed(public_path() . '/images/llr_logo.png') }}" /></a>
                        </div>
                        <div style="text-align: center;">
                            <h4>"To know that even one life has breathed easier because you lived here. This is to have succeeded."</h4>
                            <h5>Ralph Waldo Emerson</h5>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="headline">
                            @yield('headline')
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="email-content">
                            @section('content')
                            @show
                        </div>
                    </div>
                    
                    <br>

                    <hr>

                    @section('receipt')
                    @show
                    
                    <br>

                    <hr>
    
                    <p>
                        The Live Like Roo Foundation is an all-volunteer-run,  donation-based, 501C3 charitable organization that provides support and financial assistance to families whose pet faces a cancer diagnosis. Through grants, care packages, special experiences and genuine human support and kindness, The Live Like Roo Foundation has been able to assist thousands of pets and their families through cancer diagnoses.</h4>
                    </p>
                </div>
            </div>

        </div>

        <h6>&copy;2019 The Live Like Roo Foundation</h6>
                
    </body>

</html>
