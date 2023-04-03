@extends('master');

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 shadow rounded border-0 pt-3">
                <h3 class="text-center">Update Information</h3>
                <form action="{{route('admin#updateData',$post['id'])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="text-group">
                        <label for="adminName" class="my-2"><strong>Name :</strong></label>
                        <input type="text" class="form-control @error('adminName') is-invalid @enderror" name="adminName" value="{{old('adminName',$post->name)}}" placeholder="Enter admin Name">
                        @error('adminName')
                            <small class="invalid-feedback">{{$message}}</small>
                        @enderror
                        <label for="adminTitle" class="my-2"><strong>Title :</strong></label>
                        <input type="text" class="form-control @error('adminTitle') is-invalid @enderror" name="adminTitle" value="{{old('adminTitle',$post->title)}}" placeholder="Enter Post Title" >
                        @error('adminTitle')
                            <small class="invalid-feedback">{{$message}}</small>
                        @enderror
                        <label for="adminImage" class="my-2"><strong>Image :</strong></label>
                        @if ($post->image)
                            <img src="{{asset('storage/'.$post->image)}}" class="card-img" alt="" />
                        @else
                            <img src="https://st4.depositphotos.com/17828278/24401/v/600/depositphotos_244011872-stock-illustration-image-vector-symbol-missing-available.jpg" class="img-thumbnail"/>
                        @endif
                        <input type="file" class="form-control  @error('adminImage') is-invalid @enderror" name="adminImage">
                        @error('adminImage')
                            <small class="invalid-feedback">{{$message}}</small>
                        @enderror
                        <label for="adminDescription" class="my-2"><strong>Description :</strong></label>
                        <textarea name="adminDescription" class="form-control @error('adminDescription') is-invalid @enderror" cols="30" rows="4" placeholder="Enter Post Description...">{{old('adminDescription',$post->description)}}</textarea>
                        @error('adminDescription')
                            <small class="invalid-feedback">{{$message}}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-dark mt-3" style="width: 100%">
                        Update
                    </button>
                    <a href="{{route('admin#home')}}" class="text-decoration-none btn btn-outline-dark mt-3 " style="width: 100%;transition:.5s">Back to Home Page</a>
                </form>
            </div>
        </div>
    </div>
@endsection



