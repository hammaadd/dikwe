<div>
    @if(Auth::user()->isFollowing($user->id))
    <button wire:click="unfollowUser({{$user->id}})" class=" bg-green-150 text-gray-500 text-center rounded-full px-2 py-1 mx-2 border-2 border-green-150 hover:bg-green-550 hover:border-green-150 hover:text-white">Unfollow</button>
    @else
    <button wire:click="followUser({{$user->id}})" class=" bg-green-550 text-white text-center rounded-full px-2 py-1 mx-2 border-2 border-green-550 hover:bg-white hover:text-green-550">Follow</button>
    @endif
    
</div>
