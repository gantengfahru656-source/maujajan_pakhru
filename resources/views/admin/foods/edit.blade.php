<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Makanan
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form action="{{ route('foods.update', $food) }}"
                          method="POST"
                          enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        <!-- Nama Makanan -->
                        <div class="mb-4">

                            <label class="block mb-2 font-medium">
                                Nama Makanan
                            </label>

                            <input
                                type="text"
                                name="name"
                                value="{{ old('name', $food->name) }}"
                                class="w-full border border-gray-300 rounded-md p-2 text-gray-900"
                                required
                            >

                        </div>


                        <!-- Kategori -->
                        <div class="mb-4">

                            <label class="block mb-2 font-medium">
                                Kategori
                            </label>

                            <select
                                name="category"
                                class="w-full border border-gray-300 rounded-md p-2 text-gray-900"
                                required
                            >

                                <option value="Makanan"
                                    {{ old('category', $food->category) == 'Makanan' ? 'selected' : '' }}>
                                    Makanan
                                </option>

                                <option value="Minuman"
                                    {{ old('category', $food->category) == 'Minuman' ? 'selected' : '' }}>
                                    Minuman
                                </option>

                                <option value="Cemilan"
                                    {{ old('category', $food->category) == 'Cemilan' ? 'selected' : '' }}>
                                    Cemilan
                                </option>

                            </select>

                        </div>


                        <!-- Harga -->
                        <div class="mb-4">

                            <label class="block mb-2 font-medium">
                                Harga
                            </label>

                            <input
                                type="number"
                                name="price"
                                value="{{ old('price', $food->price) }}"
                                class="w-full border border-gray-300 rounded-md p-2 text-gray-900"
                                required
                            >

                        </div>


                        <!-- Deskripsi -->
                        <div class="mb-4">

                            <label class="block mb-2 font-medium">
                                Deskripsi
                            </label>

                            <textarea
                                name="description"
                                rows="4"
                                class="w-full border border-gray-300 rounded-md p-2 text-gray-900"
                            >{{ old('description', $food->description) }}</textarea>

                        </div>


                        <!-- Gambar -->
                        <div class="mb-6">

                            <label class="block mb-2 font-medium">
                                Gambar
                            </label>


                            @if ($food->image)

                                <div class="mb-3">

                                    <p class="text-sm mb-2">
                                        Gambar Saat Ini:
                                    </p>

                                    <img
                                        src="{{ asset('storage/' . $food->image) }}"
                                        alt="{{ $food->name }}"
                                        class="w-32 h-32 object-cover rounded-md border"
                                    >

                                </div>

                            @endif


                            <input
                                type="file"
                                name="image"
                                accept=".jpg,.jpeg,.png,.webp"
                                class="w-full border border-gray-300 rounded-md p-2"
                            >

                            <p class="text-sm text-gray-500 mt-2">
                                Format: JPG, JPEG, PNG, WEBP. Maksimal 2 MB.
                            </p>

                        </div>


                        <!-- TOMBOL -->
                        <div
                            class="mt-6"
                            style="display: flex; gap: 12px; align-items: center;"
                        >

                            <!-- Tombol Kembali -->
                            <a
                                href="{{ route('foods.index') }}"
                                style="
                                    display: inline-block;
                                    background-color: #6b7280;
                                    color: white;
                                    padding: 10px 20px;
                                    border-radius: 6px;
                                    text-decoration: none;
                                "
                            >
                                Kembali
                            </a>


                            <!-- Tombol Simpan -->
                            <button
                                type="submit"
                                style="
                                    display: inline-block !important;
                                    background-color: #2563eb !important;
                                    color: white !important;
                                    padding: 10px 20px !important;
                                    border-radius: 6px !important;
                                    border: none !important;
                                    font-size: 16px !important;
                                    font-weight: 600 !important;
                                    cursor: pointer !important;
                                "
                            >
                                Simpan Perubahan
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>
    </div>

</x-app-layout>