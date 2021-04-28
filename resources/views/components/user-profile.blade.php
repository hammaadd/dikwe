<form action="{{route('user.update.profile')}}" method="post">
    @csrf
    @method('PUT')
    <div class="flex flex-wrap overflow-hidden">
        <div class="w-full overflow-hidden md:w-2/5 lg:w-2/5 pl-5">
            <div class="block relative w-24 h-24 sm:h-32 sm:w-32 mx-auto">
                <img id="profileImage" alt="profil" src="{{ asset('images/Ellipse 1792x.png') }}" class="object-cover rounded-full w-full h-full"/>
                <div class=" flex justify-center items-center bg-white bg-opacity-25 w-full h-full absolute top-0 left-0 rounded-full">
                    <i class="fas fa-camera text-4xl cursor-pointer align-middle"></i>
                </div>
            </div>
        </div>
        <div class="w-full overflow-hidden md:w-2/4 px-1 md:px-0">
            <input type="text" name="" id="" class="block field" placeholder="Yomna Sabry"/>
            <input type="text" name="" id="" class="block field" placeholder="UI UX Designer"/>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 mt-0 md:mt-5">
        <div class="w-full px-2 md:px-5">
            <input type="email" name="" id="" class="field" placeholder="Email"/>
        </div>
        <div class="w-full px-2 md:px-5">
            <input type="text" name="" id="" class="field" placeholder="Phone Number"/>
        </div>
        <div class="w-full px-2 md:px-5">
            <input type="text" name="" id="" class="field" placeholder="Address"/>
        </div>
        <div class="w-full px-2 md:px-5">
            <select class="field" name="country">
                <option value="">
                    Country
                </option>
                <option value="">
                    United States
                </option>
                <option value="">
                    United Kingdom
                </option>
                <option value="">
                    Saudi Arabia
                </option>
                <option value="">
                    Pakistan
                </option>
            </select>
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
            <input type="text" name="" id="" class="field" placeholder="Location" @if(Auth::check() && !(empty(Auth::user()->country)))  value="{{Auth::user()->country->country}}" @endif/>
        </div>
    </div>
    @php
        $user = Auth::user();
        $userlinks = $user->sociallinks;
    @endphp
    <div class="mt-8">
        <label for="social-links" class="pl-5">Social Links</label>
        <div class="px-2 md:px-5 mt-2 user-social-links">
            <div class="border border-green-550 rounded-xl">
                <div class=" w-full px-2 md:px-10">
                    <p class="link"><i class="fab fa-twitter text-green-550"></i><input type="text" name="" id="" class="field border-0" placeholder="www.twitter.com"/></p>
                </div>
                <div class=" w-full px-2 md:px-10">
                    <p class="link"><i class="fab fa-facebook-f text-green-550"></i><input type="text" name="" id="" class="field border-0" placeholder="www.facebook.com"/></p>
                </div>
                <div class=" w-full px-2 md:px-10">
                    <p class="link"><i class="fab fa-linkedin-in text-green-550"></i><input type="text" name="" id="" class="field border-0" placeholder="www.linkedin.com"/></p>
                </div>
                <div class=" w-full px-2 md:px-10 pb-6">
                    <p class="link"><i class="fas fa-globe text-green-550"></i><input type="text" name="" id="" class="field border-0" placeholder="www.website.com"/></p>
                <div class=" w-full px-10">
                    <p class="link"><i class="fab fa-twitter text-green-550"></i><input type="text" class="w-10/12 border-0 ring-0 focus:border-0 focus:ring-0" placeholder="www.twitter.com" name="twitterlink"
                    @foreach ($userlinks as $link)
                        @if ($link->type=='T')
                            value="{{$link->url}}"
                        @endif
                    @endforeach    
                    ></p>
                </div>
                <div class=" w-full px-10">
                    <p class="link"><i class="fab fa-facebook-f text-green-550"></i><input type="text" class="w-10/12 border-0 ring-0 focus:border-0 focus:ring-0" placeholder="www.facebook.com" name="facebooklink"
                        @foreach ($userlinks as $link)
                        @if ($link->type=='F')
                            value="{{$link->url}}"
                        @endif
                    @endforeach     
                    ></p>
                </div>
                <div class=" w-full px-10">
                    <p class="link"><i class="fab fa-linkedin-in text-green-550"></i><input type="text" class="w-10/12 border-0 ring-0 focus:border-0 focus:ring-0" placeholder="www.linkedin.com" name="linkedinlink"
                        @foreach ($userlinks as $link)
                        @if ($link->type=='L')
                            value="{{$link->url}}"
                        @endif
                    @endforeach     
                    ></p>
                </div>
                <div class=" w-full px-10">
                    <p class="link"><i class="fas fa-globe text-green-550"></i><input type="text" class="w-10/12 border-0 ring-0 focus:border-0 focus:ring-0" placeholder="www.website.com" name="othersite"
                        @foreach ($userlinks as $link)
                        @if ($link->type=='O')
                            value="{{$link->url}}"
                        @endif
                    @endforeach     
                    ></p>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-4 mb-4 md:mt-10 md:mb-0 px-5 text-center md:text-right">
        <button class="cancel-btn mr-5">Cancel</button>
        @if(Auth::check())
        <button type="submit" class="form-btn">Save</button>
        @endif
    </div>
</form>
