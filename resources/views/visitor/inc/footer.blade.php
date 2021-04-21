<div class="bg-green-150 pt-10 px-5 pb-5">
    <!-- Footer Content Section -->
    <div class="container">
        <div class="flex flex-wrap overflow-hidden">

            <div class="w-full overflow-hidden md:w-1/5 lg:w-1/5 xl:w-1/5 px-5">
                <!-- 1st Column Content -->
                <a href="#">
                    <img src="{{ asset('images/Dikwe2x.png')}}" class="w-32 lg:w-40 mx-auto" alt="DIKWE Logo" />  
                </a>
                <ul class="text-center mb-2">
                    <li class="inline-block mx-1"><a href="#" target="_blank" class="fab fa-facebook-f footer-icons"></a></li>
                    <li class="inline-block mx-1"><a href="#" target="_blank" class="fab fa-twitter footer-icons"></a></li>
                    <li class="inline-block mx-1"><a href="#" target="_blank" class="fab fa-linkedin-in footer-icons"></a></li>
                </ul>
                <div class="mt-5">
                    <form action="{{route('subscribe')}}" method="POST">
                        @csrf
                        <input type="email" name="email" id="user-email" class="flex-1 block w-full form--input" placeholder="user@email.com">
                        <div class="text-center my-3">
                            <button type="submit" class="form-btn">
                                Subscribe
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="w-full overflow-hidden md:w-1/5 lg:w-1/5 xl:w-1/5 px-5">
                <!-- 2nd Column Content -->
                <div class="text-center md:text-left">
                    <h3 class="footer-section-title">Quick Links</h3>
                </div>
                <ul class="text-center md:text-left">
                    <li class="mt-2"><a href="/register" class="footer-links" >Join Us</a></li>
                    <li class="mt-2"><a href="#" class="footer-links" >Home</a></li>
                    <li class="mt-2"><a href="#" class="footer-links" >How It Works</a></li>
                    <li class="mt-2"><a href="#" class="footer-links" >Pricing</a></li>
                    <li class="mt-2"><a href="#" class="footer-links" >Features</a></li>
                </ul>
            </div>

            <div class="w-full overflow-hidden md:w-1/5 lg:w-1/5 xl:w-1/5 px-5">
                <!-- 3rd Column Content -->
                <div class="text-center md:text-left">
                    <h3 class="footer-section-title">Get To Know Us</h3>
                </div>
                <ul class="text-center md:text-left">
                    <li class="mt-2"><a href="#" class="footer-links" >About Us</a></li>
                    <li class="mt-2"><a href="#" class="footer-links" >Contact Us</a></li>
                    <li class="mt-2"><a href="#" class="footer-links" >Our Team</a></li>
                </ul>
            </div>

            <div class="w-full overflow-hidden md:w-1/5 lg:w-1/5 xl:w-1/5 px-5">
                <!-- 4th Column Content -->
                <div class="text-center md:text-left">
                    <h3 class="footer-section-title">Other Services</h3>
                </div>
                <ul class="text-center md:text-left">
                    <li class="mt-2"><a href="#" class="footer-links" >SKILLAR Recruitment</a></li>
                    <li class="mt-2"><a href="#" class="footer-links" >SKILLAR Freelance</a></li>
                    <li class="mt-2"><a href="#" class="footer-links" >Riskory</a></li>
                </ul>
            </div>

            <div class="w-full overflow-hidden md:w-1/5 lg:w-1/5 xl:w-1/5 px-5">
                <!-- 5th Column Content -->
                <div class="text-center md:text-left">
                    <h3 class="footer-section-title">Resources</h3>
                </div>
                <ul class="text-center md:text-left">
                    <li class="mt-2"><a href="#" class="footer-links" >Help</a></li>
                    <li class="mt-2"><a href="#" class="footer-links" >FAQ</a></li>
                    <li class="mt-2"><a href="#" class="footer-links" >Terms of Services</a></li>
                    <li class="mt-2"><a href="#" class="footer-links" >Cookies Policies</a></li>
                    <li class="mt-2"><a href="#" class="footer-links" >Privacy Policy</a></li>
                </ul>
            </div>

        </div>
        <div class="footer-services text-center pt-8">
            <p class="font-roboto text-xl text-gray-900">DIKWE Is Part Of Other Big Services</p>
            <div class="flex flex-wrap overflow-hidden lg:px-20 pt-8">

                <div class="w-1/2 overflow-hidden sm:w-1/2 md:w-1/4 lg:w-1/4 xl:w-1/4">
                    <!-- Skillar Recruitment -->
                    <a href="#">
                        <img src="{{ asset('images/skillar-recruitment.png')}}" class="w-32 lg:w-36 mx-auto" alt="Skillar Recruitment Logo" />  
                    </a>
                </div>

                <div class="w-1/2 overflow-hidden sm:w-1/2 md:w-1/4 lg:w-1/4 xl:w-1/4">
                    <!-- Skillar Freelance -->
                    <a href="#">
                        <img src="{{ asset('images/skillar-freelance.png')}}" class="w-32 lg:w-36 mx-auto" alt="Skillar Freelance Logo" />  
                    </a>
                </div>

                <div class="w-1/2 overflow-hidden sm:w-1/2 md:w-1/4 lg:w-1/4 xl:w-1/4 pt-6">
                    <!-- Riskory -->
                    <a href="#">
                        <img src="{{ asset('images/Riskory-logo2x.png')}}" class="w-32 lg:w-36 mx-auto" alt="Riskory Logo" />  
                    </a>
                </div>

                <div class="w-1/2 overflow-hidden sm:w-1/2 md:w-1/4 lg:w-1/4 xl:w-1/4 pt-6">
                    <!-- Dikwe -->
                    <a href="#">
                        <img src="{{ asset('images/Dikwe2x.png')}}" class="w-32 lg:w-40 mx-auto" alt="DIKWE Logo" />  
                    </a>
                </div>

            </div>
        </div>
        <div class="footer-copyright text-center pt-8">
            <p class="font-roboto font-bold text-base text-gray-800"><i class="fas fa-copyright"></i> All Rights Reserved | DIKWE</p>
        </div>
    </div>
</div>