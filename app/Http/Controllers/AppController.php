<?php

namespace App\Http\Controllers;

// Load model
use App\Models\Brand;
use App\Models\Product;

// Load internal component
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

// Load external component
use Yajra\DataTables\Facades\DataTables;

class AppController extends Controller{
    // Index
    public function index(){
        return view('pages/app/index');
    }

    // Product
    public function product(){
        // Mengambil seluruh data product beserta brandnya
        // Ref: Didalam model "Product" ada fungsi relasi bernama brand()
        // Ref: Data disortir berdasarkan "id" secara descending -- Dari terbaru ke terlama
        $products = Product::with(['brand'])->orderBy('id', 'DESC')->get();

        $i = 0;
        foreach($products as $product){
            // Menyajikan item kedalam sebuah array baru agar lebih rapi
            $results[$i] = array(
                'id'                => $products[$i]['id'],
                'brand'             => $products[$i]['brand']['name'], // Load array relation "brand" dulu, kemudian array nama brandnya
                'model'             => $products[$i]['model'],
                'price'             => $products[$i]['price'],
                'performance'       => $products[$i]['performance'],
                'battery'           => $products[$i]['battery'],
                'camera'            => $products[$i]['camera'],
                'storage'           => $products[$i]['storage'],
                'thumbnail_path'    => asset($products[$i]['thumbnail_path']),
            );

            // Loop $i array key
            $i++;
        }

        // Tampilkan data dengan format datatable
        if(request()->ajax()){ // Data di load menggunakan ajax oleh datatable | Di view ada kode seperti ini = "url: "{!! url()->full() !!}""
            return DataTables::of($results)->toJson();
        }

        // Tampilkan tampilan
        return view('pages/app/list-product');
    }

    // Product Add
    public function productAdd(){
        // Load data brand
        $brands = Brand::get();

        // Tampilkan tampilan beserta data yang dibutuhkan
        return view('pages/app/add-product', [
            'brands' => $brands,
        ]);
    }

    public function productAddPost(Request $request){
        // Validasi input
        $request->validate([
            'brand'             => ['required', 'integer'],
            'model'             => ['required', 'string'],
            'price'             => ['required', 'integer'],
            'performance'       => ['required', 'integer'],
            'battery'           => ['required', 'integer'],
            'camera'            => ['required', 'integer'],
            'storage'           => ['required', 'integer'],
            'thumbnail_path'    => ['required', 'file'],
        ]);

        // Ambil thumbnail
        $thumbnail = $request->file('thumbnail_path');

        // Folder thumbnail
        $folderThumbnail = 'asset/phone';

        // Pindahkan thumbnail
        $pathThumbnail = $thumbnail->move($folderThumbnail, $thumbnail->getClientOriginalName());

        // Create data baru
        Product::create([
            'brand_id'          => $request->brand,
            'model'             => $request->model,
            'price'             => $request->price,
            'performance'       => $request->performance,
            'battery'           => $request->battery,
            'camera'            => $request->camera,
            'storage'           => $request->storage,
            'thumbnail_path'    => $pathThumbnail,
        ]);

        // Redirect jika aksi berhasil
        return redirect()->route('app.product.list')->with('class', 'success')->with('message', 'Berhasil menambah produk baru.');
    }

    // Product Edit
    public function productEdit($id){
        // Load data brand
        $brands = Brand::get();

        // Load data product
        $products = Product::findOrFail($id);

        // Tampilkan tampilan beserta data yang dibutuhkan
        return view('pages/app/edit-product', [
            'brands'    => $brands,
            'products'  => $products,
        ]);
    }

    public function productEditPost(Request $request, $id){
        // Validasi input
        $request->validate([
            'brand'             => ['required', 'integer'],
            'model'             => ['required', 'string'],
            'price'             => ['required', 'integer'],
            'performance'       => ['required', 'integer'],
            'battery'           => ['required', 'integer'],
            'camera'            => ['required', 'integer'],
            'storage'           => ['required', 'integer'],
            'thumbnail_path'    => ['nullable', 'file'],
        ]);

        // Cari data
        $product = Product::find($id);
        
        // Update data
        $product->update([
            'brand_id'      => $request->brand,
            'model'         => $request->model,
            'price'         => $request->price,
            'performance'   => $request->performance,
            'battery'       => $request->battery,
            'camera'        => $request->camera,
            'storage'       => $request->storage,
        ]);

        // Handle update jika upload thumbnail
        if($request->hasFile('thumbnail_path')){
            // Delete file lama menggunakan try-catch untuk handle jika filenya tidak ada
            try{ unlink($product->thumbnail_path); } catch(\Throwable $th){}

            // Ambil thumbnail
            $thumbnail = $request->file('thumbnail_path');

            // Folder thumbnail
            $folderThumbnail = 'asset/phone';

            // Pindahkan thumbnail
            $pathThumbnail = $thumbnail->move($folderThumbnail, $thumbnail->getClientOriginalName());

            // Update path thumbnail
            $product->update([
                'thumbnail_path' => $pathThumbnail,
            ]);
        }

        // Redirect jika aksi berhasil
        return redirect()->route('app.product.list')->with('class', 'success')->with('message', 'Berhasil mengubah detail produk.');
    }

    // Product Delete
    public function productDelete($id){
        // Load data product
        $products = Product::findOrFail($id);

        // Delete data product
        $products->delete();

        // Redirect jika aksi berhasil
        return redirect()->route('app.product.list')->with('class', 'success')->with('message', 'Berhasil menghapus produk.');
    }
}
