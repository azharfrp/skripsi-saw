@extends('layouts.front')
@section('title', 'Product')
@section('content')
    <section class="cta">
        <div class="cta-content">
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Pemilihan Kriteria</div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('product.index') }}" method="POST">
                            <div class="row">
                                <div class="col-6 my-2">
                                    <label>Harga</label>
                                    <select name="price" id="price" class="form-select" required>
                                        <option value="" selected>Harga</option>
                                        <option value="1">Sangat Tidak Penting</option>
                                        <option value="2">Tidak Penting</option>
                                        <option value="3">Normal</option>
                                        <option value="4">Penting</option>
                                        <option value="5">Sangat Penting</option>
                                    </select>
                                </div>
                                <div class="col-6 my-2">
                                    <label>Performa</label>
                                    <select name="performance" id="performance" class="form-select" required>
                                        <option value="" selected>Performa</option>
                                        <option value="1">Sangat Tidak Penting</option>
                                        <option value="2">Tidak Penting</option>
                                        <option value="3">Normal</option>
                                        <option value="4">Penting</option>
                                        <option value="5">Sangat Penting</option>
                                    </select>
                                </div>
                                <div class="col-6 my-2">
                                    <label>Kapasitas Batre</label>
                                    <select name="battery" id="battery" class="form-select" required>
                                        <option value="" selected>Kapasitas Batre</option>
                                        <option value="1">Sangat Tidak Penting</option>
                                        <option value="2">Tidak Penting</option>
                                        <option value="3">Normal</option>
                                        <option value="4">Penting</option>
                                        <option value="5">Sangat Penting</option>
                                    </select>
                                </div>
                                <div class="col-6 my-2">
                                    <label>Resolusi Kamera</label>
                                    <select name="camera" id="camera" class="form-select" required>
                                        <option value="" selected>Resolusi Kamera</option>
                                        <option value="1">Sangat Tidak Penting</option>
                                        <option value="2">Tidak Penting</option>
                                        <option value="3">Normal</option>
                                        <option value="4">Penting</option>
                                        <option value="5">Sangat Penting</option>
                                    </select>
                                </div>
                                <div class="col-6 my-2">
                                    <label>Kapasitas Penyimpanan</label>
                                    <select name="storage" id="storage" class="form-select" required>
                                        <option value="" selected>Kapasitas Penyimpanan</option>
                                        <option value="1">Sangat Tidak Penting</option>
                                        <option value="2">Tidak Penting</option>
                                        <option value="3">Normal</option>
                                        <option value="4">Penting</option>
                                        <option value="5">Sangat Penting</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <div class="d-grid gap-2">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-success">Beri saran</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="features">
        <div class="container px-5">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Katalog Produk Tanpa Kriteria</div>
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