<html>
<head>
    <title>Regions - @yield('title')</title>
    <link rel="stylesheet" href="/css/app.css" />
</head>
<body>
<header>
    <span>Город:</span>
    <b>{{ app('region_manager')->getRegion()?->name }}</b>
    <ul class="header-menu">
        <li><a href="{{route('index')}}">Главаная</a></li>
        <li><a href="{{route('news')}}">Новости</a></li>
        <li><a href="{{route('about')}}">О нас</a></li>
    </ul>
</header>

<div class="content">
    @yield('content')
</div>
</body>
</html>
