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
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
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
                    {
                        render: function(data, type, row, meta){
                            // Link Edit
                            const editLink = ("{{ route('app.product.edit', ['id' => 'placeholder']) }}").replace('placeholder', row.id);

                            // Link Delete
                            const deleteLink = ("{{ route('app.product.delete', ['id' => 'placeholder']) }}").replace('placeholder', row.id);

                            return `<div class="btn-group" role="group" aria-label="Action Button">
                                <a href="${ editLink }" class="btn btn-sm btn-secondary"><i class="fas fa-edit"></i></a>
                                <a href="${ deleteLink }" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                            </div>`;
                        },
                    },
                ],
            });
        });
    </script>
@endpush