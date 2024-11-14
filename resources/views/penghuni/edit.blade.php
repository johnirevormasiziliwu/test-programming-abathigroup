@extends('layout.main')

@section('content')
    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center px-6 py-8 mx-auto md:h-screen lg:py-0">

            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Update Data Penghuni
                    </h1>

                    <form class="space-y-4 md:space-y-6" action="{{ route('penghuni.update', $penghuni) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div>
                            <label for="apartemen_id"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apartemen</label>
                            <select name="apartemen_id" id="apartemen_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                                <option value="">Pilih Apartemen</option>
                                @foreach($apartemens as $apartemen)
                                    <option value="{{ $apartemen->id }}" 
                                            @if($penghuni->apartemen_id == $apartemen->id) selected @endif>
                                        {{ $apartemen->nomor_apartemen }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div>
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                            <input type="text" name="name" id="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Nama Penghuni" value="{{ old('name', $penghuni->name) }}" required>
                        </div>

                        <div>
                            <label for="jenis_kelamin"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="jenis_kelamin"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                                <option value="L" @if($penghuni->jenis_kelamin == 'L') selected @endif>Laki-laki</option>
                                <option value="P" @if($penghuni->jenis_kelamin == 'P') selected @endif>Perempuan</option>
                            </select>
                        </div>

                        <div>
                            <label for="tanggal_lahir"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                value="{{ old('tanggal_lahir', $penghuni->tanggal_lahir) }}" required>
                        </div>

                        <div>
                            <label for="umur"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Umur</label>
                            <input type="number" name="umur" id="umur"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Umur" value="{{ old('umur', $penghuni->umur) }}" required>
                        </div>

                        <div>
                            <label for="status"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                            <select name="status" id="status"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                                <option value="menikah" @if($penghuni->status == 'menikah') selected @endif>Menikah</option>
                                <option value="belum menikah" @if($penghuni->status == 'belum menikah') selected @endif>Belum Menikah</option>
                            </select>
                        </div>

                        <div class="button">
													<a href="/penghuni"
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
