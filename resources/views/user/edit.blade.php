<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perbarui Data User</title>

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
                                <h3>User</h3>

                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item" aria-current="page"><a
                                                href="{{ route('game') }}">User</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Perbarui Data</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-content">

                    <div class="page-heading">

                        <!-- Basic Vertical form layout section start -->
                        <section id="basic-vertical-layouts">
                            <form class="form form-vertical" method="POST"
                                action="{{ route('user.update', $users->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row match-height">
                                    <div class="col-md-6 col-12">
                                        <div class="card">
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <div class="form-body">
                                                        <div class="row">
                                                            <div class="col-12 pb-1">
                                                                <div class="form-group">
                                                                    <img class="img-preview" alt=""
                                                                        width="100%" height="100%"
                                                                        src="{{ asset(Auth::user()->profilePhotoPath) }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="first-name-column">Nama Lengkap</label>
                                                                    <input type="text" id="first-name-column"
                                                                        class="form-control" placeholder="Nama Lengkap"
                                                                        name="name"
                                                                        value="{{ old('name') ?? $users->name }}"
                                                                        required>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="first-name-column">Email</label>
                                                                    <input type="text" id="first-name-column"
                                                                        class="form-control" placeholder="Email"
                                                                        name="email"
                                                                        value="{{ old('email') ?? $users->email }}"
                                                                        disabled>
                                                                </div>
                                                            </div>

                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="first-name-column">No Hp</label>
                                                                    <input type="text" id="first-name-column"
                                                                        class="form-control" placeholder="No Hp"
                                                                        name="phoneNumber"
                                                                        value="{{ old('phoneNumber') ?? $users->phoneNumber }}"
                                                                        required>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="first-name-column">Role</label>
                                                                    <input type="text" id="first-name-column"
                                                                        class="form-control" placeholder="Role"
                                                                        name="roles"
                                                                        value="{{ old('roles') ?? $users->roles }}"
                                                                        disabled>
                                                                </div>
                                                            </div>
                                                            <div class="py-2"></div>
                                                            <div class="col-12 d-flex justify-content-end">
                                                                <button type="submit"
                                                                    class="btn btn-primary me-1 mb-1">Simpan</button>
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
                                                <h5 class="card-title">Upload Foto</h5>
                                            </div>
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <label for="profilePhotoPath" class="upload-label">
                                                        <span class="text-bold">Drag & Drop your image</span>
                                                        <input type="file" class="upload-input"
                                                            id="profilePhotoPath" name="profilePhotoPath">
                                                    </label>
                                                    <div class="py-1"></div>

                                                    <img id="img-preview" src="" alt="Hasil Gambar :"
                                                        class="img-preview" width="100%" height="100%">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
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

    <script src="/assets/js/custom/upload-user.js"></script>
</body>

</html>
