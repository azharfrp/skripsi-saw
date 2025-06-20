@extends('layouts.front')
@section('title', 'Rekomendasi')
@section('content')
    <section class="cta">
        <div class="cta-content">
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Pemilihan Kriteria</div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('product.proccess') }}" method="POST">
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
@endsection