@extends('master');

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 shadow rounded border-0 pt-3">
                <h3 class="text-center">Update Information</h3>
                <form action="{{route('user#updateData',$post['id'])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="text-group">
                        <label for="userName" class="my-2"><strong>Name :</strong></label>
                        <input type="text" class="form-control @error('userName') is-invalid @enderror" name="userName" value="{{old('userName',$post->name)}}" placeholder="Enter User Name">
                        @error('userName')
                            <small class="invalid-feedback">{{$message}}</small>
                        @enderror
                        <label for="userTitle" class="my-2"><strong>Title :</strong></label>
                        <input type="text" class="form-control @error('userTitle') is-invalid @enderror" name="userTitle" value="{{old('userTitle',$post->title)}}" placeholder="Enter Post Title" >
                        @error('userTitle')
                            <small class="invalid-feedback">{{$message}}</small>
                        @enderror
                        <label for="userImage" class="my-2"><strong>Image :</strong></label>
                        @if ($post->image)
                            <img src="{{asset('storage/'.$post->image)}}" class="card-img" alt="" />
                        @else
                            <img src="https://st4.depositphotos.com/17828278/24401/v/600/depositphotos_244011872-stock-illustration-image-vector-symbol-missing-available.jpg" class="img-thumbnail"/>
                        @endif
                        <input type="file" class="form-control  @error('userImage') is-invalid @enderror" name="userImage">
                        @error('userImage')
                            <small class="invalid-feedback">{{$message}}</small>
                        @enderror
                        <label for="userDescription" class="my-2"><strong>Description :</strong></label>
                        <textarea name="userDescription" class="form-control @error('userDescription') is-invalid @enderror" cols="30" rows="4" placeholder="Enter Post Description...">{{old('userDescription',$post->description)}}</textarea>
                        @error('userDescription')
                            <small class="invalid-feedback">{{$message}}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-dark mt-3" style="width: 100%">
                        Update
                    </button>
                    <a href="{{route('user#home')}}" class="text-decoration-none btn btn-outline-dark mt-3 " style="width: 100%;transition:.5s">Back to Home Page</a>
                </form>
            </div>
        </div>
    </div>
@endsection



