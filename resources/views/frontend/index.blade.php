{{-- <x-layouts.frontend :metatags="$metatags" :states="$states" :categories="$categories"> --}}
<x-layouts.frontend :metatags="$metatags">
    <article class="card">
        <h1>{{ $contentTitle }}</h1>
        <div class="flex items-center justify-between px-4 h-14">
            <h3 class="text-lg font-bold w-[50%] truncate">Little Jedi</h3>
            <div class="text-sm text-gray-500">flickr @ <a href="" class="hover:underline" target="blank">John Doe</a></div>
        </div>
        <figure>
            <a href=""><img class="w-full" src="https://live.staticflickr.com/65535/50618365686_36f887ab88_c.jpg"></a>
        </figure>
        <div class="p-4 pb-2">
            <a class="flex items-center gap-1 mb-4" href="">
                <img class="w-8 h-8 rounded-full" src="https://img.icons8.com/small/96/A9A9A9/happy.png">
                <span class="font-bold hover:underline">Lisa</span>
            </a>
            <p class="text-5xl mb-10 px-4 font1">Jedi Kitty protects the street</p>
            <div class="flex items-center gap-2 text-sm mb-5">
                <a class="bg-gray-200 rounded-full px-3 py-1 hover:bg-gray-500 hover:text-white" href="">Animals</a>
                <a class="bg-gray-200 rounded-full px-3 py-1 hover:bg-gray-500 hover:text-white" href="">Cute</a>
            </div>
            <div class="flex items-center justify-between text-sm px-2">
                <a class="font-bold hover:underline" href="">Comments<span class="font-light text-gray-500 ml-2">3</span></a>
                <div class="flex items-center gap-4 [&>a:hover]:underline">
                    <div class="flex items-center gap-1">
                        <img class="w-5 -mt-1" src="https://img.icons8.com/small/24/000000/fire-heart.png">1</div>
                    <a href="">Like</a>
                    <a href="">Edit</a>
                    <a href="">Delete</a>
                </div>
            </div>
        </div>
    </article>       
        
    <script>
        // import Alpine from 'alpinejs'
        //let formAction = "{{ route('business.destroy', 1111) }}";
        // document.getElementById('myForm').action = 'http://localhost:8000/admin/business/actionto';
        //document.getElementById("myForm").action = formAction;
        
    </script>
</x-layouts.frontend>
