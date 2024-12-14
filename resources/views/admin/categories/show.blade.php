@extends('admin.layouts.admin')

@section('title', 'View Category')

@section('content')
    <h1 class="mb-4">Category: {{ $category->name }}</h1>
    <div>
        <p><strong>Created At:</strong> {{ $category->created_at->format('d M Y') }}</p>
        <p><strong>Updated At:</strong> {{ $category->updated_at->format('d M Y') }}</p>
    </div>
    <div>
        <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-warning">Edit</a>
        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display:inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
@endsection