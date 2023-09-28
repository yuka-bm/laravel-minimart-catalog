@extends('layouts.app')

@section('title', 'Products')

@section('content')
    <div class="container">
        <div class="d-flex">
            <h1 class="h3">Products</h1>
            <a href="{{ route('product.create') }}" class="btn btn-success ms-auto"><i class="fa-solid fa-circle-plus"></i> New Product</a>
        </div>

        <table class="table mt-3">
            <tr>
                <th class="table-success">ID</th>
                <th class="table-success">NAME</th>
                <th class="table-success">DESCRIPTION</th>
                <th class="table-success">PRICE</th>
                <th class="table-success">SECTION</th>
                <th class="table-success"></th>
            </tr>
            @forelse($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->section->name }}</td>
                    <td>
                        <a href="{{ route('product.edit', $product->id) }}" class="text-muted" title="Edit"><i class="fa-solid fa-pen"></i></a>
                        <button type="button" class="btn text-danger border-0" data-bs-toggle="modal" data-bs-target="#delete-product-{{ $product->id }}">
                            <i class="fa-regular fa-trash-can"></i>
                        </button>

                    </td>
                </tr>
                @include('products.modal.delete')
            @empty
            @endforelse
        </table>
    </div>
    

@endsection