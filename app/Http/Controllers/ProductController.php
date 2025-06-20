<?php

namespace App\Http\Controllers;

// Load model
use App\Models\Product;

// Load internal component
use Illuminate\Http\Request;

// Load external component
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller{
    // Fungsi index product
    public function index(){
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
        return view('pages/products/index');
    }

    // Fungsi detail product
    public function detail($id){
        // Mengambil seluruh data product beserta brandnya
        // Ref: Didalam model "Product" ada fungsi relasi bernama brand()
        // Ref: Data disortir berdasarkan "id" secara descending -- Dari terbaru ke terlama
        $products = Product::with(['brand'])->where('id', $id)->firstOrFail();

        // Menyajikan item kedalam sebuah array baru agar lebih rapi
        $results = array(
            'id'                => $products['id'],
            'brand'             => $products['brand']['name'], // Load array relation "brand" dulu, kemudian array nama brandnya
            'model'             => $products['model'],
            'price'             => $products['price'],
            'performance'       => $products['performance'],
            'battery'           => $products['battery'],
            'camera'            => $products['camera'],
            'storage'           => $products['storage'],
            'thumbnail_path'    => asset($products['thumbnail_path']),
        );

        // Tampilkan tampilan
        return view('pages/products/detail', [
            // Parse data kedalam input karena tidak menggunakan ajax
            'datas' => $results,
        ]);
    }
    
    // Fungsi rekomendasi
    public function recommendation(){
        // Tampilkan tampilan
        return view('pages/products/recommendation');
    }

    // Proses mengambil input user kemudian redirect ke route 'product.ranking' milik fungsi ranking() dibawah untuk menampilkan ranking rekomendasi
    public function proccess(Request $request){
        return redirect()->route('product.ranking', [
            'price'         => $request->price,
            'performance'   => $request->performance,
            'battery'       => $request->battery,
            'camera'        => $request->camera,
            'storage'       => $request->storage,
        ]);
    }

    // Fungsi ranking rekomendasi
    public function ranking(Request $request){
        // Mencoba untuk menjalankan parameter query
        try{
            // Mengambil seluruh data product beserta brandnya
            // Ref: Didalam model "Product" ada fungsi relasi bernama brand()
            $products = Product::with(['brand'])->get();

            // Step 1: Mendapatkan value dari input user
            $price = (int) $request->price;
            $performance = (int) $request->performance;
            $battery = (int) $request->battery;
            $camera = (int) $request->camera;
            $storage = (int) $request->storage;

            // Step 2: Menghitung total weight dari bobot kriteria yang diinput user
            $totalWeight = $price + $performance + $battery + $camera + $storage;

            // Step 3: Menghitung bobot dari masing-masing kriteria user, kemudian dibagi dengan total bobotnya
            $priceValue = $price / $totalWeight;
            $performanceValue = $performance / $totalWeight;
            $batteryValue = $battery / $totalWeight;
            $cameraValue = $camera / $totalWeight;
            $storageValue = $storage / $totalWeight;

            // Step 4: Mencari nilai terbesar atau terkecil pada setiap kriteria
            $priceMin = $products->min('price'); // Semakin murah maka semakin baik, sehingga menggunakan min
            $performanceMax = $products->max('performance'); // Semakin tinggi benchmark performanya maka semakin baik (benchmark dari antutu), sehingga menggunakan max
            $batteryMax = $products->max('battery'); // Semakin besar kapasitas battery maka semakin baik, sehingga menggunakan max
            $cameraMax = $products->max('camera'); // Semakin tinggi resolusi kamera maka semakin baik, sehingga menggunakan max
            $storageMax = $products->max('storage'); // Semakin besar penyimpanan maka semakin baik, sehingga menggunakan max

            // Step 5: Normalisasi kriteria berdasarkan cost/benefit
            $i = 0;
            foreach($products as $product){
                // Perhitungan min
                $priceNormalization = $priceMin / $product->price;
                
                // Perhitungan max
                $performanceNormalization = $product->performance / $performanceMax;
                $batteryNormalization = $product->battery / $batteryMax;
                $cameraNormalization = $product->camera / $cameraMax;
                $storageNormalization = $product->storage / $storageMax;
                
                // Simpan hasil normalisasi kedalam array $normalization
                $normalization[$i] = array($priceNormalization, $performanceNormalization, $batteryNormalization, $cameraNormalization, $storageNormalization);
                
                // Loop $i array key
                $i++;
            }

            // Step 6: Proses perhitungan dari nilai V
            $i = 0;
            foreach($normalization as $normal){
                // Menghitung nilai V untuk setiap product
                $vValue = (($normal[0] * $priceValue) + ($normal[1] * $performanceValue) + ($normal[2] * $batteryValue) + ($normal[3] * $cameraValue) + ($normal[4] * $storageValue));

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
                    'v_value'           => $vValue, // Simpan hasil masing-masing perhitungan nilai V sebagai referensi sortir rekomendasi
                );

                // Loop $i array key
                $i++;
            }

            // Menyortir data menggunakan multi-dimensional array berdasarkan kolom array 'v_value'
            array_multisort(array_column($results, 'v_value'), SORT_DESC, $results);

            // Tampilkan tampilan
            return view('pages/products/ranking', [
                'datas' => $results,
            ]);
        }

        // Jika salah satu parameter kosong maka redirect kembali ke halaman index product karena perhitungan butuh seluruh parameter terisi
        // Jika salah satu parameter kosong maka perhitungan akan error
        // Referensi: \routes\web.php
        catch(\Throwable $th){
            // throw $th;
            return redirect()->route('product.index');
        }
    }
}
