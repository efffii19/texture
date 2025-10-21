<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" />

        <style>
            .auth-container {
                min-height: 100vh;
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 20px;
            }
            .auth-card {
                background: white;
                border-radius: 15px;
                box-shadow: 0 20px 40px rgba(0,0,0,0.1);
                overflow: hidden;
                max-width: 400px;
                width: 100%;
            }
            .auth-header {
                background: white;
                padding: 30px 30px 20px;
                text-align: center;
                border-bottom: 1px solid #f0f0f0;
            }
            .auth-logo {
                width: 80px;
                height: 80px;
                margin: 0 auto 15px;
                display: block;
            }
            .auth-title {
                color: #333;
                font-size: 24px;
                font-weight: 600;
                margin-bottom: 5px;
            }
            .auth-subtitle {
                color: #666;
                font-size: 14px;
                margin-bottom: 0;
            }
            .auth-body {
                padding: 30px;
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="auth-container">
            <div class="auth-card">
                <div class="auth-header">
                    <a href="/">
                        <x-application-logo class="auth-logo" />
                    </a>
                    <h1 class="auth-title">Texture Properties</h1>
                    <p class="auth-subtitle">Welcome back! Please sign in to your account.</p>
                </div>
                <div class="auth-body">
                    {{ $slot }}
                </div>
            </div>
        </div>

        <!-- Scripts -->
        <script type='text/javascript' src='{{ asset("js/jquery.js") }}'></script>
        <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    </body>
</html>
