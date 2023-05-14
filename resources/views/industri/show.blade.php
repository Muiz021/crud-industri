@extends('template')

@section('content')
@section('title', 'show')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card px-3">
                <div class="row">
                    <div class="card-head">
                        <h1 class="text-center mt-3">{{$industri->nama}}</h1>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-center">
                            <img src="{{asset('images/'.$industri->gambar)}}" alt="" width="80%" style="max-height: 300px;">
                        </div>
                        <p class="my-4">{{$industri->deskripsi}}</p>
                    </div>
                    <div class="d-flex justify-content-end mb-3">
                        <a name="" id="" class="btn btn-secondary"
                            href="{{ route('industri.index') }}" role="button">kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
