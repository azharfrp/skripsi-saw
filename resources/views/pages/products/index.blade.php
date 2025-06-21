@extends('layouts.front')
@section('title', 'Product')
@section('content')
    <section class="cta">
        <div class="cta-content">
            <div class="container-fluid px-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Katalog Produk</div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="table" class="table table-bordered table-hover" style="width:100%"></table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('script')
    <script>
        $(document).ready(function(){
            $("#table").DataTable({
                ordering: true,
                processing: true,
                serverSide: true,
                ajax: { // Menggunakan ajax
                    type: "GET", // Menggunakan HTTP Method Get
                    url: "{!! url()->full() !!}", // Memanggil url saat ini
                },
                columns: [
                    {
                        title: "No",
                        render: function(data, type, row, meta){
                            return `${ meta.row + meta.settings._iDisplayStart + 1 }`;
                        },
                    },
                    {
                        title: "Aksi",
                        render: function(data, type, row, meta){
                            // Karena url mengambil dari row.id yang tidak dapat diakses oleh php maka urlnya ditampung kedalam variable url dulu
                            // Saat url ditampung akan menggunakan placeholder 'dataID' yang kemudian nanti diganti menjadi id data productnya
                            let url = (`{{ route('product.detail', ['id' => 'dataID']) }}`).replace('dataID', row.id);

                            // Tampilkan link
                            return `<a href="${ url }" class="btn btn-sm btn-link">Lihat Detail</a>`;
                        },
                    },
                    {
                        title: "Foto Produk",
                        render: function(data, type, row, meta){
                            // Karena url mengambil dari row.thumbnail_path yang tidak dapat diakses oleh php maka urlnya ditampung kedalam variable url dulu
                            // Saat url ditampung akan menggunakan placeholder 'imageID' yang kemudian nanti diganti menjadi id data thumbnail_path productnya
                            let url = (`{{ 'imageID' }}`).replace('imageID', row.thumbnail_path);

                            // Tampilkan link
                            return `<img src="${ url }" class="img-fluid" style="object-fit: cover;">`;
                        },
                    },
                    {
                        title: "Brand",
                        data: "brand",
                    },
                    {
                        title: "Model",
                        data: "model",
                    },
                    {
                        title: "Price",
                        data: "price",
                        render: function(data, type, row){
                            return `IDR ${ row.price.toLocaleString() }`;
                        },
                    },
                    {
                        title: "Performance",
                        data: "performance",
                        render: function(data, type, row){
                            return `${ row.performance.toLocaleString() }`;
                        },
                    },
                    {
                        title: "Battery",
                        data: "battery",
                        render: function(data, type, row){
                            return `${ row.battery.toLocaleString() } mAH`;
                        },
                    },
                    {
                        title: "Camera",
                        data: "camera",
                        render: function(data, type, row){
                            return `${ row.camera.toLocaleString() } MP`;
                        },
                    },
                    {
                        title: "Storage",
                        data: "storage",
                        render: function(data, type, row){
                            return `${ row.storage.toLocaleString() } GB`;
                        },
                    },
                ],
            });
        });
    </script>
@endpush