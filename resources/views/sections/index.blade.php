@extends('layouts.app')

@section('title', 'Show Sections')

@section('content')

    <div class="container w-50">
        <h1 class="h3">Sections</h1>
        <form action="{{ route('section.store') }}" method="post" class="">
            @csrf
            <div class="input-group">
                <input type="text" name="name" id="name" class="form-control rounded" placeholder="Put new section here..." value="{{ old('name') }}">
                <button type="submit" class="btn btn-info ms-2 rounded"><i class="fa-solid fa-plus"></i> Add</button>
            </div>
            @error('name')
                <p class="text-danger small">{{ $message }}</p>
            @enderror
        </form>

        <table class="table mt-3">
            <tr>
                <th class="border-dark table-info">ID</th>
                <th class="border-dark table-info">NAME</th>
                <th class="border-dark table-info"></th>
            </tr>
                @forelse ($sections as $section)
                    <tr>
                        <td>{{ $section->id }}</td>
                        <td>{{ $section->name }}</td>
                        <td>
                            <form action="{{ route('section.destroy', $section->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-0 btn-sm" title="Deletse">
                                    <i class="fa-regular fa-trash-can text-danger"></i> 
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                @endforelse
        </table>
    </div>

@endsection