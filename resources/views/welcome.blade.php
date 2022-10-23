<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>oAuth Client</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
        html {
            line-height: 1.15;
            -webkit-text-size-adjust: 100%
        }

        body {
            margin: 0
        }

        .css-rgxens {
            display: flex;
            flex-direction: column;
            margin: 0px auto 24px;
            width: 400px;
            padding: 32px 40px;
            background: rgb(255, 255, 255);
            border-radius: 3px;
            box-shadow: rgb(0 0 0 / 10%) 0px 0px 10px;
            box-sizing: border-box;
            color: rgb(94, 108, 132);
        }

        css-87267k div,
        .css-87267k span {
            -webkit-box-pack: center;
            justify-content: center;
            display: flex !important;
        }

        .css-1ae42ux:not(:last-child) {
            margin-bottom: 16px;
        }

        css-87267k {
            -webkit-box-align: baseline;
            align-items: baseline;
            border-width: 0px;
            border-radius: 3px;
            box-sizing: border-box;
            display: inline-flex;
            font-size: inherit;
            font-style: normal;
            font-family: inherit;
            max-width: 100%;
            position: relative;
            text-align: center;
            text-decoration: none;
            transition: background 0.1s ease-out 0s, box-shadow 0.15s cubic-bezier(0.47, 0.03, 0.49, 1.38) 0s;
            white-space: nowrap;
            cursor: pointer;
            padding: 0px 10px;
            vertical-align: middle;
            width: 100%;
            -webkit-box-pack: center;
            justify-content: center;
            font-weight: bold;
            color: var(--ds-text, #42526E) !important;
            height: 40px !important;
            line-height: 40px !important;
            background: rgb(255, 255, 255) !important;
            box-shadow: rgb(0 0 0 / 20%) 1px 1px 5px 0px !important;
        }

        .css-87267k div,
        .css-87267k span {
            -webkit-box-pack: center;
            justify-content: center;
            display: flex !important;
        }

        .css-1ujqpe8 {
            transition: opacity 0.3s ease 0s;
            opacity: 1;
            align-self: center;
            display: flex;
            -webkit-box-flex: 0;
            flex-grow: 0;
            flex-shrink: 0;
            line-height: 0;
            font-size: 0px;
            user-select: none;
            margin: 0px 2px;
        }

        .css-1ujqpe8 {
            transition: opacity 0.3s ease 0s;
            opacity: 1;
            align-self: center;
            display: flex;
            -webkit-box-flex: 0;
            flex-grow: 0;
            flex-shrink: 0;
            line-height: 0;
            font-size: 0px;
            user-select: none;
            margin: 0px 2px;
        }

        .css-19r5em7 {
            transition: opacity 0.3s ease 0s;
            opacity: 1;
            margin: 0px 2px;
            -webkit-box-flex: 1;
            flex-grow: 1;
            flex-shrink: 1;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }




        .css-1ae42ux a.login-b:hover {
            cursor: pointer !important;
        }
    </style>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>

<body class="antialiased">
    <section role="main" class="css-rgxens">
        <div data-i18n-or="or" data-i18n-continue="Or continue with" class="google-login social-login css-u0fona" data-testid="social-login-wrapper">
            <div data-testid="social-login-button-row" class="css-1ae42ux">
                <div class="css-1ae42ux" style="text-align: center;">
                    <a style="cursor: pointer;" class="login-b" href="{{route('redirect')}}">
                        <button id="google-auth-button" class="css-87267k" type="button" tabindex="0"><span class="css-1ujqpe8"><img width="120px" height="70px" src="https://www.sslwireless.com/wp-content/uploads/2020/05/ssl-wireless-logo.png" alt=""></span><span class="css-19r5em7"><span>Login with SSL Wireless</span></span></button>
                    </a>
                </div>
            </div>
        </div>

    </section>
</body>

</html>