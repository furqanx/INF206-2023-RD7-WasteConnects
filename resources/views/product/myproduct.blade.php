@extends('layouts.app2')

@section('content')
    
    <div class="container-fluid bg-success">
        <span class="text-light"><b>Sampah Saya</b></span>
    </div>

    <!-- komponen daftar postingan sampah-->
    @include('components2.product-list')
    
@endsection