@extends('layouts.app')

@section('title', 'แก้ไขบทความ')

@section('content')
    <h2 class="text text-center py-2">แก้ไขบทความ</h2>
    <form method="POST" action="{{route('update',$blog->id)}}">
        @csrf
        <div class="group">
            <label for="title">ชื่อบทความ</label>
            <input type="text" class="form-control" name="title" value="{{$blog->title}}">
        </div>
        @error('title')
            <p class="text-danger py-2">{{$message}}</p>
        @enderror
        <div class="group">
            <label for="content">เนื้อหาบทความ</label>
            <textarea class="form-control" name="content" cols="30" rows="5">{{$blog->content}}</textarea>
        </div>
        @error('content')
            <p class="text-danger py-2">{{$message}}</p>
        @enderror
        <input type="submit" value="บันทึกการแก้ไข" class="btn btn-success my-2">
        <a href="{{ route('blogs') }}" class="btn btn-primary my-2">บทความทั้งหมด</a>
    </form>
@endsection