<aside class="md:!block col-span-full md:col-span-1 mx-[5%] md:mr-[20%] order-1 md:order-2">
  <section class="card p-4">
      <h2 class="text-2xl text-white mb-2">Categories</h2>
      <ul class="hoverlist divide-y divide-y-1">
          @foreach ($categories as $category)
            <li class="highlight mb-1 pt-1"><a class="flex align-middle" href="/search?category={{ $category->code }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 object-cover mr-2 fill-white">
                    {!! $category->svgPath !!}
                </svg>
                <span class="font-bold text-sm">{{ $category->name }}</span>
                </a>
            </li>              
          @endforeach
        </ul>      
  </section>
  <section class="card p-4">
      
  </section>
  <section class="card p-4">
      
  </section>
</aside>