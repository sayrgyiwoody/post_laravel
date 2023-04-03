<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!--Font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <!--google-fonts--->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Poppins:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <!--bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--css link-->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

</head>
<body>
    <div class="container-fluid d-flex justify-content-center align-items-center" style="height:100vh; background-color:#ECF2FF;">
        <div class="row align-items-center" >
            <div class="box-1 col-6 bg-light d-flex justify-content-center d-none d-lg-block" style="border-radius:15px; width:300px; height:300px;">
                <div class="img-div">
                <h5 class="img-header mt-3 mb-0 fw-bold">Register Here</h5>
                <div class="img-container ">
                    <img class="w-100" src="https://raw.githubusercontent.com/Sayrgyiwoody/Mini-Login-via-code-lab/main/img/register.png">
                </div>
                </div>
            </div>
            <div class="box-2 col-4" style="width:250px; border-radius:15px; background-color:#1b263b;">
            <form action="{{route('register')}}" method="post">
                @csrf
                <div class="row  pt-3 px-2">
                    @error('name')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                    <div class="input-icons mb-3">
                            <i class="fa-solid fa-user text-dark icon"></i>
                            <input type="text" name="name"class="form-control input-field" style="font-size:12px;padding:4px 28px;"  placeholder="name" value="{{old('name')}}">
                    </div>
                    @error('email')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                    <div class="input-icons mb-3">
                            <i class="fa-solid fa-envelope text-dark icon"></i>
                            <input type="email" name="email" class="form-control input-field" style="font-size:12px;padding:4px 28px;"  placeholder="email" value="{{old('email')}}">
                    </div>
                    @error('password')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                    <div class="input-icons mb-3">
                            <i class="fa-solid fa-lock text-dark icon"></i>
                            <input type="password" name="password"class="form-control input-field" style="font-size:12px;padding:4px 28px;"  placeholder="password">
                    </div>
                    @error('password_confirmation')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                    <div class="input-icons mb-3">
                            <i class="fa-solid fa-lock text-dark icon"></i>
                            <input type="password" name="password_confirmation" class="form-control input-field" style="font-size:12px;padding:4px 28px;"  placeholder="confirm password">
                    </div>
                    <div class="input-icons mb-3">
                        <select name="role" class="form-select" style="font-size:12px;padding:1px 5px;">
                            <option value="admin">Admin</option>
                            <option value="user" selected>User</option>
                        </select>
                    </div>
                    <div class="input-icons">
                        <input type="submit" name="register" class="btn btn-light fw-bold w-100" value="Register" style="padding: 2px 20px">
                    </div>
                </div>
            </form>

            <p class="my-2 text-end text-white" style="font-size: 14px">Have account?<a href="{{route('login')}}" class="ms-2">click to login</a></p>
            </div>
        </div>
    </div>
</body>
</html>
