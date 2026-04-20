@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Dashboard</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="#">
                            <i class="icon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Pages</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Book Page</a>
                    </li>
                </ul>
            </div>
            <div class="card-header">
                <a href="{{ route('book.create') }}" class="btn btn-primary mb-4" role="button">Add Book</a>
            </div>
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>ISBN</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Category</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($books as $book)
                            <tr>
                                <td>{{ $book->isbn }}</td>
                                <td>
                                    @if($book->cover)
                                        <img src="{{ asset('storage/uploads/' . $book->cover) }}" alt="Book Cover" class="img-thumbnail">
                                    @endif
                                </td>
                                <td>{{ $book->title }}</td>
                                <td>{{ $book->author }}</td>
                                <td>{{ $book->category->name }}</td>
                                @if(Auth::user()->role_id==1)
                                <td>
                                    <a href="{{ route('book.edit', $book->isbn) }}" class="btn btn-warning" role="button">Edit</a>
                                    <form method="post" action="{{ route('book.delete', $book->isbn) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this data?')">Delete</button>
                                    </form>
                                </td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@session('ExtraCSS')

@endsession

@session('ExtraJS')

@endsession
