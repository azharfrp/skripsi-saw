@extends('layouts.front')
@section('title', 'Hasil Rekomendasi')
@section('content')
    <section class="cta">
        <div class="cta-content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <div class="container">
                            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                                @foreach($datas as $data)
                                    <a href="{{ route('product.detail', ['id' => $data['id']]) }}" class="text-muted">
                                        <div class="col">
                                            <div class="card h-100 my-3">
                                                <div class="image-container" style="height: 350px; overflow: hidden;">
                                                    <img src="{{ $data['thumbnail_path'] }}" class="img-fluid w-100 h-100" style="object-fit: cover;">
                                                </div>
                                                <!-- Card body content -->
                                                <div class="card-body">
                                                    <h5 class="card-title text-truncate">{{ $data['brand'] }} {{ $data['model'] }}</h5>
                                                    <p class="card-text">Rp. {{ number_format($data['price']) }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection