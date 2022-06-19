<section class=" text-gray-600 body-font">
    <div class="bg-gray-100 dark:bg-gray-900">
      <div class="container mx-auto">
          <div role="article" class="bg-gray-100 dark:bg-gray-900 py-12 md:px-8">
              <div class="px-4 xl:px-0 py-10">
                <div class="flex flex-col lg:flex-row flex-wrap">
                    <div class="mt-4 lg:mt-0 lg:w-3/5">
                        <div>
                            <h2 class="text-3xl ml-2 lg:ml-0 lg:text-4xl font-bold text-gray-900 dark:text-white tracking-normal lg:w-11/12">Frequently asked questions</h2>
                            <p class="mt-2 text-gray-500 md:text-lg">
                                You will find the necessary Question here & there answers!!    
                            </p>
                        </div>
                    </div>
                    <div class="lg:w-2/5 flex mt-10 ml-2 lg:ml-0 lg:mt-0 lg:justify-end">
                        <div class="pt-2 relative text-gray-600">
                            <input class="focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none" type="search" name="search" placeholder="Search" />
                            <button type="submit" class="focus:ring-2 focus:ring-offset-2 text-gray-600 focus:text-indigo-700 dark:text-indigo-400 focus:rounded-full focus:bg-gray-100 focus:ring-indigo-700 bg-white focus:outline-none absolute right-0 top-0 mt-5 mr-4">
                            <img class="h-4 w-4" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/faq-1-svg1.svg" alt="search">
                            </button>
                        </div>
                    </div>
                </div>
              </div>

              <div class="px-6 xl:px-0">
                  <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 pb-6 gap-8">
                    @forelse (App\Models\Faq::all()->unique('category') as $item)                      
                    <div role="cell" class="bg-gray-100 dark:bg-gray-800 ">
                        <div class="bg-white p-5 roun dark:bg-gray-800 ded-md relative h-full w-full">
                            <h1 class="pb-4 text-2xl dark:text-white font-semibold">{{$item->category}}</h1>
                            <div class="my-5">
                                <div class="flex items-center pb-4 dark:border-gray-700 cursor-pointer w-full space-x-3">
    
                                    <details class="group" close>
                                        <summary class="flex items-center justify-between p-4 rounded-lg cursor-pointer bg-blue-50">
                                            <h5 class="font-medium text-gray-900">
                                                {{$item->question}}
                                            </h5>
                                    
                                            <svg
                                            class="flex-shrink-0 ml-1.5 w-5 h-5 transition duration-300 group-open:-rotate-180"
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M19 9l-7 7-7-7"
                                            />
                                            </svg>
                                        </summary>
                                    
                                        <p class="px-4 mt-4 leading-relaxed text-gray-700">
                                            {{$item->answer}}
                                        </p>
                                    </details>
                    
                                    {{-- <a class="hover:text-indigo-500 hover:underline absolute bottom-5 text-sm text-indigo-700 dark:text-indigo-400 font-bold cursor-pointer flex items-center" href="javascript:void(0)">
                                        <p>Show All</p>
                                        <div>
                                            <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/faq-1-svg3.svg" alt="arrow">
                                        </div>
                                    </a>  --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty           
                    <h2 class="px-6 py-4 text-sm whitespace-no-wrap" colspan="4">No Results Found</h2>       
                    @endforelse
              </div> 
          </div>
      </div>
    </div>
</section>
