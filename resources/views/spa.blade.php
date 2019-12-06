<html lang="{{ app()->getLocale() }}"> 
    <head>
        <meta charset="utf-8"> 
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <meta name="csrf-token" content="{{ csrf_token()}}"> 
        <script>window.laravel = { csrfToken: '{{ csrf_token() }}' }</script> 
        
        <title>Live Like Roo</title>

        <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css">

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
      
        <link href="https://fonts.googleapis.com/css?family=Lilita+One" rel="stylesheet">
         
    </head>
    
    <body>
        <div class="container-fluid" id="app">
            <router-view></router-view>
        </div>

        <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2"></script>
        <script src="https://js.stripe.com/v3/"></script>
        
        <script src="{{ asset('js/app.js') }}"></script>        
        <!-- <script src="https://givegab.s3.amazonaws.com/donation-widget/givegab-button.js"></script> -->
    </body>
<!-- 
    <div style="margin-left: 33%">
        <button class="givegab-button" data-campaign-id="59614" data-host="https://www.givegab.com" data-org-id="475792" data-preview="" style="background-color: #FF8B22;">****  CLICK HERE TO DONATE FOR GIVING TUESDAY! ****</button>
    </div> -->
    <BR></BR>
</html>
