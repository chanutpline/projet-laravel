<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">
</head>
<body>

<div class="top-bar">
    <div class="top-bar-left">
        <ul class="menu">
            <li class="menu-text">Blog</li>
            <li><a href="/">Home</a></li>
            <li><a href="/contact">Contact</a></li>
            <li><a href="/articles">Articles</a></li>
            
        </ul>
    </div>

    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-bar-right">
                <ul class="menu">
                    @auth
                        @if(Auth::user()->hasRole('Admin'))
                            <li><a clas='btn btn-primary btn-lg' href='/admin'>Admin</a></li>
                        @else
                            <li><a href = "/user">User Profile</a></li>
                        @endif
                        <li><form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit">Logout</button>
                            </form>
                        </li>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </ul>
            </div>
        @endif

    </div>
</div>