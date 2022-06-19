<section class="text-gray-600 body-font relative">
  <div class="container px-5 py-24 mx-auto">
    <div class="flex flex-col text-center w-full mb-12">
      <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">{{__('Contact Us')}}</h1>
      <p class="lg:w-2/3 mx-auto leading-relaxed text-base">{{__('for all enquiries, please email us using the form below!')}}</p>
    </div>
    <div class="lg:w-1/2 md:w-2/3 mx-auto">
      <div class="flex flex-wrap -m-2">
        <div class="p-2 w-1/2">
          <div class="relative">
            <label for="name" class="leading-7 text-sm text-gray-600">{{__('Name')}}</label>
            <input wire:model.lazy="name" type="text" class="w-full mb-1 bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            @error('name') <span class="text-xs text-white bg-red-300 rounded-xl p-1">{{ $message }}</span> @enderror
          </div>
        </div>
        <div class="p-2 w-1/2">
          <div class="relative">
            <label for="email" class="leading-7 text-sm text-gray-600">{{__('Email')}}</label>
            <input wire:model.lazy="email" type="email" class="w-full mb-1 bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            @error('email') <span class="text-xs text-white bg-red-300 rounded-xl p-1">{{ $message }}</span> @enderror
          </div>
        </div>
        <div class="p-2 w-full">
          <label for="message" class="leading-7 text-sm text-gray-600">{{__('Message')}}</label>
          <textarea wire:model.lazy="message" class="w-full mb-1 bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
          @error('message') <span class="text-xs text-white bg-red-300 rounded-xl p-1">{{ $message }}</span> @enderror
        </div>
        <div class="p-2 w-full">
          <button class="flex mx-auto text-white bg-blue-500 border-0 py-2 px-8 focus:outline-none hover:bg-blue-600 rounded text-lg">{{__('Send')}}</button>
          <p class="text-center text-xs text-gray-500 mt-3">{{__('We will be happy to contacting us!!.')}}</p>
        </div>
        <div class="p-2 w-full pt-8 mt-8 border-t border-gray-200 text-center">
          <a class="text-blue-500">admin@medicare.tn</a>
          <p class="leading-normal my-5">17 AV Farhat Hached.
            <br>Jendubah 8100.
          </p>
        </div>
      </div>
    </div>
  </div>
</section>