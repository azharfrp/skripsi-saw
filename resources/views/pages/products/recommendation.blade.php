@extends('layouts.front')
@section('title', 'Product Ranking')
@section('content')
    <section class="cta">
        <div class="cta-content">
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Hasil Pemilihan Kriteria</div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table" class="table table-bordered table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Brand</th>
                                        <th>Model</th>
                                        <th>Price</th>
                                        <th>Performance</th>
                                        <th>Battery</th>
                                        <th>Camera</th>
                                        <th>Storage</th>
                                    </tr>
                                </thead>
                            </table>
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
                ordering: false,
                processing: true,
                serverSide: true,
                ajax: { // Menggunakan ajax
                    type: "GET", // Menggunakan HTTP Method Get
                    url: "{!! url()->full() !!}", // Memanggil url saat ini
                },
                columns: [
                    {
                        render: function(data, type, row, meta){
                            return `${ meta.row + meta.settings._iDisplayStart + 1 }`;
                        },
                    },
                    {
                        data: "brand",
                    },
                    {
                        data: "model",
                    },
                    {
                        data: "price",
                        render: function(data, type, row){
                            return `IDR ${ row.price.toLocaleString() }`;
                        },
                    },
                    {
                        data: "performance",
                        render: function(data, type, row){
                            return `${ row.performance.toLocaleString() }`;
                        },
                    },
                    {
                        data: "battery",
                        render: function(data, type, row){
                            return `${ row.battery.toLocaleString() } mAH`;
                        },
                    },
                    {
                        data: "camera",
                        render: function(data, type, row){
                            return `${ row.camera.toLocaleString() } MP`;
                        },
                    },
                    {
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