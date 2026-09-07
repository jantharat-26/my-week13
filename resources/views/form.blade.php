@extends('layouts.app')

@section('title', 'เขียนบทความใหม่')

@section('content')
    <h2 class="text text-center py-2">เขียนบทความใหม่</h2>
    <form method="POST" action="/insert">
        @csrf
        <div class="form-grop">
            <label for="title">ชื่อบทความ</label>
            <input type="text" name="title" class="form-control">
        </div>
        @error('title')
            <div class="my-2">
                <p class="text-danger">{{ $message }}</p>
            </div>
        @enderror

        <div class="form-grop">
            <label for="title">เนื้อหา</label>
            <textarea name="content" class="form-control" cols="30" rows="10"> </textarea>
        </div>
        @error('content')
            <div class="my-2">
                <p class="text-danger">{{ $message }}</p>
            </div>
        @enderror

        <input type="submit" value="บันทึก" class="btn btn-primary my-3">
        <a href="/blogs" class="btn btn-secondary">บทความทั้งหมด</a>
    </form>
@endsection
