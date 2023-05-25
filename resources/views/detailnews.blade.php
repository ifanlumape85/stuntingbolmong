@extends('layouts.frontend.app')
@section('content')
<section style="background-color: #ededed;">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="d-flex flex-column justify-content-center align-items-center" style="height: 300px;">
                    <h1 class="text-bold text-center h1">News</h1>
                    <p class="h2"><a href="/news/{{ $item->slug ?? null }}" class="text-bold text-dark">{{ $item->name ?? null }}</a></p>
                </div>
            </div>
        </div>
    </div>
</section>
<section style="background-color: #ffffff;">
    <div class="container">
        <div class="row p-4">
            <div class="col">
                <img class="img-fluid pad" src="{{ Storage::url($item->image) }}" alt="Photo">
                <p class="row text-secondary mt-4 mb-4">
                    {!! nl2br(e($item->body)) !!}
                </p>
            </div>
        </div>
    </div>
</section>
@endsection