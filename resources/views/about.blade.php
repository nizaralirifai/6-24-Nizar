@extends('layouts.main')

@section('container')
    <h1> Halaman About </h1>
    <h3> {{ $nama }} </h3>
    <p> {{ $email}} </p>
    <img src="images/<?php echo $gambar; ?>" alt="<?php echo $nama; ?>" width="200px">
@endsection