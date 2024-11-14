@extends('layout.main')

@section('content')
    <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">Data Penghuni</h1>
                    <div
                        class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                        <a href="{{ route('penghuni.create') }}" type="button"
                            class="flex items-center justify-center text-white bg-blue-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                            <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd"
                                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                            </svg>
                            Add product
                        </a>

                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 mt-8">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
														
                                <th scope="col" class="px-4 py-3">No</th>
                                <th scope="col" class="px-4 py-3">Nomor Apartemen</th>
                                <th scope="col" class="px-4 py-3">Nama</th>
                                <th scope="col" class="px-4 py-3">Jenis Kelamin</th>
                                <th scope="col" class="px-4 py-3">Tanggal Lahir</th>
                                <th scope="col" class="px-4 py-3">Umur</th>
                                <th scope="col" class="px-4 py-3">Status</th>
                                <th scope="col" class="px-4 py-3">Action</th>
                            </tr>
                        </thead>
                        @php
                            $no = 1;
                        @endphp
                        <tbody>
                            @foreach ($penghunis as $penghuni)
                                <tr class="border-b dark:border-gray-700 ">

                                    <th class="px-4 py-3">{{ $no++ }}</th>
                                    <th class=" py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $penghuni->name }}</th>
                                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">{{ $penghuni->jenis_kelamin }}</td>
                                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">{{ $penghuni->apartemen->nomor_apartemen }}</td>
                                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">{{ $penghuni->tanggal_lahir }}</td>
                                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">{{ $penghuni->umur }}</td>
                                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">{{ $penghuni->status }}</td>
                                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap flex items-center gap-5">
                                        <a href="{{ route('penghuni.edit', $penghuni) }}"
                                            class="bg-lime-500 hover:bg-lime-300 text-white font-semibold py-2 px-4 border border-gray-400 rounded shadow">
                                            Edit
                                        </a>
                                        <a href="{{ route('penghuni.show', $penghuni) }}"
                                            class="bg-lime-500 hover:bg-orange-600 text-white font-semibold py-2 px-4 border border-gray-400 rounded shadow">
                                            Detail
                                        </a>

                                        <form action="{{ route('penghuni.destroy', $penghuni) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 delete-btn text-white font-semibold py-2 px-4 border border-gray-400 rounded shadow">Delete</button>
                                        </form>
                                    </td>

                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    @include('script.delete')
@endsection
