<!DOCTYPE HTML>
<html>
    <head>
        <title>Error || Sorry This page not found</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link href='//fonts.googleapis.com/css?family=Courgette' rel='stylesheet' type='text/css'>
        <style type="text/css">
            body{
                font-family: 'Courgette', cursive;
            }
            body{
                background:#ecf0f5;
            }	
            .wrap{
                margin:0 auto;
                width:100%;
            }
            .logo{
                margin-top:50px;
            }	
            .logo h1{
                font-size:200px;
                color:#8F8E8C;
                text-align:center;
                margin-bottom:1px;
                text-shadow:1px 1px 6px #fff;
            }	
            .logo p{
                color:rgb(228, 146, 162);
                font-size:20px;
                margin-top:1px;
                text-align:center;
            }	
            .logo p span{
                color:lightgreen;
            }	
            .sub a{
                color:white;
                background:#8F8E8C;
                text-decoration:none;
                padding:7px 50px;
                font-size:13px;
                font-family: arial, serif;
                font-weight:bold;
                -webkit-border-radius:3em;
                -moz-border-radius:.1em;
                -border-radius:.1em;
            }	
            .footer{
                color:#8F8E8C;
                position:absolute;
                right:10px;
                bottom:10px;
            }	
            .footer a{
                color:rgb(228, 146, 162);
            }	
        </style>
    </head>


    <body>
        <div class="wrap">
            <div class="logo">
                <h1>404</h1>
                <p>Error occurred! - Page not Found</p>
                <div class="sub">
                    <p>
                        <a href="#" onclick="goBack()">Back</a>
                        <a href="http://192.168.10.70/newsportal/admin/" >Home</a>
                    </p>
                </div>
            </div>
        </div>
    </body>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</html>