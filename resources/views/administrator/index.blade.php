@php
    use Illuminate\Support\Facades\Auth;
@endphp

@extends("layouts.administrator.index")
@section("title",$clinica["clinica"])
@section("user_username",Auth::user()->username)
@section("user_name",Auth::user()->name)
@section("user_role",$clinica['niveles'][Auth::user()->level])
 
@section("content")
    <div id="content" class="content" style="height: 100%">
        @include($directory)
    </div>
@stop