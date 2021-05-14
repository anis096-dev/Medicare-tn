<div>
    @if(session()->has('message'))
        <style>
            /*Toast open/load animation*/
            .alert-toast {
                -webkit-animation: slide-in-right 0.5s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
                        animation: slide-in-right 0.5s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
            }
            /*Toast close animation*/
            .alert-toast input:checked ~ * {
                -webkit-animation: fade-out-right 0.7s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
                        animation: fade-out-right 0.7s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
            }
            /* -------------------------------------------------------------
            * Animations generated using Animista * w: http://animista.net, 
            * ---------------------------------------------------------- */
            @-webkit-keyframes slide-in-top{0%{-webkit-transform:translateY(-1000px);transform:translateY(-1000px);opacity:0}100%{-webkit-transform:translateY(0);transform:translateY(0);opacity:1}}@keyframes slide-in-top{0%{-webkit-transform:translateY(-1000px);transform:translateY(-1000px);opacity:0}100%{-webkit-transform:translateY(0);transform:translateY(0);opacity:1}}@-webkit-keyframes slide-out-top{0%{-webkit-transform:translateY(0);transform:translateY(0);opacity:1}100%{-webkit-transform:translateY(-1000px);transform:translateY(-1000px);opacity:0}}@keyframes slide-out-top{0%{-webkit-transform:translateY(0);transform:translateY(0);opacity:1}100%{-webkit-transform:translateY(-1000px);transform:translateY(-1000px);opacity:0}}@-webkit-keyframes slide-in-bottom{0%{-webkit-transform:translateY(1000px);transform:translateY(1000px);opacity:0}100%{-webkit-transform:translateY(0);transform:translateY(0);opacity:1}}@keyframes slide-in-bottom{0%{-webkit-transform:translateY(1000px);transform:translateY(1000px);opacity:0}100%{-webkit-transform:translateY(0);transform:translateY(0);opacity:1}}@-webkit-keyframes slide-out-bottom{0%{-webkit-transform:translateY(0);transform:translateY(0);opacity:1}100%{-webkit-transform:translateY(1000px);transform:translateY(1000px);opacity:0}}@keyframes slide-out-bottom{0%{-webkit-transform:translateY(0);transform:translateY(0);opacity:1}100%{-webkit-transform:translateY(1000px);transform:translateY(1000px);opacity:0}}@-webkit-keyframes slide-in-right{0%{-webkit-transform:translateX(1000px);transform:translateX(1000px);opacity:0}100%{-webkit-transform:translateX(0);transform:translateX(0);opacity:1}}@keyframes slide-in-right{0%{-webkit-transform:translateX(1000px);transform:translateX(1000px);opacity:0}100%{-webkit-transform:translateX(0);transform:translateX(0);opacity:1}}@-webkit-keyframes fade-out-right{0%{-webkit-transform:translateX(0);transform:translateX(0);opacity:1}100%{-webkit-transform:translateX(50px);transform:translateX(50px);opacity:0}}@keyframes fade-out-right{0%{-webkit-transform:translateX(0);transform:translateX(0);opacity:1}100%{-webkit-transform:translateX(50px);transform:translateX(50px);opacity:0}}
        </style>

        <!--Toast-->
        <div class="alert-toast fixed bottom-0 right-0 m-8 w-5/6 md:w-full max-w-sm">
            <input type="checkbox" class="hidden" id="footertoast">

            <label class="close cursor-pointer flex items-start justify-between w-full p-2 bg-blue-500 h-24 rounded shadow-lg text-white" title="close" for="footertoast">
            {{session('message')}}            
            <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
            </svg>
            </label>
        </div>
    @endif
    @if((auth()->user()->name != $user->name))
    <section class="w-full px-8 pt-4 pb-10 xl:px-8">
        <div class="max-w-5xl mx-auto">
            <div class="flex flex-col items-center md:flex-row">

                <div class="w-full mt-16 md:mt-0">
                    <div class=" h-auto p-4 py-10 overflow-hidden bg-white border-b-2 border-gray-300 rounded-lg shadow-2xl px-7">
                        @auth
                            <div class="w-full space-y-5">
                                <p class="font-medium text-blue-500 uppercase">
                                    Rate {{$user->name}}
                                </p>
                            </div>
                            
                            @if($hideForm != true)
                                <form wire:submit.prevent="rate()">
                                    <div class="block max-w-3xl px-1 py-2 mx-auto">
                                        <div class="flex space-x-1 rating">
                                            <label for="star1">
                                                <input class="invisible" wire:model="rating" type="radio" id="star1" name="rating" value="1" />
                                                <svg class="cursor-pointer block w-8 h-8 @if($rating >= 1 ) text-yellow-500 @else text-grey @endif " fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                            </label>
                                            <label for="star2">
                                                <input class="invisible" wire:model="rating" type="radio" id="star2" name="rating" value="2" />
                                                <svg class="cursor-pointer block w-8 h-8 @if($rating >= 2 ) text-yellow-500 @else text-grey @endif " fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                            </label>
                                            <label for="star3">
                                                <input class="invisible" wire:model="rating" type="radio" id="star3" name="rating" value="3" />
                                                <svg class="cursor-pointer block w-8 h-8 @if($rating >= 3 ) text-yellow-500 @else text-grey @endif " fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                            </label>
                                            <label for="star4">
                                                <input class="invisible" wire:model="rating" type="radio" id="star4" name="rating" value="4" />
                                                <svg class="cursor-pointer block w-8 h-8 @if($rating >= 4 ) text-yellow-500 @else text-grey @endif " fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                            </label>
                                            <label for="star5">
                                                <input class="invisible" wire:model="rating" type="radio" id="star5" name="rating" value="5" />
                                                <svg class="cursor-pointer block w-8 h-8 @if($rating >= 5 ) text-yellow-500 @else text-grey @endif " fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                            </label>
                                        </div>
                                        <div class="my-5">
                                            @error('comment')
                                                <p class="mt-1 text-red-500">{{ $message }}</p>
                                            @enderror
                                            <textarea wire:model.lazy="comment" name="description" class="block w-full px-4 py-3 border-2 rounded-lg focus:border-blue-500 focus:outline-none" placeholder="Comment.."></textarea>
                                        </div>
                                    </div>
                                    <div class="block">
                                        <button type="submit" class="w-full px-3 py-4 font-medium text-white bg-blue-600 rounded-lg">Rate</button>
                                        @auth
                                            @if($currentId)
                                                <button type="submit" class="w-full px-3 py-4 mt-4 font-medium text-white bg-red-400 rounded-lg" wire:click.prevent="delete({{ $currentId }})" class="text-sm cursor-pointer">Delete</button>
                                            @endif
                                        @endauth
                                    </div>
                                </form>
                            @endif
                        @else
                            <div>
                                <div class="mb-8 text-center text-gray-600">
                                    You need to login in order to be able to rate {{$user->name}}!
                                </div>
                                <a href="/register"
                                    class="block px-5 py-2 mx-auto font-medium text-center text-gray-600 bg-white border rounded-lg shadow-sm focus:outline-none hover:bg-gray-100" 
                                >Register</a>
                            </div>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    <section class="pt-20 pb-24 overflow-hidden text-left bg-white">
        <div class="w-full px-20 mx-auto text-left md:px-10 max-w-7xl xl:px-16">
            <div class="box-border flex flex-col flex-wrap justify-center -mx-4 text-indigo-900">
                <div class="relative w-full mb-12 leading-6 text-left xl:flex-grow-0 xl:flex-shrink-0">
                    <h2 class="box-border mx-0 mt-0 font-sans text-4xl font-bold text-center text-indigo-900">
                        Ratings
                    </h2>
                </div>
            </div>
            <div class="box-border flex flex-wrap justify-start gap-10 -mx-4 text-start text-indigo-900 lg:gap-16 lg:justify-start lg:text-left">
                @forelse ($comments as $comment)
                    <div class="flex col-span-1">
                        <div class="relative flex-shrink-0 w-20 h-20 text-left">
                            <a href="{{ '@' . $comment->user->name }}">
                            </a>
                        </div>
                        <div class="relative md:px-4 lg:mb-16 leading-6 text-left ">
                            <div class="box-border text-lg font-medium text-gray-600">
                                {{ $comment->comment }}
                            </div>
                            <div class="box-border mt-5 text-lg font-semibold text-indigo-900 uppercase">
                                Rating: <strong>{{ $comment->rating }}</strong> ⭐
                                @auth
                                    @if(auth()->user()->id == $comment->user_id || auth()->user()->role == 'admin' )
                                        - <a wire:click.prevent="delete({{ $comment->id }})" class="text-sm cursor-pointer">Delete</a>
                                    @endif
                                @endauth
                            </div>
                            <div class="box-border text-left text-gray-700" style="quotes: auto;">
                                @if( $comment->user->role == 'E-health Care')
                                <a href="{{ $comment->user->id }}">
                                    <span class="text-blue-700 underline mr-2 uppercase">{{  $comment->user->name }}</span>
                                </a>  
                                @else
                                {{  $comment->user->name }}
                                @endif
                                <strong>{{  $comment->user->specialty }}</strong>
                            </div>
                        </div>
                    </div>
                @empty
                <div class="flex col-span-1">
                    <div class="relative px-4 mb-16 leading-6 text-left">
                        <div class="box-border text-lg font-medium text-gray-600">
                            No ratings
                        </div>
                    </div>
                </div>
                @endforelse
            </div>
    </section> 
</div>
