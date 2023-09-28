@extends('layouts.app')

@section('title', 'Products')

@section('content')

    <div class="container w-50">
        <h1 class="h3">Edit Product</h1>
        <form action="{{ route('product.update', $product->id) }}" method="post">
            @csrf
            @method('PATCH')
            {{-- Name --}}
            <label for="name" class="fw-bold mt-3">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $product->name) }}">
            @error('name')
                <p class="text-danger small">{{ $message }}</p>
            @enderror

            {{-- Description --}}
            <label for="description" class="fw-bold mt-2">Description</label>
            <textarea name="description" id="description" rows="5" class="form-control">{{ old('description', $product->description) }}</textarea>
            @error('description')
                <p class="text-danger small">{{ $message }}</p>
            @enderror

            {{-- Price --}}
            <label for="price" class="fw-bold mt-2">Price</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">$</span>
                </div>
                <input type="number" name="price" id="price" class="form-control" step=0.01 value="{{ old('price', $product->price) }}">
            </div>
            @error('price')
                <p class="text-danger small">{{ $message }}</p>
            @enderror

            {{-- Section --}}
            <label for="section" class="fw-bold mt-2">Section</label>
            @if($sections->isEmpty())
                <select name="section" id="section" class="form-select" disabled>
                    <option value="" >Select Section</option>
            @else
                <select name="section" id="section" class="form-select">
                    <option value="" hidden>Select Section</option>
                    @foreach($sections as $section)
                        @if ($section->id == old('section', $product->section->id))
                            <option value="{{ $section->id }}" selected>{{ $section->name }}</option>
                        @else
                            <option value="{{ $section->id }}">{{ $section->name }}</option>
                        @endif
                    @endforeach
            @endif
                </select>
            @if($sections->isEmpty())
                <a href="{{ route('section.index') }}" class="text-decoration-none small">Add a new section</a>
            @endif
            @error('section')
                <p class="text-danger small">{{ $message }}</p>
            @enderror

            <div class="mt-4">
            <a href="{{ route('index') }}" class="btn btn-outline-secondary">Cancel</a>
            <button class="btn btn-secondary px-5"><i class="fa-solid fa-check"></i> Save changes</button>
            </div>
        </form>
    </div>

@endsection