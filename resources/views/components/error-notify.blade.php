<div x-show.transition.in.duration.200ms.out.duration.700ms="shownotification" class="z-10 w-10/12 md:w-2/3 lg:w-1/2 bottom-10 left-0 right-0 mx-auto fixed flex flex-col sm:flex-row sm:items-center bg-red-700 shadow-md rounded-md py-5 pl-6 pr-8 sm:pr-6">
    <div class="flex flex-row items-center border-b sm:border-b-0 w-full sm:w-auto pb-4 sm:pb-0">
        <div class="text-red-100">
            <i class="fas fa-times-circle"></i>
        </div>
        <div class="text-base font-bold ml-3 text-center md:text-left text-white">Error !</div>
    </div>
    <div class="text-center md:text-left text-sm tracking-wide text-gray-100 mt-4 sm:mt-0 sm:ml-4">{{ $message }}</div>
    <div class="absolute sm:relative sm:top-auto sm:right-auto ml-auto right-4 top-4 text-red-100 hover:text-gray-800 cursor-pointer" @click="shownotification = false">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
    </div>
</div>