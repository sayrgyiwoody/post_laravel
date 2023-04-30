<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semester 2</title>
    <!--Logo Image-->
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/4838/4838252.png">
    </link>
    <!--Css-->
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <!--JavaScript-->
    <script src="./assets/js/main.js" defer></script>
    <!--Fontawesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--Bootstrap link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Antonio:wght@100;200;300;400;500;600;700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,500;1,600&display=swap"
        rel="stylesheet">
</head>

<style>
    ::-webkit-scrollbar {
    width: 0;
}

</style>

<body style="background-color: #e7e7e7;">
    <div class="container-fluid px-0">
        <!--body-->
        <section>
            <div class="home">
                <!--Navigation-->
                <nav class="navbar-light">
                    <img src="{{ asset('storage/UCSY TRAN.png') }}" class="logo ms-3">
                    <span class="me-auto  " style="font-size:25px;font-weight:500;">UCSY F001</span>
                    <ul id="sideMenu">
                        <li><a href="#">Home</a></li>
                        <li><a href="#teachers">Teachers</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                        <i class="fa-solid fa-xmark" onclick="closeMenu()"></i>
                    </ul>
                    <i class="fa-solid fa-bars me-4" onclick="openMenu()"></i>
                </nav>
                <!--End of navigation-->
                <div class="container-fluid">
                    <div class="row my-5 mx-3 ">
                        <div class="col-lg-8 fw-bold py-3 left-text ">
                            <h1 class="display-4">Welcome from</h1>
                            <h6 class="display-6">UCSY F001 Students' Page</h6>
                        </div>
                        <div class="col-lg-4 right-text d-flex justify-content-center align-items-end">
                            <a href="{{ route('login') }}" class="admin-button" style="text-decoration: none">Login</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer" id="news">
                <div class="container">
                    <div class="row d-lg-none mt-3">
                        <hr>
                        <div class="col text-center ">
                            <h3 class="h3 "><i class="fa-solid fa-newspaper me-3"></i>News in our class</h3>
                        </div>
                        <hr>
                    </div>
                    <div class="row me-1">
                        <div class="col-lg-3 position-relative">
                            <div class="rectangle-box d-none d-lg-block position-absolute">
                                <div class="rectangle d-flex justify-content-center align-items-center">
                                    <div class="">
                                        <i class="fa-solid fa-computer rectangle-icon"></i>
                                        <p class="text-light  mt-4">Computer lab</p>
                                    </div>
                                </div>
                                <div class="rectangle border-top d-flex justify-content-center align-items-center">
                                    <div class="">
                                        <i class="fa-solid fa-face-smile-wink rectangle-icon"></i>
                                        <p class="text-light  mt-4">Fun activities</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9 d-lg-flex d-sm-block overflow-auto ">
                            @foreach ($post as $p)
                            <div class="card-box d-flex justify-content-center ms-3 mt-4 my-3">
                                <div class="card shadow rounded border-0">
                                    <h5 class="card-title mt-4 fw-bold ms-3">
                                        <span class="me-2 border-left ps-1">{{$p->title}}</span>
                                    </h5>
                                    <p class="card-title ps-3 text-muted" style="font-size: 14px">
                                        {{$p->created_at->format('F/j/Y')}}
                                    </p>
                                    <div class="card-body pt-0">
                                        <p class="card-text" style="width:17rem;">
                                            {{Str::words($p->description,10,".....")}}
                                        </p>
                                        <hr />
                                        <div class="d-flex justify-content-between align-items-center">
                                            <button type="button" class="btn btn-secondary"><a
                                                    class="text-decoration-none text-light"
                                                    href="/login">See More</a></button>
                                            <div><small class="text-muted">9-mins</small></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="about" id="teachers" style="background-color:#fff ;">
                <div class="container-fluid">
                    <div class="row mt-5">
                        <div class="col text-center d-lg-flex justify-content-evenly align-items-center">
                            <h1 class="h3 mt-4 mb-3 justify-content-center"><img
                                    src="{{ asset('storage/UCSY TRAN.png') }}" style="width:100px; height:100px;"
                                    alt=""> UCSY FOO1</h1>
                            <h2 class="h3"><i class="fa-solid fa-graduation-cap me-2"></i>Our Teachers</h2>
                        </div>
                    </div>
                    <hr>
                    <div class="row justify-content-center mt-3 p-4">
                        <div class="col-lg-12 d-lg-flex d-sm-block  ">
                            <!--Card for teachers' information-->
                            @for ($i = 0; $i < 5; $i++)
                                <div class="card shadow card-hover rounded border-0 m-3 mx-auto ">
                                    <div class="card-body  ">
                                        <div class="card-title d-flex justify-content-center align-items-center">
                                            <img src="{{ asset('storage/zuzuTeacher.png') }}" class="me-3"
                                                style="width: 40px;" alt="">
                                            <div class="teacher-info">
                                                <h2 class="h5 fw-semibold mb-0">Tr. Zuckerberg</h2>
                                                <small class="text-muted">zuzu@gmail.com</small>
                                            </div>
                                        </div>
                                        <div class="card-text d-flex d-lg-block justify-content-evenly">
                                            <p class="mb-0"><i class="fa-solid fa-book me-1"></i><span
                                                    class="text-dark fw-semibold">Computer Science</span></p>
                                            <p class="mb-0 ms-lg-0 ms-sm-2"><i
                                                    class="fa-solid fa-square-phone me-1"></i><span
                                                    class="text-dark fw-semibold">09 986543556</span></p>
                                        </div>
                                    </div>
                                </div>
                            @endfor




                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--end of body-->
    </div>
    <!--Scroll reveal-->
    <script src="https://unpkg.com/scrollreveal"></script>
    <script>
        ScrollReveal({
            reset: true,
            distance: '30px',
            duration: 2500,
            delay: 400,
        })


        function openMenu() {
            document.getElementById("sideMenu").style.right = "0px";
        }

        function closeMenu() {
            document.getElementById("sideMenu").style.right = "-200px";
        }
    </script>
    <!--Bootstrap Js link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <!--End of scroll reveal-->
</body>

</html>
