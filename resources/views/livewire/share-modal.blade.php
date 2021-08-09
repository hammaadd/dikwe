<div>
                                        <!-- Title / Close-->
                                    <div class="flex items-center justify-between p-2 md:px-4 md:mt-2">
                                        <h3 class="mr-3 font-bold text-gray-900 text-xl max-w-none">Share this note to public</h3>
                                       
                                    </div>
                                    <div class="flex items-center justify-between px-2 md:px-4 md:mt-2 relative rounded-xl">
                                       
                                            <input type="text" name="search" class="input-search" placeholder="Note url"
                                            autocomplete="off" @isset($note->id) value="{{route('view.note',$note->id)}}" @endisset />
                                            @php
                                            if(isset($note->id)):
                                                $copyData = route('view.note',$note->id);
                                            else:
                                                $copyData = 'Nothing Selected';
                                            endif;
                                            @endphp
                                            <button @isset($note->id) wire:click="copyLink({{$note->id}})" @endisset class="absolute inset-y-0 right-5 px-5 flex items-center bg-green-550 rounded-xl"  onclick="copyToClipBoard('{{$copyData}}')">
                                                <span class="text-xl">
                                                    <i class="text-white fas fa-copy"></i>
                                                </span>
                                            </button>                            
                                    </div>
                                    <!-- content -->
                                    <div class="flex items-center justify-center space-x-3 my-3">
                                        
                                        <a @isset($note->id) href="https://www.facebook.com/sharer/sharer.php?u={{route('view.note',$note->id)}}&t={{$note->title}}" @endisset class="border-blue-600 border-2 px-4 py-2 font-semibold text-blue-600 inline-flex items-center space-x-2 rounded" target="_blank">
                                            <svg class="w-5 h-5 fill-current"  id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 124.8 123.36"><defs><style>.cls-1,.cls-2{fill:none;}.cls-1{clip-rule:evenodd;}.cls-3{clip-path:url(#clip-path);}.cls-4{clip-path:url(#clip-path-2);}.cls-5{fill:#fff;}</style><clipPath id="clip-path" transform="translate(0.69 0.51)"><path class="cls-1" d="M27.75,0H95.13a27.83,27.83,0,0,1,27.75,27.75V94.57a27.83,27.83,0,0,1-27.75,27.74H27.75A27.83,27.83,0,0,1,0,94.57V27.75A27.83,27.83,0,0,1,27.75,0Z"/></clipPath><clipPath id="clip-path-2" transform="translate(0.69 0.51)"><rect class="cls-2" width="122.88" height="122.31"/></clipPath></defs><title>facebook-app</title><g class="cls-3"><g class="cls-4"><image width="260" height="257" transform="matrix(0.48, 0, 0, -0.48, 0, 123.36)" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAQQAAAEBCAYAAACexdu5AAAACXBIWXMAABcRAAAXEQHKJvM/AAAEFUlEQVR4Xu3dwXEdIRBFUb4kZ+HwHJbDcxrSeAG+hctVJgDO2cyG9aumoYfX8zzP68evAdzr+fl9jDHG22EdcJGPMcZ4vV6ndcAFPubn+f8q4Aq2DEBmhWDLAAxbBmCzAkGFAKgQgM3qIRxWAVdwygBkVQhyAdBUBDZKAyCaikBmIDxfh2XADda0o50DUFNRhQBoKgIbgQBEIABx7AhEhQBEIACZW4a398My4AYqBCACAYhZBiCrh6BQAFQIwGZOO55WAVewVwDin4pAVlNRIACaisDG689ANBWBeLkJyOoheP0Z8Bw8sNFUBKJCAKKbCEQgAHHsCGQ99npaBtxAaQDEsSMQ045ANBWBqBCAKA2AeA4eiAoBiEAAIhCA6CEAUSEAWcNNcgEwywBs3FQEYpYBiAoByHr9WYUAqBCAzXqXwSkD4KEWYOPqMhDHjkBsGYCYZQCyjh1VCEAXk3QVAT0EYCMQgDh2BLIqBLMMQBXC+2EZcAPTjkD0EICsm4qnZcANlAZAjD8D0VQEoqkIxNVlIEoDIJqKQOY9hNMq4AoqBCB6CEDWL9RMOwIqBGDjbUcgq6noYhJglgHYaCoCWRXC52EZcIP1xyRNRaAK4bAKuIKry0D8IAWIl5uAqBCA+IUakFUh6CoCph2BzbqHYMsAuIcAbGwZgPhBChAVApA17XhaBtxAhQBEIAARCEAEAhCzDEBMOwKxZQAiEIAYbgJilgGILQOQOctwWgVcQQ8BiC0DkPUcvFwA+smql5sALzcBG8NNQGwZgKx/KtoyAO4hABulARBNRSCaikDcQwCiqQjElgHIqhDeD8uAG6xfqKkQADcVgY2mIhBNRSCaikBWhfB5WAbcwCwDEMcLQNax42kZcAMVAhCBAMTFJCDr5Sb3EAA3FYHNPGVQIQBDUxHYuLoMRFMRiKYiEBUCEBeTgDhlADLvIZxWAVfwgxQgtgxANBWBzED4clMR7vZtjOEeArBxUxGIHgIQ/0MAYvwZGLUTD6uAi8xY0EQAhqYisHEPAYimIjDGmEWB8Wcgxp+BOHYEoqkIRFMRGH82C7YMQAw3AfkYY4zH/xDgcnOzoEIAYpYBiKYiEIEAxJYBiAoBiGlHILYMQPxTEYiXm4Dx103F8aa3CDhlADa2DMCwZQD+oUIAxt/jz/9dCNzCb9iBaB4AEQhAzDIAUSEAEQhAnDIAUSEAcTEJiFMGIAIByBpuOqwCrqBCACIQgNgyAFEhAHExCYhAADJvKtoyAEOFAGwEAhCBAEQgAHEPAYgKAYhAACIQgAgEIAIBiEAAIhCACAQgAgGIQAAiEIAIBCACAYhAACIQgAgEIAIBiEAAIhCACAQgAgGIQAAiEIAIBCACAYhAACIQgAgEIAIBiEAAIhCA/AafC2PbZ0osjAAAAABJRU5ErkJggg=="/></g></g><path class="cls-5" d="M85.36,78.92l2.72-17.76H71V49.63c0-4.86,2.38-9.59,10-9.59H88.8V24.92a94.45,94.45,0,0,0-13.75-1.2c-14,0-23.21,8.5-23.21,23.9V61.16H36.24V78.92h15.6v43.57H71V78.92Z" transform="translate(0.69 0.51)"/></svg>
                                            <span>Facebook</span>
                                        </a>
                                        <a @isset($note->id) href="https://www.twitter.com/share?url={{route('view.note',$note->id)}}&text={{$note->title}}" @endisset class="border-blue-400 border-2 px-4 py-2 font-semibold text-blue-400 inline-flex items-center space-x-2 rounded" target="_blank">
                                            <svg class="w-5 h-5 fill-current" id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 122.88 122.31"><defs><style>.cls-1{fill:#1ca1f1;}.cls-1,.cls-2{fill-rule:evenodd;}.cls-2{fill:#fff;}</style></defs><title>twitter-app</title><path class="cls-1" d="M27.75,0H95.13a27.83,27.83,0,0,1,27.75,27.75V94.57a27.83,27.83,0,0,1-27.75,27.74H27.75A27.83,27.83,0,0,1,0,94.57V27.75A27.83,27.83,0,0,1,27.75,0Z"/><path class="cls-2" d="M102.55,35.66a33.3,33.3,0,0,1-9.68,2.65A17,17,0,0,0,100.29,29a34.05,34.05,0,0,1-10.71,4.1A16.87,16.87,0,0,0,60.41,44.62a17.45,17.45,0,0,0,.43,3.84A47.86,47.86,0,0,1,26.09,30.83a16.83,16.83,0,0,0-2.29,8.48h0a16.84,16.84,0,0,0,7.5,14,17,17,0,0,1-7.64-2.11v.22A16.86,16.86,0,0,0,37.19,68a17.19,17.19,0,0,1-4.45.6,17.58,17.58,0,0,1-3.18-.31A16.9,16.9,0,0,0,45.31,80a34,34,0,0,1-25,7,47.69,47.69,0,0,0,25.86,7.58c31,0,48-25.7,48-48,0-.74,0-1.46-.05-2.19a33.82,33.82,0,0,0,8.41-8.71Z"/></svg>
                                            <span>Twitter</span>
                                        </a>
                                        {{-- <a @isset($note->id) href="https://www.facebook.com/sharer/sharer.php?u={{route('view.note',$note->id)}}&t={{$note->title}}" @endisset class=" border-red-600 border-2 px-4 py-2 font-semibold text-red-600 inline-flex items-center space-x-2 rounded" target="_blank">
                                            <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 132.004 132"><defs><linearGradient id="b"><stop offset="0" stop-color="#3771c8"/><stop stop-color="#3771c8" offset=".128"/><stop offset="1" stop-color="#60f" stop-opacity="0"/></linearGradient><linearGradient id="a"><stop offset="0" stop-color="#fd5"/><stop offset=".1" stop-color="#fd5"/><stop offset=".5" stop-color="#ff543e"/><stop offset="1" stop-color="#c837ab"/></linearGradient><radialGradient id="c" cx="158.429" cy="578.088" r="65" xlink:href="#a" gradientUnits="userSpaceOnUse" gradientTransform="matrix(0 -1.98198 1.8439 0 -1031.402 454.004)" fx="158.429" fy="578.088"/><radialGradient id="d" cx="147.694" cy="473.455" r="65" xlink:href="#b" gradientUnits="userSpaceOnUse" gradientTransform="matrix(.17394 .86872 -3.5818 .71718 1648.348 -458.493)" fx="147.694" fy="473.455"/></defs><path fill="url(#c)" d="M65.03 0C37.888 0 29.95.028 28.407.156c-5.57.463-9.036 1.34-12.812 3.22-2.91 1.445-5.205 3.12-7.47 5.468C4 13.126 1.5 18.394.595 24.656c-.44 3.04-.568 3.66-.594 19.188-.01 5.176 0 11.988 0 21.125 0 27.12.03 35.05.16 36.59.45 5.42 1.3 8.83 3.1 12.56 3.44 7.14 10.01 12.5 17.75 14.5 2.68.69 5.64 1.07 9.44 1.25 1.61.07 18.02.12 34.44.12 16.42 0 32.84-.02 34.41-.1 4.4-.207 6.955-.55 9.78-1.28 7.79-2.01 14.24-7.29 17.75-14.53 1.765-3.64 2.66-7.18 3.065-12.317.088-1.12.125-18.977.125-36.81 0-17.836-.04-35.66-.128-36.78-.41-5.22-1.305-8.73-3.127-12.44-1.495-3.037-3.155-5.305-5.565-7.624C116.9 4 111.64 1.5 105.372.596 102.335.157 101.73.027 86.19 0H65.03z" transform="translate(1.004 1)"/><path fill="url(#d)" d="M65.03 0C37.888 0 29.95.028 28.407.156c-5.57.463-9.036 1.34-12.812 3.22-2.91 1.445-5.205 3.12-7.47 5.468C4 13.126 1.5 18.394.595 24.656c-.44 3.04-.568 3.66-.594 19.188-.01 5.176 0 11.988 0 21.125 0 27.12.03 35.05.16 36.59.45 5.42 1.3 8.83 3.1 12.56 3.44 7.14 10.01 12.5 17.75 14.5 2.68.69 5.64 1.07 9.44 1.25 1.61.07 18.02.12 34.44.12 16.42 0 32.84-.02 34.41-.1 4.4-.207 6.955-.55 9.78-1.28 7.79-2.01 14.24-7.29 17.75-14.53 1.765-3.64 2.66-7.18 3.065-12.317.088-1.12.125-18.977.125-36.81 0-17.836-.04-35.66-.128-36.78-.41-5.22-1.305-8.73-3.127-12.44-1.495-3.037-3.155-5.305-5.565-7.624C116.9 4 111.64 1.5 105.372.596 102.335.157 101.73.027 86.19 0H65.03z" transform="translate(1.004 1)"/><path fill="#fff" d="M66.004 18c-13.036 0-14.672.057-19.792.29-5.11.234-8.598 1.043-11.65 2.23-3.157 1.226-5.835 2.866-8.503 5.535-2.67 2.668-4.31 5.346-5.54 8.502-1.19 3.053-2 6.542-2.23 11.65C18.06 51.327 18 52.964 18 66s.058 14.667.29 19.787c.235 5.11 1.044 8.598 2.23 11.65 1.227 3.157 2.867 5.835 5.536 8.503 2.667 2.67 5.345 4.314 8.5 5.54 3.054 1.187 6.543 1.996 11.652 2.23 5.12.233 6.755.29 19.79.29 13.037 0 14.668-.057 19.788-.29 5.11-.234 8.602-1.043 11.656-2.23 3.156-1.226 5.83-2.87 8.497-5.54 2.67-2.668 4.31-5.346 5.54-8.502 1.18-3.053 1.99-6.542 2.23-11.65.23-5.12.29-6.752.29-19.788 0-13.036-.06-14.672-.29-19.792-.24-5.11-1.05-8.598-2.23-11.65-1.23-3.157-2.87-5.835-5.54-8.503-2.67-2.67-5.34-4.31-8.5-5.535-3.06-1.187-6.55-1.996-11.66-2.23-5.12-.233-6.75-.29-19.79-.29zm-4.306 8.65c1.278-.002 2.704 0 4.306 0 12.816 0 14.335.046 19.396.276 4.68.214 7.22.996 8.912 1.653 2.24.87 3.837 1.91 5.516 3.59 1.68 1.68 2.72 3.28 3.592 5.52.657 1.69 1.44 4.23 1.653 8.91.23 5.06.28 6.58.28 19.39s-.05 14.33-.28 19.39c-.214 4.68-.996 7.22-1.653 8.91-.87 2.24-1.912 3.835-3.592 5.514-1.68 1.68-3.275 2.72-5.516 3.59-1.69.66-4.232 1.44-8.912 1.654-5.06.23-6.58.28-19.396.28-12.817 0-14.336-.05-19.396-.28-4.68-.216-7.22-.998-8.913-1.655-2.24-.87-3.84-1.91-5.52-3.59-1.68-1.68-2.72-3.276-3.592-5.517-.657-1.69-1.44-4.23-1.653-8.91-.23-5.06-.276-6.58-.276-19.398s.046-14.33.276-19.39c.214-4.68.996-7.22 1.653-8.912.87-2.24 1.912-3.84 3.592-5.52 1.68-1.68 3.28-2.72 5.52-3.592 1.692-.66 4.233-1.44 8.913-1.655 4.428-.2 6.144-.26 15.09-.27zm29.928 7.97c-3.18 0-5.76 2.577-5.76 5.758 0 3.18 2.58 5.76 5.76 5.76 3.18 0 5.76-2.58 5.76-5.76 0-3.18-2.58-5.76-5.76-5.76zm-25.622 6.73c-13.613 0-24.65 11.037-24.65 24.65 0 13.613 11.037 24.645 24.65 24.645C79.617 90.645 90.65 79.613 90.65 66S79.616 41.35 66.003 41.35zm0 8.65c8.836 0 16 7.163 16 16 0 8.836-7.164 16-16 16-8.837 0-16-7.164-16-16 0-8.837 7.163-16 16-16z"/></svg>
                                            <span>Instagram</span>
                                        </a> --}}
                                        
                                    </div>

                                    {{-- Footer --}}
                                    {{-- <div class="flex flex-wrap justify-between items-center">
                                        <a href="#" class="px-4 py-2 font-bold text-lg text-white bg-red-600 rounded-bl-xl"><i class="fas fa-arrow-left mr-2"></i>Cancel</a>
                                        <a href="#" class="px-4 py-2 font-bold text-lg text-white bg-green-550 rounded-br-xl">Continue<i class="fas fa-arrow-right ml-2"></i></a>
                                    </div> --}}
        
        {{-- <a href="#" rel="modal:close">Close</a> --}}
    </div>
    {{-- @push('script_s')
        <script>
            
            window.addEventListener('ogDataUpdate', event => {

                var link1 = document.querySelector('meta[property="og:url"]');
                if(typeof(link1) != 'undefined' && link1 != null)
                {
                    link1.remove();
                }
                
                var link = document.createElement('meta');
                link.setAttribute('property', 'og:url');
                link.content = @this.get('og_url');
                document.getElementsByTagName('head')[0].appendChild(link);

                
                // var link = document.createElement('meta');
                // link.setAttribute('property', 'og:type');
                // link.content = @this.get('og_type');
                // document.getElementsByTagName('head')[0].appendChild(link);

                var link1 = document.querySelector('meta[property="og:title"]');
                if(typeof(link1) != 'undefined' && link1 != null)
                {
                    link1.remove();
                }
                var link = document.createElement('meta');
                link.setAttribute('property', 'og:title');
                link.content = @this.get('og_title');
                document.getElementsByTagName('head')[0].appendChild(link);

                var link1 = document.querySelector('meta[property="og:description"]');
                if(typeof(link1) != 'undefined' && link1 != null)
                {
                    link1.remove();
                }
                var link = document.createElement('meta');
                link.setAttribute('property', 'og:description');
                link.content = @this.get('og_description');
                document.getElementsByTagName('head')[0].appendChild(link);

                var link1 = document.querySelector('meta[property="og:image"]');
                if(typeof(link1) != 'undefined' && link1 != null)
                {
                    link1.remove();
                }
                var link = document.createElement('meta');
                link.setAttribute('property', 'og:image');
                link.content = @this.get('og_image');
                document.getElementsByTagName('head')[0].appendChild(link);

                var link1 = document.querySelector('meta[property="article:author"]');
                if(typeof(link1) != 'undefined' && link1 != null)
                {
                    link1.remove();
                }
                var link = document.createElement('meta');
                link.setAttribute('property', 'article:author');
                link.content = @this.get('article_author');
                document.getElementsByTagName('head')[0].appendChild(link);

                alert('All Done');
            
            });
        </script>
    @endpush --}}