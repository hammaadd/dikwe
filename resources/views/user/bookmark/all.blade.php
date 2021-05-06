@extends('user.layout.userLayout')
@section('title','All Book Marks')
@section('page-title','All Bookmark')
@section('headerExtra')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endsection
@section('content')
    <div class="p-5">
  
        
        <a href="{{route('add.bookmark')}}">Create BookMark</a>
     
        <table class="border-collapse border border-green-800 w-full">
            <thead>
              <tr>
                <th class="border border-green-600 ...">S# </th>
                <th class="border border-green-600 ...">Title </th>
                <th class="border border-green-600 ...">Url </th>
                <th class="border border-green-600 ...">Note </th>
                <th class="border border-green-600 ...">Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($bookmarks as $bookmark)
                    <tr>
                        <td class="border border-green-600 ...">{{$loop->iteration}}</td>
                        <td class="border border-green-600 ...">{{$bookmark->title}}</td>
                        <td class="border border-green-600 ...">{{$bookmark->url}}</td>
                        <td class="border border-green-600 ...">{{$bookmark->note}}</td>
                        <td class="border border-green-600 ...">
                            <a href="{{route('edit.bookmark',$bookmark)}}" >Edit </a>
                            <a href="{{route('delete.bookmark',$bookmark)}}">Delete </a>
                            
                        </td>
                        
                    </tr>
              @endforeach
            </tbody>
          </table>
    </div>
@endsection
