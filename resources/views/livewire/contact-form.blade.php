<div>
    <div class="container px-5 py-24 mx-auto flex sm:flex-nowrap flex-wrap">
        <div class="lg:w-2/3 md:w-1/2 bg-gray-300 rounded-lg overflow-hidden sm:mr-10 p-10 flex items-end justify-start relative">
          <iframe width="100%" height="100%" class="absolute inset-0" frameborder="0" title="map" marginheight="0" marginwidth="0" scrolling="no" 
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d25656.842368304155!2d8.761381942417746!3d36.50332026727691!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12fb124ea3099bff%3A0x6bef4f37f93342da!2sJendouba!5e0!3m2!1sfr!2stn!4v1621873402103!5m2!1sfr!2stn" 
          style="filter: grayscale(1) contrast(1.2) opacity(0.4);"></iframe>
          <div class="bg-white relative flex flex-wrap py-6 rounded shadow-md">
            <div class="lg:w-1/2 px-6">
              <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs">ADDRESS</h2>
              <p class="mt-1">17 AV Farhat Hached Jendubah 8100</p>
            </div>
            <div class="lg:w-1/2 px-6 mt-4 lg:mt-0">
              <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs">EMAIL</h2>
              <a class="text-indigo-500 leading-relaxed">admin@medicare.tn</a>
              <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs mt-4">PHONE</h2>
              <p class="leading-relaxed">+216-25219853</p>
            </div>
          </div>
        </div>
        <form wire:submit.prevent="saveMessage" class="lg:w-1/3 md:w-1/2 bg-white p-6 rounded-md flex flex-col md:ml-auto w-full md:py-8 mt-8 md:mt-0">
          <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">Contact Us</h2>
          <p class="leading-relaxed mb-5 text-gray-600">for all enquiries, please email us using the form below!</p>
          <div class="relative mb-4">
            <label for="name" class="leading-7 text-sm text-gray-600">Name</label>
            <input wire:model.lazy="name" type="text" class="w-full mb-1 bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            @error('name') <span class="text-xs text-white bg-red-300 rounded-xl p-1">{{ $message }}</span> @enderror
          </div>
          <div class="relative mb-4">
            <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
            <input wire:model.lazy="email" type="email" class="w-full mb-1 bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            @error('email') <span class="text-xs text-white bg-red-300 rounded-xl p-1">{{ $message }}</span> @enderror
          </div>
          <div class="relative mb-4">
            <label for="message" class="leading-7 text-sm text-gray-600">Message</label>
            <textarea wire:model.lazy="message" class="w-full mb-1 bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
            @error('message') <span class="text-xs text-white bg-red-300 rounded-xl p-1">{{ $message }}</span> @enderror
          </div>
          <button class="text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Send</button>
          <p class="text-xs text-gray-500 mt-3">We will be happy to contacting us!!.</p>
        </form>
    </div>
</div>
