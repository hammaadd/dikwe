@extends('user.layout.userLayout')
@section('title','Short URL')
@section('page-title','Short URL')
@section('headerExtra')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('bodyExtra')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.multiple-select').select2();
        });
    </script>
@endsection
@section('content')
    <div class="p-2 md:p-5 lg:p-2 xl:p-5">
        <div class="bg-green-150 rounded-xl p-2 md:p-8 lg:p-2 xl:p-8">
            <div class="w-full lg:w-2/3 xl:w-1/2 mx-auto md:px-0 bg-white rounded-xl">
                <div class="flex flex-wrap justify-between relative">
                    <div class="bg-green-550 text-white font-bold px-2 md:px-8 py-1 md:py-3 br-top-left"><label for="short-url">Adding Short URL</label></div>
                </div>
                <div class="p-2 md:p-8">
                    <div>
                        <form action="">
                            <input type="text" placeholder="Short URL Title" class="input--field">
                            <input type="text" placeholder="Source URL" class="input--field">
                            <div class="input--field">
                                <select class="multiple-select" name="" multiple="multiple">
                                    <option value="">Tag</option>
                                    <option value="">Tag</option>
                                    <option value="">Tag</option>
                                    <option value="">Tag</option>
                                </select>
                            </div>
                            <div class="input--field">
                                <select class="multiple-select" name="" multiple="multiple">
                                    <option value="">Workspace</option>
                                    <option value="">Workspace</option>
                                    <option value="">Workspace</option>
                                    <option value="">Workspace</option>
                                </select>
                            </div>
                            <div class="flex flex-wrap overflow-hidden flex-row items-center justify-between">
                                <div class="input--f">
                                    <div class=" mx-auto">
                                        Color
                                        <div class=" inline-block ml-4">
                                            <input type="radio" name="color" class="form-checkbox text-purple-900 border-purple-900 bg-purple-900 rounded-full focus:ring-0" />
                                            <input type="radio" name="color" class="form-checkbox text-yellow-400 border-yellow-400 bg-yellow-400 rounded-full focus:ring-0" />
                                            <input type="radio" name="color" class="form-checkbox text-indigo-700 border-indigo-700 bg-indigo-700 rounded-full focus:ring-0" />
                                            <input type="radio" name="color" class="form-checkbox text-green-550 border-green-550 bg-green-550 rounded-full focus:ring-0" />
                                        </div>
                                    </div>
                                </div>
                                <div class="input--f">
                                    <i class="fas fa-thumbs-up text-green-550 text-2xl mx-2"></i>
                                    <i class="fas fa-thumbs-down text-green-550 text-2xl mx-2"></i>
                                </div>
                            </div>
                            <div class="input--field">
                                <div class="flex flex-row justify-around">
                                    <label class="items-center">
                                        <input type="radio" name="rate" class="h-4 w-4 text-green-550 focus:ring-0"/>
                                        <span class="sm:ml-2">
                                            Public
                                        </span>
                                    </label>
                                    <label class="items-center ml-1 md:ml-4">
                                        <input type="radio" name="rate" class="h-4 w-4 text-green-550 focus:ring-0"/>
                                        <span class="sm:ml-2">
                                            Restricted
                                        </span>
                                    </label>
                                    <label class="items-center ml-1 md:ml-4">
                                        <input type="radio" name="rate" class="h-4 w-4 text-green-550 focus:ring-0"/>
                                        <span class="sm:ml-2">
                                            Private
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="text-center md:text-right my-4">
                                <button class="btn-gray">Cancel</button>
                                <button type="submit" class="btn-green">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
