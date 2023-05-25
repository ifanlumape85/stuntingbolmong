@extends('layouts.frontend.app')
@section('content')
<section style="background-color: #ededed;">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="d-flex flex-column justify-content-center align-items-center" style="height: 300px;">
                    <h1 class="text-bold text-center h1">News</h1>
                    
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
                <div class="col-md-6">
    
                    <div class="card card-widget">
                    <div class="card-header">
                        <span class="username"><a href="/news/{{ $item->slug ?? null }}" class="text-bold text-danger">{{ Str::limit($item->name, 55) ?? null }}</a></span>
                        <p class="text-sm text-secondary">{{ $item->created_at ?? null }}</p>
                    </div>
                    
                    <div class="card-body">
                    <img class="img-fluid pad" style="object-positon:center; object-fit:cover; width:100%; height:250px;" src="{{ Storage::url($item->image) }}" alt="Photo">
                    </div>
                    
                    </div>
                    
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