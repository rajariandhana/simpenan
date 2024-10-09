<x-layout>
    @if (session('success'))
        <div class="bg-green-200 border border-green-500 text-green-800 px-4 py-2 rounded-md shadow-md w-fit">
            {{ session('success') }}
        </div>
    @endif
    {{-- @dump($warehouses) --}}
        @if ($warehouses->isEmpty())
        <div class="bg-white border px-4 py-2 rounded-md shadow-md w-fit">
            No warehouse available!
        </div>
        @else
                <table class="text-sm text-left rtl:text-right text-gray-500 bg-white p-4 w-full rounded-md shadow-md">
                    <thead class="text-xs text-gray-700 uppercase border-b-2 border-gray-200">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Warehouse
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($warehouses as $warehouse)
                            <tr class="bg-white border-b">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $warehouse->name }}
                                </th>
                                <td class="px-6 py-4 flex items-center gap-x-8">                                          
                                    </a>
                                    <a href="/warehouse/{{$warehouse->id}}"
                                        class="">
                                        VIEW
                                        {{-- <svg class="w-6 h-6 text-rose-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                        </svg>                           --}}
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
        @endif
</x-layout>
