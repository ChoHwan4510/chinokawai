<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <title>@yield('title')</title>    
    <link rel="stylesheet" href="{{mix('/css/reset.css')}}">    
    <link rel="stylesheet" href="{{mix('/css/baseCss.css')}}">    
</html>

@stack('css')

<body>        
    <style>
        .container{
            width: 100%;
            max-width: 1140px; 
            margin: 0 auto;
        }
        .header-container{
            width: 100%;
            display:flex;
            top: 0;
            padding: 10px 0;
            font-weight: bold;
            position: fixed;
            top:0;
            left:0;      
        }
        .header{
            width: 100%;            
            max-width:  1140px;
            margin:0 auto;
            display:flex;
            justify-content:space-between;
            padding: 0 50px;
        }
        .header-items{
            font-size: 1.3rem;
        }                      
        .footer-container{
            width: 100%;
            padding: 50px 0;
            background-color: #2d3436;
        }
        .footer{
            width: 50%;
            margin:0 auto;
            text-align: center;
            font-size: 1rem;
        }          
    </style>

    @include('common.navbar')

    <div>
        @yield('content')
    </div>
    
    @include('common.footer')
</body>

@stack('scripts')

