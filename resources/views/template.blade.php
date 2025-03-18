<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" />
        <title>Page d'accueil</title>
    </head>
    <style>
        body{
            margin:0px;
            align-items:end;
            background:#f6f6f6;
        }
        
        .allst{
            display:grid;
            
            
        }
        
        .st1{
            background:#C70039 ;
            border-radius:10px;
            margin-left:2px;
            padding-bottom:20px;
            text-align:center;
            color:white;
            font-size: 2em;
            
        }
        .st1 h1{
            margin-left:2px;
        }

        .st2{
            background:#FFC300;
            border-radius:10px;
            grid-column: none;
            margin-left:25%;
            margin-right:25%;
            color:white;
            display: flex;          /* Active Flexbox */
            justify-content: center; /* Centre horizontalement */
            align-items: center;
            position: relative; 
        }
        .st2 a {
            text-decoration: none !important;
            font-size: 2em;
        }

        .login{
            margin-top:10%;
            margin-bottom:25%;
            margin-left:25%;
            margin-right:25%;
            text-align:center;
            background:#f9c6cf;
            border: solid black;
            border-radius:5px;
            height:200px;
        }   
        
        .backdown{
            border: solid black;
            background: red;
            margin-right:85%;
            margin-top:10px;
            margin-left:10px;
            text-align:center;
            border-radius:20px;
        }
        .backdown a{
            text-decoration:none;
            font-size: 40px;
            color: black;
        }
    </style>
    <body>
        @yield('title')
    
    @yield('content')
    </body>
    
</html>