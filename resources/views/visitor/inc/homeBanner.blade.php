@section('headerExtra')
<link href="{{ asset('css/homepage.css') }}" rel="stylesheet">
<link href="{{ asset('css/splide.min.css') }}" rel="stylesheet">
<script src="{{ asset('js/splide.min.js') }}"></script>
@endsection
@section('bodyExtra')
<script>
    new Splide( '.splide', {
        type: 'loop',
        autoplay: 'true',
        interval: '3000',
    } ).mount();
</script>
@endsection
<div class="top-banner bg-green-550 w-full max-w-full h--70 2xl:h--60">
    <div class="container mx-auto pb-12">
        <!-- Top Banner List -->
        <div class="text-center">
            <ul class="pt-4">
                <li class="banner-list">Data <div class="bg-red-800 banner-dots"></div></li>
                <li class="banner-list">Information <div class="bg-blue-900 banner-dots"></div></li>
                <li class="banner-list">Knowledge <div class="bg-green-400 banner-dots"></div></li>
                <li class="banner-list">Wisdom <div class="bg-yellow-300 banner-dots"></div></li>
                <li class="banner-list">Experience</li>
            </ul>
        </div>
        <div class="flex flex-wrap overflow-hidden pb-5">
            <div class="w-full overflow-hidden lg:w-1/2 xl:w-1/2 md:h-80 2xl:h-96">
                <div class="splide relative">
                    <div class="splide__arrows absolute -bottom-8">
                        <button class="splide__arrow splide__arrow--prev">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="#2fb268">
                                <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <button class="splide__arrow splide__arrow--next">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="#2fb268">
                                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                    
                    <div class="splide__track h-64 2xl:h-80">
                        <ul class="splide__list h-full justify-center items-center">
                            <li class="splide__slide text-center">
                                <div>
                                    <p class="text-white text-3xl leading-10 font-roboto-slab font-bold">
                                        Save, organize and share your</br>Knowledge Assets in the cloud
                                    </p>
                                </div>
                            </li>
                            <li class="splide__slide text-center">
                                <div>
                                    <p class="text-white text-3xl leading-10 font-roboto-slab font-bold">
                                        All kinds of Knowledge Assets:</br>Bookmarks, Notes, Short URLs, Ideas
                                    </p>
                                </div>
                            </li>
                            <li class="splide__slide text-center">
                                <div>
                                    <p class="text-white text-3xl leading-10 font-roboto-slab font-bold">
                                        Get Informed Better..<br>Browse other user's knowledge<br>assets, follow them, subscribe to Tags
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="w-full overflow-hidden lg:w-1/2 xl:w-1/2">
                <div class="justify-center items-center">
                    <img class="w-2/3 mx-auto pt-3 pb-4" src="{{asset('images/Mask Group 15.svg')}}" alt="Top Banner Image">
                    <a href="{{ route('register') }}" class="md:flex w-max mx-auto btn-secondary">SIGN UP</a>
                </div>
            </div>
        </div>
    </div>
</div>