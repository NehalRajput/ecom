<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <title>{{ config('app.name', 'Famms') }}</title>
      <!-- Bootstrap CSS -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
      <!-- Font Awesome -->
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
      <!-- Custom CSS -->
      <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
      @stack('styles')
   </head>
   <body>
      <!-- Header Section -->
      @include('layouts.header')

      <!-- Main Content -->
      <main>
         @yield('content')
      </main>

      <!-- Footer Section -->
      @include('layouts.footer')

      <!-- Bootstrap JS -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
      <!-- jQuery -->
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      @stack('scripts')
   </body>
</html>