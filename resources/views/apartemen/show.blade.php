@extends('layout.main')

@section('content')
    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Detail Apartemen
                    </h1>

                    <div class="space-y-4 md:space-y-6">
                      
                        <div>
                            <label for="nomor_apartemen"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor Apartemen</label>
                            <p class="bg-gray-100 text-sm text-gray-900 p-2 rounded-lg dark:bg-gray-700 dark:text-white">
                                {{ $apartemen->nomor_apartemen ?? 'N/A' }}
                            </p>
                        </div>

                       
                        <div>
                            <label for="lantai_apartemen"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lantai Apartemen</label>
                            <p class="bg-gray-100 text-sm text-gray-900 p-2 rounded-lg dark:bg-gray-700 dark:text-white">
                                {{ $apartemen->lantai_apartemen ?? 'N/A' }}
                            </p>
                        </div>

                       
                        <div>
                            <label for="status"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                            <p class="bg-gray-100 text-sm text-gray-900 p-2 rounded-lg dark:bg-gray-700 dark:text-white">
                                {{ ucfirst($apartemen->status) }}
                            </p>
                        </div>

                        <div class="flex space-x-4">
                            <a href="{{ route('apartemen.index') }}"
                                class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
