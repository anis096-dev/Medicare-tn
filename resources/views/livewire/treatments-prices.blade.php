<div class="p-6">
    {{--The data table--}}
    <div class="flex flex-col">
        <div class="mb-1">
            <div class="flex items-center sm:justify-end justify-center px-4 py-3 text-right sm:px-8">
                &nbsp;
                <select class="border border-gray-300 text-gray-600 h-14 pl-5 pr-10 mr-1 rounded bg-white hover:border-gray-400 focus:outline-none appearance-none" wire:model="perPage">
                    <option>10</option>
                    <option>15</option>
                    <option>25</option>
                </select>
                <input wire:model="search" wire:click="alertInfo" type="text" class="h-14 sm:w-96 md:pr-8 sm:pl-10 rounded focus:shadow focus:outline-none" placeholder="Search...">
                <button class="-ml-8" wire:click="searchClear">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{__('Specialty')}}</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{__('Name')}}</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{__('Price/Day')}}</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{__('Price/Night')}}</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{__('Price/Weekend')}}</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">                           
                                @forelse ($data as $item)
                                    <tr>
                                        <td class="px-6 py-2">{{ $item->specialty }}</td>
                                        <td class="px-6 py-2">{{ $item->name }}</td>
                                        <td class="px-6 py-2"><span class="bg-red-500 font-bold text-white rounded-md p-1">{{ $item->price_day }} TND</span></td>
                                        <td class="px-6 py-2"><span class="bg-blue-500 font-bold text-white rounded-md p-1">{{ $item->price_night }} TND</span></td>
                                        <td class="px-6 py-2"><span class="bg-green-500 font-bold text-white rounded-md p-1">{{ $item->price_weekend }} TND</span></td>
                                    </tr>
                                @empty
                                <tr>
                                    <td class="px-6 py-4 text-sm whitespace-no-wrap" colspan="4">No Results Found</td>
                                </tr>
                                @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-5">
    {{ $data->links() }}
    </div>
</div>
