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
                        <a href="#">Book Form</a>
                    </li>
                </ul>
            </div>
            <div class="card">
                <div class="card-body">
                    <form method="post" action="{{ route('book.update', $category->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="isbn">ISBN</label>
                            <input type="text" id="isbn" name="isbn" class="form-control" readonly value="{{ $book->isbn }}">
                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" id="title" name="title" class="form-control" maxlength="60" autofocus required value="{{ $book->title }}">
                        </div>
                        <div class="form-group">
                            <label for="author">Author</label>
                            <input type="text" id="author" name="author" class="form-control" maxlength="60" autofocus required value="{{ $book->author }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea type="text" id="description" name="description" class="form-control" rows="2" maxlength="150">{{ $book->description }}</textarea>
                            <button type="submit" class="btn btn-primary mt-4">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@session('ExtraCSS')

@endsession

@session('ExtraJS')

@endsession
