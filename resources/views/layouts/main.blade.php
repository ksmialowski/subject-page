<!DOCTYPE html>
<html lang="pl">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>@yield('title')</title>
     <link rel="stylesheet" href="{{ asset('css/app.css') }}">
     <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
</head>
<body>
     <div class="loading-screen"></div>
     <header class="page-header">
          <div class="header-wrapper">
               <h1>Sieci komputerowe</h1>
               <button class="nav-btn">menu</button>
               <nav class="page-nav">
                    <ul class="nav-list">
                         <li class="nav-list-items" data-destination=".exercises-section">Materiały</li>
                         <li class="nav-list-items" data-destination=".about-section">Dla uczniów</li>
                         <li class="nav-list-items" data-destination=".contact-section">Kontakt</li>
                    </ul>
               </nav>
          </div>
     </header>

     @yield('home')

     @yield('presentations')

     @yield('students')

     @yield('contact')

     <footer>
          Copyright &copy; Krzysztof Cisek, Kamil Śmiałowski, Kacper Mazur
     </footer>
     <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
