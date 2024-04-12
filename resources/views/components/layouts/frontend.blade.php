@php
    //$metatags = json_decode($metatags);
    //$formData = json_decode($formData);
    // dd($metatags, $formData);
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ config('app.name', 'ReviewSpot') }} - {{ $metatags->title }}</title>
  <meta name ="description", content="{{ $metatags->meta_description }}">
  <meta name ="keywords", content="{{ $metatags->meta_keywords }}">
  <link rel="shortcut icon" type="image/png" href="https://img.icons8.com/small/64/000000/fire-heart.png"/>
  <!--<<link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">-->
  <!-- AlpineJS -->
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  @vite(['resources/css/main.scss'])
</head>
<body class="bg-white dark:bg-slate-800 text-white">

  <x-layouts.frontend.header :user="$user"/>

  <hero class="grid z-10 text-white text-center bg-cover bg-[url('https://fastly.picsum.photos/id/866/1024/512.jpg?hmac=y-M6beCc4ozVBgm99llsMJNxJJKh5W2qn75FRBrIWLg')]"> {{-- /resources/images/city-scape-min.jpg  {{  config('app.url') }}/resources/images/city-scape-min.jpg--}}
      <div class="col-start-1 row-start-1 bg-gray-800 bg-opacity-40 w-full h-full"></div>
      <div x-data="{ stateDropdownOpen: false, categoryDropdownOpen: false }" class="col-start-1 row-start-1 py-24 px-10 ">
        <div class="center text-3xl text-yellow-500 mb-3"><strong>Search Business</strong></div>
        <form class="max-w-lg mx-auto relative" action="{{ route('search.show') }}" method="GET">
            <div class="flex">
                <x-forms.search-select :options="$states" :defaultValue="$formData->state" :label="'State'" :name="'state'" />
                <x-forms.search-select :options="$categories" :defaultValue="$formData->category" :label="'Category'" :name="'category'" />
                <x-forms.search-input :defaultValue="$formData->keywords" />                            
            </div>            
        </form>         
      </div>
  </hero>

  <content class="grid grid-cols-3 max-w-7xl mx-auto mt-6">      
      <main class="col-span-full md:col-span-2 mx-[5%] md:mx-[10%] order-2 md:order-1">
            {{ $slot }}  
      </main>
      <x-layouts.frontend.sidebar :categories="$categories" />
  </content>    
  <x-layouts.frontend.footer />
</body>
</html>