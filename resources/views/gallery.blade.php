@extends('layouts.frontend.app')
@section('content')
<section style="background-color: #ededed;">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="d-flex flex-column justify-content-center align-items-center" style="height: 300px;">
                    <h1 class="text-bold text-center h1">Gallery</h1>
                    
                </div>
            </div>
        </div>
    </div>
</section>
<section style="background-color: #ffffff;">
    <div class="container">
        <div class="row p-4">
            <div class="row mt-4 mb-2">
                @foreach($items as $item)
            <div class="col-md-12 col-lg-6 col-xl-4">
                <a href="{{ Storage::url($item->image) }}" target="_blank" class="text-white">
                <div class="card mb-2 bg-gradient-dark">
                    <img style="object-positon:center; object-fit:cover; width:100%; height:250px;" class="card-img-top" src="{{ Storage::url($item->image) }}" alt="Dist Photo 1">
                    <div class="card-img-overlay d-flex flex-column justify-content-end">
                        <h5 class="card-title text-primary text-white">{{ $item->title ?? null }}</h5>
                        {{ $item->created_at ?? null }}
                    
                    </div>
                </div>
            </a>
            </div>
            @endforeach
            </div>
        </div>
        <div class="row">
            <p>{{ $items->links() }}</p>
        </div>
    </div>
</section>
@endsection