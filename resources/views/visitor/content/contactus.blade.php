@extends('visitor.layout.visitorLayout')
@section('title','Homepage')
@section('content')
@include('visitor.inc.homeBanner')
<div class="container mx-auto py-12">
    <!-- Page Title Section -->
    <div class="text-center">
        <h2 class="page-title-primary">DIKWE Contact Us </h2>
        <div class="row">
            <form action="{{route('visitor.contactus')}}">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" required>
                </div>
                <div class="form-group">
                    <label for="">Email </label>
                    <input type="email" class="form-control" name="email" required>
                </div>
                <div class="form-group">
                    <label for="">Type </label>
                    <select name="type" id="" class="form-control">
                        <option value="inquiry">Inquiry</option>
                        <option value="testimony">Testimony</option>
                        <option value="issue">Issue</option>
                        <option value="feature_recommendation">Feature Recomandation</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Message</label>
                    <textarea name="message"  cols="25" rows="10"></textarea>
                </div>
                <div class="form-group">
                    
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Button
                    </button>
                </div>
            </form>
            
        </div>
        
    </div>
    
</div>
@endsection
