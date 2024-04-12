<footer class="block p-5 border-t-1 border-slate-800 mt-5 text-center text-sm text-gray-300 dark:text-white/70">
  <nav>
    <ul class="flex flex-wrap justify-center divide-solid divide-x-1">
      <li class="px-2"><a href="{{ route('home.index') }}">Home</a></li>
      <li class="px-2"><a href="{{ route('home.index') }}">About</a></li>
      <li class="px-2"><a href="{{ route('home.index') }}">Contact</a></li>
    </ul>
  </nav>
  
  <p>Copyright &copy; {{ date('Y') }}</p>
</footer>