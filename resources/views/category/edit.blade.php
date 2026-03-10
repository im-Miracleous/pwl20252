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
                        <a href="#">Category Form</a>
                    </li>
                </ul>
            </div>
            <div class="card">
                <div class="card-body">
                    <form method="post" action="{{ route('category.update', $category->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="id">ID</label>
                            <input type="number" id="id" name="id" class="form-control" readonly value="{{ $category->id }}">
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control" maxlength="60" autofocus required value="{{ $category->name }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea type="text" id="description" name="description" class="form-control" rows="2" maxlength="150">{{ $category->description }}</textarea>
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
