@extends('master')

@section('content')

    <div class="card-box d-flex justify-content-center mb-3 mt-5">
        <div class="card shadow rounded border-0" style="width: 35rem">
                <h5 class="card-title mt-4 fw-bold ms-3 d-flex justify-content-between">
                    <span class="me-2 border-left ps-1">{{$post['title']}}</span>
                    <i class="fa-solid fa-clipboard copy-button me-4 fs-3" style="cursor: pointer"></i>
                </h5>
            <h6 class="card-title p2-3 ps-3 text-muted">
                <i class="fa-solid fa-user me-1"></i>
                {{$post['name']}}
            </h6>
            <p class="card-title  ps-3" style="font-size: 14px">
                {{-- {{$item['created_at']}} --}}
                <i class="fa-solid fa-calendar-day me-2"></i>{{$post->created_at->format('j-F-Y')}} |
                <i class="fa-solid fa-clock me-2"></i>{{$post->created_at->format('h:m:s:A')}}
            </p>
            {{-- Here for image upload --}}
            @if ($post->image)
                <img src="{{asset('storage/'.$post->image)}}" class="img-thumbnail" alt="" />
            @else
                <img src="https://st4.depositphotos.com/17828278/24401/v/600/depositphotos_244011872-stock-illustration-image-vector-symbol-missing-available.jpg" class="img-thumbnail"/>
            @endif
            <div class="card-body">
                <p style=" white-space: pre-wrap;"  class="" id="copy-text">{{$post['description']}}</p>
                <hr/>
                <div class="d-flex justify-content-between">
                    <a href="{{route('admin#home')}}" class="btn btn-secondary px-3"><i class="fa-solid fa-arrow-left"></i>Back</a>
                    <div class="copy-message"></div>
                </div>
            </div>
        </div>
    </div>

@endsection

