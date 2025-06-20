@extends('layouts.front')
@section('title', $datas['brand'] . ' ' . $datas['model'])
@section('content')
    <section class="cta">
        <div class="cta-content">
            <div class="container px-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">{{ $datas['brand'] }} {{ $datas['model'] }}</div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex align-items-start">
                                    <div class="flex-shrink-0">
                                        <img src="{{ $datas['thumbnail_path'] }}" style="width: 200px; height: 200px; object-fit: cover;">
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <dl class="row">
                                            <dt class="col-sm-2">Brand</dt>
                                            <dd class="col-sm-10">{{ $datas['brand'] }}</dd>
                                            <dt class="col-sm-2">Model</dt>
                                            <dd class="col-sm-10">{{ $datas['model'] }}</dd>
                                            <dt class="col-sm-2">Price</dt>
                                            <dd class="col-sm-10">Rp. {{ number_format($datas['price']) }}</dd>
                                            <dt class="col-sm-2">Performance</dt>
                                            <dd class="col-sm-10">{{ number_format($datas['performance']) }}</dd>
                                            <dt class="col-sm-2">Battery</dt>
                                            <dd class="col-sm-10">{{ number_format($datas['battery']) }} mAH</dd>
                                            <dt class="col-sm-2">Camera</dt>
                                            <dd class="col-sm-10">{{ number_format($datas['camera']) }} MP</dd>
                                            <dt class="col-sm-2">Storage</dt>
                                            <dd class="col-sm-10">{{ number_format($datas['storage']) }} GB</dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection