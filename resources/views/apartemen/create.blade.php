@extends('layout.main')
@section('content')
    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center  px-6 py-8 mx-auto md:h-screen lg:py-0">

            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0  xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Tambahkan Data Apartemen
                    </h1>

                    <form class="space-y-4 md:space-y-6" action="{{ route('apartemen.store') }}" method="POST">
                        @csrf
                        <div>
                            <label for="nomor_apartemen"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor Apartemen</label>
                            <input type="nomor_apartemen" name="nomor_apartemen" id="nomor_apartemen"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('nomor_apartemen') is-invalid @enderror"
                                placeholder="Nomor Apartemen" required="">

                                @error('nomor_apartemen')
                                    <div class="invalid-feedback text-red-500 text-sm mt-1">{{ $message }}</div>
                                @enderror
                        </div>
                        <div>
                            <label for="lantai_apartemen"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lantai
                                Apartemen</label>
                            <input type="number" name="lantai_apartemen" id="lantai_apartemen"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Inputkan Lantai Apartemen" required="">
                        </div>
                        <div>
                            <label for="status"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                            <select type="number" name="status" id="status"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required="">
                                <option value="">Pilih Status</option>
                                <option value="tersedia">Tersedia</option>
                                <option value="tidak_tersedia">Tidak Tersedia</option>
                                <option value="booking">Booking</option>
                            </select>
                        </div>
                        <div class="button">
                            <a href="/apartemen"
                                class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">Kembali</a>
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
