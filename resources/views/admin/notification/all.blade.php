@extends('admin.layout.main')
@section('title','Notifications')
@section('heading','Notifications')
@section('desc','Internal Notification of the application ')
@section('breadcrumbs')
<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Short Codes</li>
    </ol>
</nav>
@endsection
@section('alpineJs')
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
@endsection
@section('content')
<section x-data="{open: false}">
{{-- <div class="row my-2" >
    <div class="col-12 d-flex justify-content-end">
        <button class="btn btn-primary btn-sm" @click=" open= !open" data-bs-toggle="tooltip" title="Add new Short Code" >Add Short Code <i class="bi bi-plus-circle"></i></button>
    </div>
</div>
<div class="row d-flex justify-content-center align-items-stretch" >
    <div class="col-md-6 col-12 " 
        x-show.transition="open"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform scale-90"
        x-transition:enter-end="opacity-100 transform scale-100"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-90"
    >
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <form action="{{route('admin.add.code')}}" method="POST">
                        @csrf
                        
                        <div class="form-floating my-2">
                            <input type="text" class="form-control" name="key" id="key" required>
                            <label for="">Key</label>
                        </div>
                        <div class="form-floating my-2">
                            <input type="text" class="form-control" name="value" id="value" required>
                            <label for="">Value</label>
                        </div>
                        <div class="form-group d-flex justify-content-end">
                            <button class="btn btn-primary btn-sm" type="submit">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div class="row d-flex justify-content-center">
    <div class="col-12">
        <div class="card shadow-sm">
            <div class="card-content">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{route('admin.read.notification')}}" class="btn btn-success btn-sm float-end"><i class="fa fa-book-fill"></i> Mark All As Read </a>
                        </div>
                    </div>
                    <table class="table table-bordered table-striped" id="contentTable">
                        <thead>
                            <tr>
                                <th>Sr#</th>
                                <th>Notification</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse(Auth::user()->unreadNotifications as $notification)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$notification->data['data']}}</td>
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