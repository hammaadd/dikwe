<form action="{{route('user.update.profile')}}" method="post">
    @csrf
    @method('PUT')
    <div class="flex flex-wrap overflow-hidden">
        <div class="w-full overflow-hidden lg:w-1/4 pl-5">
            <div class="block relative h-32 w-32">
                <img id="profileImage" alt="profil" src="{{ asset('images/Ellipse 1792x.png') }}" class="object-cover rounded-full w-full h-full"/>
                <div class=" flex justify-center items-center bg-white bg-opacity-25 w-full h-full absolute top-0 left-0 rounded-full">
                    <i class="fas fa-camera text-4xl cursor-pointer align-middle"></i>
                </div>
            </div>
        </div>
        <div class="w-full overflow-hidden lg:w-2/4">
            <input type="text" name="name" id="" class="block field" placeholder="Yomna Sabry"  @if(Auth::check())  value="{{Auth::user()->name}}" @endif/>
            <input type="text" name="" id="" class="block field" placeholder="UI UX Designer"/>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 mt-5">
        <div class="w-full px-5">
            <input type="email" name="email" id="" class="field" placeholder="Email" @if(Auth::check())  value="{{Auth::user()->email}}" @endif readonly/>
        </div>
        <div class="w-full px-5">
            <input type="text" name="phone_no" id="" class="field" placeholder="Phone Number" @if(Auth::check()) value="{{Auth::user()->phone_no}}" @endif/>
        </div>
        <div class="w-full px-5">
            <input type="text" name="" id="" class="field" placeholder="Location" @if(Auth::check()) value="{{Auth::user()->country->country}}" @endif/>
        </div>
    </div>
    <div class="mt-8">
        <label for="social-links" class="pl-5">Social Links</label>
        <div class="px-5 mt-2 user-social-links">
            <div class="border border-green-550 rounded-xl">
                <div class=" w-full px-10">
                    <p class="link"><i class="fab fa-twitter text-green-550"></i><a href="#" class="pl-5">www.twitter.com</a></p>
                </div>
                <div class=" w-full px-10">
                    <p class="link"><i class="fab fa-facebook-f text-green-550"></i><a href="#" class="pl-5">www.facebook.com</a></p>
                </div>
                <div class=" w-full px-10">
                    <p class="link"><i class="fab fa-linkedin-in text-green-550"></i><a href="#" class="pl-5">www.linkedin.com</a></p>
                </div>
                <div class=" w-full px-10">
                    <p class="link"><i class="fas fa-globe text-green-550"></i><a href="#" class="pl-5">www.website.com</a></p>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-10 px-5 text-right">
        <button class="cancel-btn mr-5">Cancel</button>
        @if(Auth::check())
        <button type="submit" class="form-btn">Save</button>
        @endif
    </div>
</form>
