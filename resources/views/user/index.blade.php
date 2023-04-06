<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Game</title>

    <link rel="stylesheet" href="/assets/extensions/choices.js/public/assets/styles/choices.css">

    <link rel="stylesheet" href="/assets/css/main/app.css">
    <link rel="stylesheet" href="/assets/css/main/app-dark.css">
    <link rel="shortcut icon" href="/assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="/assets/images/logo/favicon.png" type="image/png">

    <link rel="stylesheet" href="/assets/css/custom/custom.css">

</head>

<body>
    <div id="app">
        @include('sidebar')

        <div id="main" class="layout-navbar">
            @include('header')
            <div id="main-content">

                <div class="page-heading">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-md-6 order-md-1 order-last">
                                <h3>Profile</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-content">
                    <div class="page-heading">

                        <!-- Basic Vertical form layout section start -->
                        <section id="basic-vertical-layouts">
                            <div class="row match-height">
                                <div class="col-md-6 col-12">
                                    <div class="card">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="first-name-column">Nama Lengkap</label>
                                                                <h6 class="font-bold py-1">{{ Auth::user()->name }}</h6>
                                                            </div>
                                                        </div>
                                                        <div class=" col-12">
                                                            <div class="form-group">
                                                                <label for="last-name-column">Email</label>
                                                                <h6 class="font-bold py-1">{{ Auth::user()->email }}
                                                                </h6>
                                                            </div>
                                                        </div>
                                                        <div class=" col-12">
                                                            <div class="form-group">
                                                                <label for="last-name-column">No Hp</label>
                                                                <h6 class="font-bold py-1">
                                                                    {{ Auth::user()->phoneNumber }}</h6>
                                                            </div>
                                                        </div>
                                                        <div class=" col-12">
                                                            <div class="form-group">
                                                                <label for="last-name-column">Role</label>
                                                                <h6 class="font-bold py-1">{{ Auth::user()->roles }}
                                                                </h6>
                                                            </div>
                                                        </div>
                                                        <div class="buttons">
                                                            <a href="{{ route('user.edit', Auth::user()->id) }}"
                                                                class="btn btn-sm bg-primary text-bold text-light px-3">Edit
                                                                Profile</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="card">
                                        <div class="card-header pb-0">
                                            <h5 class="card-title">Foto Pengguna</h5>
                                        </div>
                                        <div class="card-content">
                                            <div class="card-body pt-0">
                                                <img class="img-preview" alt="" width="100%" height="50%"
                                                    src="{{ asset(Auth::user()->profilePhotoPath) }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/assets/js/bootstrap.js"></script>
    <script src="/assets/js/app.js"></script>

    <script src="/assets/extensions/choices.js/public/assets/scripts/choices.js"></script>
    <script src="/assets/js/pages/form-element-select.js"></script>

    <script src="/assets/js/custom/custom.js"></script>
</body>

</html>
