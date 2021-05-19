<nav class="nav-default flex flex-wrap relative items-center justify-between px-2 md:px-16 py-2 font-roboto text-lg bg-green-150 h-16">
<!-- logo -->
<a href="{{ route('home') }}">
  <img src="{{ asset('images/Dikwe2x.png')}}" class="nav-logo lg:absolute z-10 w-32 lg:w-40" alt="DIKWE Logo" />
</a>
<!-- hamburger -->
<div class="flex md:hidden">
  <button id="hamburger" class="focus:outline-none">
    <svg class="toggle block w-8 h-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="#2fb268">
      <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd" />
    </svg>
    <svg class="toggle hidden w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="#2fb268">
      <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
    </svg>
  </button>
</div>
<!-- links -->
<div class="toggle hidden md:flex w-full md:w-auto text-center text-bold mt-5 md:mt-0 bg-white md:bg-transparent z-10 rounded-t-xl">
  <a href="{{ route('home') }}" class="{{Request::is('/') ? 'active' : ''}} link-hover mx-4 block md:inline-block text-gray-500 py-2 md:py-0">Home</a>
  <a href="{{ route('pricing') }}" class="{{Request::is('pricing') ? 'active' : ''}} link-hover mx-4 block md:inline-block text-gray-500 py-2 md:py-0">Pricing</a>
  <a href="{{ route('short-url-search') }}" class="{{Request::is('short-url-search') ? 'active' : ''}} link-hover mx-4 block md:inline-block text-gray-500 py-2 md:py-0">Short URLs</a>
  <a href="{{ route('features') }}" class="{{Request::is('features') ? 'active' : ''}} link-hover mx-4 block md:inline-block text-gray-500 py-2 md:py-0">Features</a>
</div>
<!-- cta -->
<div class="toggle hidden md:flex w-full bg-white pt-3 pb-5 text-center md:w-auto md:py-0 md:bg-transparent z-10 rounded-b-xl">
  @guest
    <a href="{{route('login.form')}}" class="toggle hidden mt-2 md:mt-0 md:flex w-auto mx-auto md:mx-0 md:w-auto btn-primary">LOGIN</a>
  @endguest

  @auth
    <a href="{{ route('dashboard') }}" class="toggle hidden mt-2 md:mt-0 md:flex w-auto mx-auto md:mx-0 md:w-auto btn-primary">DASHBOARD</a>
  @endauth
</div>
</nav>
