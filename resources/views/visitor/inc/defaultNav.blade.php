<nav class="nav-default flex flex-wrap relative items-center justify-between px-2 md:px-16 py-2 font-roboto text-lg bg-green-150 h-16">
<!-- logo -->
<a href="{{ route('home') }}">
  <img src="{{ asset('images/Dikwe2x.png')}}" class="nav-logo lg:absolute z-10 w-32 lg:w-40" alt="DIKWE Logo" />
</a>
<!-- hamburger -->
<div class="flex md:hidden">
  <button id="hamburger">
    <svg class="toggle block w-8 h-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="#2fb268">
      <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd" />
    </svg>
    <svg class="toggle hidden w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="#2fb268">
      <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
    </svg>
  </button>
</div>
<!-- links -->
<div class="toggle hidden md:flex w-full md:w-auto text-center text-bold mt-5 md:mt-0">
  <a href="{{ route('home') }}" class="active link-hover mx-4 block md:inline-block text-gray-500">Home</a>
  <a href="{{ route('pricing') }}" class="link-hover mx-4 block md:inline-block text-gray-500">Pricing</a>
  <a href="{{ route('short-url-search') }}" class="link-hover mx-4 block md:inline-block text-gray-500">Short URLs</a>
  <a href="{{ route('features') }}" class="link-hover mx-4 block md:inline-block text-gray-500">Features</a>
  <!-- <div class="relative inline-block mx-4 text-left">
    <div>
      <button type="button" class="dropdown inline-flex link-hover justify-center w-full text-gray-500 focus:outline-none" id="options-menu" aria-expanded="true" aria-haspopup="true">
        Languages
        <svg class="-mr-1 ml-2 h-5 w-5 mt-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
          <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
        </svg>
      </button>
    </div> -->

    <!--
      Dropdown menu, show/hide based on menu state.

      Entering: "transition ease-out duration-100"
        From: "transform opacity-0 scale-95"
        To: "transform opacity-100 scale-100"
      Leaving: "transition ease-in duration-75"
        From: "transform opacity-100 scale-100"
        To: "transform opacity-0 scale-95"
    -->
    <!-- <div class="dropdwon-menu origin-top-right absolute hidden left-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
      <div class="py-1" role="none">
        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-green-550 hover:text-white" role="menuitem">English - US</a>
        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-green-550 hover:text-white" role="menuitem">English - UK</a>
        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-green-550 hover:text-white" role="menuitem">Arabic</a>
      </div>
    </div>
  </div> -->

</div>
<!-- cta -->
<a href="{{route('login.form')}}" class="toggle hidden md:flex w-auto mx-auto md:mx-0 md:w-auto btn-primary">LOGIN</a>
</nav>
