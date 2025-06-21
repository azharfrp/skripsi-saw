@extends('layouts.app')
@section('title', 'List Product')
@section('content')
    @if(session()->has('class') && session()->has('message'))
        <div class="callout callout-{{ session()->get('class') }}">
            <span>{{ session()->get('message') }}</span>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="table" class="table table-bordered table-hover" style="width:100%"></table>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        $(document).ready(function(){
            $("#table").DataTable({
                ordering: false,
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
                    {
                        render: function(data, type, row, meta){
                            // Link Edit
                            const editLink = ("{{ route('app.product.edit', ['id' => 'placeholder']) }}").replace('placeholder', row.id);

                            return `<div class="btn-group" role="group" aria-label="Action Button">
                                <a href="${ editLink }" class="btn btn-sm btn-secondary"><i class="fas fa-edit"></i></a>
                                <a href="javascript:void(0)" id="btn-delete" data-id="${ row.id }" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                            </div>`;
                        },
                    },
                ],
            });

            // Upsert (Update or Insert)
            $('body').on('click', '#btn-delete', function(){
                // Get data id
                let dataID = $(this).data('id');

                // Confirm delete
                if(confirm('Yakin menghapus data?') == true){
                    // Delete data
                    window.location.href = ("{{ route('app.product.delete', ['id' => 'placeholder']) }}").replace('placeholder', dataID);
                }
            });
        });
    </script>
@endpush