@extends('layouts.app')
@section('title', 'Edit Product')
@section('content')
    <div class="card">
        <form method="POST" enctype="multipart/form-data">
            <div class="card-body">
                <div class="form-group">
                    <label>Brand Name</label>
                    <select name="brand" class="form-control @error('model') is-invalid @enderror" required>
                        <option value="">Pilih Brand</option>
                        @foreach($brands as $brand)
                            <option value="{{ $brand->id }}" {{ (isset($products) && $products->brand_id == $brand->id) ? 'selected' : '' }}>{{ $brand->name }}</option>
                        @endforeach
                    </select>
                    @error('brand')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="form-group">
                    <label>Model Name</label>
                    <input name="model" type="text" class="form-control @error('model') is-invalid @enderror" value="{{ $products->model }}" placeholder="Model Name" required />
                    @error('model')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="form-group">
                    <label>Price (IDR)</label>
                    <input name="price" type="number" class="form-control @error('price') is-invalid @enderror" value="{{ $products->price }}" placeholder="Price (IDR)" required />
                    @error('price')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="form-group">
                    <label>Performance (Antutu)</label>
                    <input name="performance" type="number" class="form-control @error('performance') is-invalid @enderror" value="{{ $products->performance }}" placeholder="Performance (Antutu)" required />
                    @error('performance')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="form-group">
                    <label>Battery (mAh)</label>
                    <input name="battery" type="number" class="form-control @error('battery') is-invalid @enderror" value="{{ $products->battery }}" placeholder="Battery (mAh)" required />
                    @error('pribatteryce')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="form-group">
                    <label>Camera (MP)</label>
                    <input name="camera" type="number" class="form-control @error('camera') is-invalid @enderror" value="{{ $products->camera }}" placeholder="Camera (MP)" required />
                    @error('camera')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="form-group">
                    <label>Storage (GB)</label>
                    <input name="storage" type="number" class="form-control @error('storage') is-invalid @enderror" value="{{ $products->storage }}" placeholder="Storage (GB)" required />
                    @error('storage')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="form-group">
                    <label>Foto Produk</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input name="thumbnail_path" type="file" class="file">
                        </div>
                    </div>
                    @error('thumbnail_path')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>
            <div class="card-footer">
                <div class="input-group m-0">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <input type="hidden" name="_token" class="d-none" value="{{ csrf_token() }}" readonly />
                </div>
            </div>
        </form>
    </div>
@endsection