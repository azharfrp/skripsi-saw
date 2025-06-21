@extends('layouts.front')
@section('title', 'About')
@section('content')
    <div class="masthead">
        <div class="container px-5">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-6">
                    <div class="masthead-device-mockup">
                        <div class="device-wrapper">
                            <h1 class="display-5 lh-1">About Me</h1>
                            <img src="{{ asset('asset/About.jpg') }}" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-5 mb-lg-0 text-center text-lg-start">
                        <h2 class="display-5 lh-1 mb-3">Web Developer</h2>
                        <p class="lead fw-normal text-muted">Halo nama saya Lion, jurusan Informatika. Website {{ config('app.name', 'SmartChoice') }} ini merupakan sistem pendukung keputusan pemilihan untuk Smartphone dan ditujukan kepada pengguna yang bingung untuk membeli hp smartphone yang sesuai dengan kebutuhan. Diharapkan website {{ config('app.name', 'SmartChoice') }} dapat membantu memberikan rekomendasi hp smartphone yang cocok untuk pengguna.</p>
                    </div>
                    <div class="row">
                        <div class="col-12"><h3 class="text-center">Contact Me</h3></div>
                        <div class="col-4"><p><i class="fas fa-user"></i> Yustinus Lionardy</p></div>
                        <div class="col-8"><p><i class="fas fa-at"></i> yustinus.lionardy@student.umn.ac.id</p></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection