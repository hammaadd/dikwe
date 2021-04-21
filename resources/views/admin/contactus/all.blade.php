@extends('admin.layout.main')
@section('title','Contact Us Management ')
@section('heading','Contact Us Management ')
@section('desc','Manage Contact Us ')
@section('breadcrumbs')
<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
    </ol>
</nav>
@endsection
@section('alpineJs')
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
@endsection
@section('content')
<section x-data="{open: false}">


<div class="row d-flex justify-content-center">
    <div class="col-12">
        <div class="card shadow-sm">
            <div class="card-content">
                <div class="card-body">
                    <table class="table table-bordered table-striped" id="contentTable">
                        <thead>
                            <tr>
                                <th>Sr#</th>
                                <th>name</th>
                                <th>Email </th>
                                <th>Inquiry Type </th>
                                <th>Message </th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($contacts as $contact)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$contact->name}}</td>
                                <td>{{$contact->email}}</td>
                                <td>{{$contact->inquiry_type}}</td>
                                <td >{{$contact->message}}</td>
                                <td class="d-flex justify-content-center">
                                   <a href="{{route('admin.delete.contact',$contact)}}" class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure?')">  <i class="bi bi-trash"></i></a>
                                </td>
                            </tr>
                        @empty
                            <p>No Data Available</p>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection