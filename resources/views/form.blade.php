@extends('layouts.app')

@section('title', 'เขียนบทความ')

@section('content')
    <h2 class="text text-center py-2">เขียนบทความ</h2>
    <form method="POST" action="/author/insert">
        @csrf
        <div class="group">
            <label for="title">ชื่อบทความ</label>
            <input type="text" class="form-control" name="title">
        </div>
        @error('title')
            <p class="text-danger py-2">{{$message}}</p>
        @enderror
        <div class="group">
            <label for="content">เนื้อหาบทความ</label>
            <textarea class="form-control" name="content" cols="30" rows="5"></textarea>
        </div>
        @error('content')
            <p class="text-danger py-2">{{$message}}</p>
        @enderror
        <input type="submit" value="บันทึก" class="btn btn-success my-2">
        <a href="/blog" class="btn btn-success my-3">บทความทั้งหมด</a>
    </form>
@endsection