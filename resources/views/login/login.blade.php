<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="assets/css/login.css">
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
    <section class=" gradient-form" style="background-color: #eee;">
        <div class="container-fluid py-5 h-100vh">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black">
                        <div class="row g-0">
                            <div class="col-lg-6 gradient-custom-2">
                                <div class="text-white p-5 w-100 d-flex justify-content-center align-center">
                                    {{-- img logo beltei --}}
                                    <img src="assets/img/apple-touch-icon.png" alt="" class="w-25">
                                </div>
                                {{-- title  --}}
                                <div>
                                    <h4 class="title_login text-light">សកលវិទ្យាល័យ ប៊ែលធី អន្តរជាតិ</h4>
                                    <h1 class="title_login_eng text-light">BELTEI INTERNATIONAL UNIVERSITY</h1>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <img class="w-50" src="assets/img/login_anime.svg" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6 d-flex align-center">
                                <div class="card-body p-md-5 mx-md-4 d-flex align-item-center">

                                    <div class="w-100 mt-5">
                                        <div class="text-center">
                                            {{-- <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/lotus.webp"
                              style="width: 185px;" alt="logo"> --}}
                                            <h4 class="title_login">ប្រព័ន្ធគ្រប់គ្រងឃ្លាំង</h4>
                                            <h1 class="title_login_eng">stock management system</h1>
                                        </div>

                                        <form action="/login_ch" method="POST">
                                            @CSRF
                                            @if ($errors == true)
                                            <div class="form-outline mb-4 mt-5 d-flex justify-content-center">
                                                <div class="alert alert-danger alert-dismissible fade show w-75" role="alert">
                                                    <i class="bi bi-exclamation-octagon me-1"></i>
                                                    your gmail or password are wrong.
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                  </div>
                                            </div>
                                            @endif
                                            
                                            <div class="form-outline mb-4 mt-5">
                                                <input type="email" id="form2Example11" name="gmail"
                                                    class="form-control p-3 w-75 m-auto" placeholder="email" />

                                            </div>

                                            <div class="form-outline mb-4">
                                                <input placeholder="password" type="password" name="password" id="form2Example22"
                                                    class="form-control p-3 w-75 m-auto" />

                                            </div>

                                            <div class="text-center pt-1 mb-5 pb-1">
                                                <button
                                                    class="btn btn-primary btn-block fa-lg gradient-custom-2 px-5 py-3"
                                                    type="submit">Log
                                                    in</button>
                                            </div>



                                        </form>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>
