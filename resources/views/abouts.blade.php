@extends('layouts.app')

@section('title', ' เกี่ยวกับฉัน')

@section('content')
    <h2>เกี่ยวกับฉัน</h2>
    <hr>
    <p>ผู้พัฒนาระบบ :{{ $name }}</p>
    <p>วันที่ก่อตั้ง : {{ $Date }}</p>
    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatem eveniet, quis odit architecto illum
        dicta
        earum totam aliquam id, corrupti consectetur delectus corporis sapiente minus. Amet optio inventore ipsa ut!
    </p>
@endsection
