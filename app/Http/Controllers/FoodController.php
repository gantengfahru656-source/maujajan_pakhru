<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FoodController extends Controller
{
    /**
     * Menampilkan semua data makanan.
     */
    public function index()
    {
        $foods = Food::latest()->paginate(10);

        return view('admin.foods.index', compact('foods'));
    }

    /**
     * Menampilkan form tambah makanan.
     */
    public function create()
    {
        return view('admin.foods.create');
    }

    /**
     * Menyimpan makanan baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'category'    => 'required|in:Makanan,Minuman,Cemilan',
            'price'       => 'required|numeric|min:0',
            'description' => 'required|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('foods', 'public');
        }

        Food::create([
            'name'        => $request->name,
            'category'    => $request->category,
            'price'       => $request->price,
            'description' => $request->description,
            'image'       => $imagePath,
        ]);

        return redirect()
            ->route('foods.index')
            ->with('success', 'Data makanan berhasil ditambahkan!');
    }

    /**
     * Menampilkan form edit makanan.
     */
    public function edit(Food $food)
    {
        return view('admin.foods.edit', compact('food'));
    }

    /**
     * Memperbarui data makanan.
     */
    public function update(Request $request, Food $food)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'category'    => 'required|in:Makanan,Minuman,Cemilan',
            'price'       => 'required|numeric|min:0',
            'description' => 'required|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imagePath = $food->image;

        // Jika upload gambar baru
        if ($request->hasFile('image')) {

            // Hapus gambar lama
            if (
                $food->image &&
                Storage::disk('public')->exists($food->image)
            ) {
                Storage::disk('public')->delete($food->image);
            }

            // Simpan gambar baru
            $imagePath = $request->file('image')->store('foods', 'public');
        }

        // Update data
        $food->update([
            'name'        => $request->name,
            'category'    => $request->category,
            'price'       => $request->price,
            'description' => $request->description,
            'image'       => $imagePath,
        ]);

        // Kembali ke halaman daftar makanan
        return redirect()
            ->route('foods.index')
            ->with('success', 'Data makanan berhasil diperbarui!');
    }

    /**
     * Menghapus makanan.
     */
    public function destroy(Food $food)
    {
        // Hapus gambar dari storage
        if (
            $food->image &&
            Storage::disk('public')->exists($food->image)
        ) {
            Storage::disk('public')->delete($food->image);
        }

        // Hapus data makanan
        $food->delete();

        // Kembali ke halaman daftar makanan
        return redirect()
            ->route('foods.index')
            ->with('success', 'Data makanan berhasil dihapus!');
    }
}