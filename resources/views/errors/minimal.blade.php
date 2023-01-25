<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .title-height {
                height: 50vh;
            }

	    .code-height {
		height: 42vh;
	    }

	    h1 {
		text-align: center;
		margin-bottom: 5px;
	    }

            .flex-center {
                align-items: flex-start;
                display: flex;
                justify-content: center;
            }

	    .flex-bottom {
		align-items: flex-end;
		display: flex;
		justify-content: center;
	    }

            .position-ref {
                position: relative;
            }

            .code {
                border-right: 2px solid;
                font-size: 26px;
                padding: 0 15px 0 15px;
                text-align: center;
            }

            .message {
                font-size: 18px;
                text-align: center;
            }
        </style>
    </head>
    <body>
	<div class="flex-bottom position-ref title-height">
	    <h1>Uh Oh! It looks like we hit a snag.</h1>
	</div>
        <div class="flex-center position-ref code-height">
            <div class="code">
                @yield('code')
            </div>

            <div class="message" style="padding: 10px;">
                @yield('message')
            </div>
        </div>
	<div class="flex-center">
    	    <p>Return to <a href="https://wyattjohnson.net">wyattjohnson.net</a></p>
	</div>
    </body>
</html>
