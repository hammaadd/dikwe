<form action="{{route('user.update.profile')}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="flex flex-wrap overflow-hidden">
        <div class="w-full overflow-hidden md:w-2/5 lg:w-2/5 pl-5">
            <div class="block relative w-24 h-24 sm:h-32 sm:w-32 mx-auto">
                <img id="profileImage" alt="profil"
                src="
                @if(Auth::user()->profile_img == null)
                  https://ui-avatars.com/api/?background=EAF7F0&name={{ str_replace(' ','+' ,Auth::user()->name) }}
                  @else
                  {{asset('user_profile_images/'.Auth::user()->profile_img)}}
                  @endif
                  "
                 class="object-cover rounded-full w-full h-full"/>
                <div class=" flex justify-center items-center bg-white bg-opacity-25 w-full h-full absolute top-0 left-0 rounded-full">
                    <i class="fas fa-camera text-4xl cursor-pointer align-middle" onclick="showImage()"></i>
                    <input type="file" name="avatar_img" id="avatarImg" style="display:none;">
                    
                </div>
            </div>
            @error('avatar_img')
                    <small class="field-error-message">
                        <span>{{$message}}</span>
                    </small>
            @enderror
        </div>
        <div class="w-full overflow-hidden lg:w-2/4">
            <input type="text" name="name" class="block field" placeholder="Jhon Doe. Enter name here."  @if(Auth::check())  value="{{Auth::user()->name}}" @endif/>
            @error('name')
                <small class="field-error-message">
                    <span>{{$message}}</span>
                </small>
            @enderror
            <textarea name="about" rows="3" class="block field" placeholder="Tell about yourself.">{{ Auth::user()->about }}</textarea>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 mt-5">
        <div class="w-full px-5">
            <input type="email" name="email" class="field" placeholder="Email" @if(Auth::check())  value="{{Auth::user()->email}}" @endif readonly/>
        </div>
        
        <div class="w-full px-5">
            <input type="text" name="phone_no" class="field" placeholder="Phone number" @if(Auth::check()) value="{{Auth::user()->phone_no}}" @endif/>
        </div>
        <div class="w-full px-5">
            <select class="field" name="gender">
                <option value="Male" @if(Auth::user()->gender == 'Male') selected @endif>Male</option>
                <option value="Female" @if(Auth::user()->gender == 'Female') selected @endif>Female</option>
                <option value="Other" @if(Auth::user()->gender == 'Other') selected @endif>Other</option>
            </select>
        </div>
        <div class="w-full px-2 md:px-5">
            <select class="field" name="country">
                @forelse($countries as $country)
                <option value="{{ $country->id }}" @if(Auth::user()->country->id == $country->id) selected @endif>{{ $country->country }}</option>
                @empty
                <option value="">Nothing to show</option>
                @endforelse
            </select>
        
    </div>
    </div>
    @php
        $user = Auth::user();
        if(isset($user)){
            $userlinks = $user->sociallinks;
        }
    @endphp
    <div class="mt-8">
        <label for="social-links" class="pl-5">Social Links</label>
        <div class="px-2 md:px-5 mt-2 user-social-links">
            <div class="border border-green-550 rounded-xl py-2">
    
                <div class=" w-full px-10">
                    <p class="link"><i class="fab fa-twitter text-green-550"></i><input type="text" class="w-10/12 border-0 ring-0 focus:border-0 focus:ring-0" placeholder="www.twitter.com" name="twitterlink"
                    @isset($userlinks)
                        @forelse ($userlinks as $link)
                            @if ($link->type=='T')
                                value="{{$link->url}}"
                            @endif
                        @empty
                        
                        @endforelse    
                    @endisset
                    ></p>
                </div>
                <div class=" w-full px-10">
                    <p class="link"><i class="fab fa-facebook-f text-green-550"></i><input type="text" class="w-10/12 border-0 ring-0 focus:border-0 focus:ring-0" placeholder="www.facebook.com" name="facebooklink"
                        @isset($userlinks)
                        @forelse ($userlinks as $link)
                            @if ($link->type=='F')
                                value="{{$link->url}}"
                            @endif
                        @empty
                        
                        @endforelse    
                    @endisset   
                    ></p>
                </div>
                <div class=" w-full px-10">
                    <p class="link"><i class="fab fa-linkedin-in text-green-550"></i><input type="text" class="w-10/12 border-0 ring-0 focus:border-0 focus:ring-0" placeholder="www.linkedin.com" name="linkedinlink"
                        @isset($userlinks)
                        @forelse ($userlinks as $link)
                            @if ($link->type=='L')
                                value="{{$link->url}}"
                            @endif
                        @empty
                        
                        @endforelse    
                    @endisset    
                    ></p>
                </div>
                <div class=" w-full px-10">
                    <p class="link"><i class="fas fa-globe text-green-550"></i><input type="text" class="w-10/12 border-0 ring-0 focus:border-0 focus:ring-0" placeholder="www.website.com" name="othersite"
                        @isset($userlinks)
                        @forelse ($userlinks as $link)
                            @if ($link->type=='O')
                                value="{{$link->url}}"
                            @endif
                        @empty
                        
                        @endforelse    
                    @endisset  
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

