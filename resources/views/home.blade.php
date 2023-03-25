@extends('master');

@section('content')

    <div class="container " style="height: 90vh">
        <nav class="navbar">
            <div class="container-fluid" style="width:85%">
                <a class="navbar-brand"><i class="fa-solid fa-user-secret me-2"></i><strong>WOODY</strong></a>
                <button type="button" class="btn btn-secondary ms-5">
                    Total - <span class="badge text-bg-light">{{ $posts->total() }}</span>
                </button>
                <form action="{{ route('user#home') }}" class="d-flex" role="search" method="get">
                    <input class="form-control me-2" type="search" placeholder="Search" name="searchKey"
                        value="{{ request('searchKey') }}">
                    <button class="btn btn-outline-secondary" type="submit"><i
                            class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
        </nav>
        <div class="row justify-content-center">
            <div class="col-md-4 shadow rounded border-0  p-3" style="height: 100%">
                @if (session('postAlert'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Post</strong>{{session('postAlert')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session('deleteAlert'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Post</strong>{{session('deleteAlert')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session('updateAlert'))
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        <strong>Post</strong>{{session('updateAlert')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                {{-- @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif --}}

                {{-- Create Post send data to sql with post method --}}
                <form action="{{url('post/create')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="text-group">
                        <label for="userName" class="my-2"><strong>Name :</strong></label>
                        <input type="text"  name="userName" class="form-control @error('userName') is-invalid @enderror" placeholder="Enter Name" value="{{old('userName')}}">
                        @error('userName')
                            <small class="invalid-feedback">{{$message}}</small>
                        @enderror
                        <label for="userTitle" class="my-2"><strong>Title :</strong></label>
                        <input type="text"   name="userTitle" class="form-control @error('userTitle') is-invalid @enderror" placeholder="Enter Post Title" value="{{old('userTitle')}}">
                        @error('userTitle')
                            <small class="invalid-feedback">{{$message}}</small>
                        @enderror
                        <label for="userImage" class="my-2"><strong>Image :</strong></label>
                        <input type="file" class="form-control @error('userImage') is-invalid @enderror" name="userImage">
                        @error('userImage')
                            <small class="invalid-feedback">{{$message}}</small>
                        @enderror
                        <label for="userDescription" class="my-2"><strong>Description :</strong></label>
                        <textarea name="userDescription" class="form-control @error('userDescription') is-invalid @enderror" cols="30" rows="4" placeholder="Enter Post Description...">{{old('userDescription')}}</textarea>
                        @error('userDescription')
                            <small class="invalid-feedback">{{$message}}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-dark mt-3" style="width: 100%">
                        New Post
                    </button>
                    <button type="button" class="btn btn-outline-dark mt-2" style="width: 100%;transition:0.5s;">
                        Sign Out
                    </button>
                </form>
                <div class="row pt-3">
                    {{ $posts->appends(request()->query())->links() }}
                </div>
            </div>
            {{-- Show Posts UI with foreach  --}}
            <div class="col-md-6 h-100vh pt-3 overflow-auto flex-column" style="background-color: #dddddd">
                @if(count($posts)!=0)
                @foreach ($posts as $item)
                <div class="card-box d-flex justify-content-center mb-3">
                    <div class="card shadow rounded border-0" style="width: 35rem">
                        <h5 class="card-title mt-4 fw-bold ms-3">
                            <span class="me-2 border-left ps-1">{{$item['title']}}</span>
                            {{-- <small class="float-end me-3 text-muted">{{$item['created_at']->format('h:i:s A')}}</small> --}}
                        </h5>
                        <h6 class="card-title p2-3 ps-3 text-muted">
                            <i class="fa-solid fa-user me-1"></i>
                            {{$item['name']}}
                        </h6>
                        <p class="card-title  ps-3" style="font-size: 14px">
                            {{-- {{$item['created_at']}} --}}
                            <i class="fa-solid fa-calendar-day me-2"></i>{{$item->created_at->format('j-F-Y')}} |
                            <i class="fa-solid fa-clock me-2"></i>{{$item->created_at->format('h:m:s:A')}}
                        </p>
                        {{-- Here for image upload --}}
                        @if ($item->image)
                            <img src="{{asset('storage/'.$item->image)}}" class="img-thumbnail" alt="" />
                        @endif
                        <div class="card-body">
                            <p class="card-text">
                                {{Str::words($item['description'],30,".....")}}
                            </p>
                            <hr />
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="{{route('user#update',$item['id'])}}" class="btn btn-outline-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="{{route('user#delete',$item['id'])}}" class="text-danger btn btn-outline-secondary"><i class="fa-solid fa-trash"></i></a>
                                </div>
                                <div>
                                    <small class="">
                                            <a href="{{route('user#view',$item['id'])}}">See More Info</a>
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            @else
            <h5 class="text-danger text-center"><i class="fa-solid fa-face-sad-tear me-2"></i>Sorry. There's no data.</h5>
            @endif
            </div>
        </div>
    </div>

    @endsection
