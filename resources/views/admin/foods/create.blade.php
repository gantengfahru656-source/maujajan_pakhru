<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Makanan
        </h2>
    </x-slot>

    <div class="py-12 max-w-2xl mx-auto sm:px-6 lg:px-8">

        <form action="{{ route('foods.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="bg-white p-6 rounded-lg shadow-sm border">

                <div class="mb-4">
                    <label class="block font-medium mb-1">
                        Nama Makanan
                    </label>

                    <input
                        type="text"
                        name="name"
                        class="w-full border rounded p-2"
                        required
                    >
                </div>

                <div class="mb-4">
                    <label class="block font-medium mb-1">
                        Kategori
                    </label>

                    <select
                        name="category"
                        class="w-full border rounded p-2"
                        required
                    >
                        <option value="">-- Pilih Kategori --</option>
                        <option value="Makanan">Makanan</option>
                        <option value="Minuman">Minuman</option>
                        <option value="Cemilan">Cemilan</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block font-medium mb-1">
                        Harga (Rp)
                    </label>

                    <input
                        type="number"
                        name="price"
                        class="w-full border rounded p-2"
                        required
                    >
                </div>

                <div class="mb-4">
                    <label class="block font-medium mb-1">
                        Deskripsi
                    </label>

                    <textarea
                        name="description"
                        class="w-full border rounded p-2"
                        rows="4"
                        required
                    ></textarea>
                </div>

                <div class="mb-4">
                    <label class="block font-medium mb-1">
                        Gambar
                    </label>

                    <input
                        type="file"
                        name="image"
                        class="w-full border rounded p-2"
                    >
                </div>

                <!-- TOMBOL -->
                <div style="display: flex; gap: 10px; margin-top: 20px;">

                    <a
                        href="{{ route('foods.index') }}"
                        style="background-color: #6b7280; color: white; padding: 10px 24px; border-radius: 6px; text-decoration: none;"
                    >
                        Kembali
                    </a>

                    <button
                        type="submit"
                        style="background-color: #2563eb; color: white; padding: 10px 24px; border-radius: 6px; border: none; cursor: pointer;"
                    >
                        Simpan
                    </button>

                </div>

            </div>

        </form>

    </div>

</x-app-layout>