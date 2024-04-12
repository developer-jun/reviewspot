<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Welcome') }}</title>

    <!-- Fonts -->
    <style>
      @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');
      
    </style>
    @vite(['resources/css/app.scss'])

    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
  </head>
  <body class="max-h-screen font-family-karla antialiased dark:bg-sky-950 dark:text-white/50">
    <div class="flex w-full ">
      @include('components.layouts.sidebar')
      <div class="relative w-full flex flex-col h-screen overflow-y-hidden">
        @include('components.layouts.header')
        @include('components.layouts.mheader')

        <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
          <main class="w-full flex-grow p-6">            
            {{ $slot }}
          </main>
  
          @include('components.layouts.footer')
        </div>
      </div>
  </div>  
  <!-- Font Awesome -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
  </body>
</html>
