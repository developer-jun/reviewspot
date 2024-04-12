<header class="md:flex items-center justify-between [&>*]:px-8 h-20 text-white sticky bg-gray-700 top-0 z-50  relative">
  <div class="flex items-center justify-between h-20">
      <logo>
          <a class="flex items-center gap-1" href="">
              <img class="h-10 -mt-1" src="/resources/images/group-stars.svg"/>
              <span class="text-lg font-bold">{{ config('app.name', 'ReviewSpot') }}</span>
          </a>
      </logo>          
  </div>
  <nav  class="md:!block  h-screen w-screen md:h-auto md:w-auto -mt-20 md:mt-0 absolute md:relative z-[-1]">
      <ul class="flex items-center navitems flex-col md:flex-row gap-8 md:gap-1 justify-center h-full -translate-y-10 md:translate-y-0">
          <li><a href="">Home</a></li>
          <li><a href="">Create Post</a></li>
          <li class="relative">
              <a class="cursor-pointer inline-flex flex-col items-center text-center select-none">
                  <img class="h-8 rounded-full object-cover bg-teal-200" src="/resources/images/sulley-sm.jpg" />
                  {{--[ $user ] --}}
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                    <path fill-rule="evenodd" d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                  </svg>                  
              </a>
              
          </li>
      </ul>
  </nav>
</header>