@extends('admin.layout.main')
@section('title','Add Payment Plan')
@section('heading','Add Payment Plan')
@section('desc','Create the Payment Plans.')
@section('breadcrumbs')
<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
    <ol class="breadcrumb">
        <li class="breadcrumb-item" aria-current="page"><a href="{{route('admin.payment.plans')}}">Payment Plans</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add Payment Plan</li>
    </ol>
</nav>
@endsection
@section('summernote')
@include('admin.inc.summernote')
@endsection
@section('content')
<section class="row">
    <section id="multiple-column-form">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12 col-12">
                <div class="card shadow-sm">
                    <div class="card-content">
                        <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            <form action="{{route('admin.store.plan')}}" method="POST">
                                @csrf
                           
                                <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="name" id="name" >
                                        <label>Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-floating">
                                       <select name="type" id="" class="form-control">
                                           <option value=""></option>
                                           <option value="monthly" >Monthly </option>
                                           <option value="yearly"  >Yearly </option>
                                       </select>
                                        <label for="heading">Type</label>
                                    </div>
                                    <div class="form-floating">
                                        <select name="status" id="" class="form-control">
                                            
                                            <option value="activate" >Activate </option>
                                            <option value="deactivate"  >De Activate</option>
                                        </select>
                                         <label for="heading">Status</label>
                                     </div>
                                </div>
                                </div>
                                
                                
                                <div class="row mt-3">
                                    <div class="col-md-6 col-12">
                                        <div class="form-floating">
                                            <input type="number" min="1" class="form-control" name="amount" id="" >
                                            <label>Amount</label>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group d-flex justify-content-end">
                                            <button type="button" class="btn btn-success btn-sm " id="add_data"> <i class="bi bi-plus"></i> Add Features</button>
                                        </div>
                                       
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-hover table-bordered" id="tabledata">
                                            <thead>
                                                <tr>
                                                    <td>Feature</td>
                                                    <td>Remove</td>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                                <div class="form-group d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary btn-sm">Add</button>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
@endsection
@section('scriptCode')
<script>
  $(document).ready(function(){
    $('#add_data').click(function(){
        let row = `
        <tr>
            <td>
                <input type="text" class="form-control" name="features[]" placeholder>
            </td>
            <td>
                <button id="remove" type="button" class="btn btn-danger ml-3" style='background-color:#BB2D3B;text-align:center;'> <i class="bi bi-trash"></i></button>
            </td>
        </tr>
        `;
       $('#tabledata').append(row);
    });
  
  });
  $(document).on('click', '#remove', function(){
     
       
     $(this).closest("tr").remove();
     
   
     });
</script>
@endsection
