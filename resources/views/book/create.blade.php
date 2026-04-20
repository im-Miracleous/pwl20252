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
                    <form method="post" action="{{ route('book.store') }}" enctype="multipart/form-data"> <!-- enctype KRUSIAL untuk mengirim data, jgn lupa ditambahkan --->
                        @csrf
                        <div class="form-group">
                            <label for="isbn">ISBN</label>
                            <input type="text" id="isbn" name="isbn" class="form-input">
                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" id="title" name="title" class="form-input">
                        </div>
                        <div class="form-group">
                            <label for="author">Author</label>
                            <input type="text" id="isbn" name="isbn" class="form-input">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea type="text" id="description" name="description" class="form-input" rows="2" maxlength="150"></textarea>
                            <button type="submit">Save</button>
                        </div>
                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select name="category_id" id="category_id" class="form-control">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}"></option>
                                @endforeach
                            </select>
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
