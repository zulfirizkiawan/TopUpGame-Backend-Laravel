<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Bank</title>

    <link rel="stylesheet" href="/assets/css/main/app.css">
    <link rel="stylesheet" href="/assets/css/main/app-dark.css">
    <link rel="shortcut icon" href="/assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="/assets/images/logo/favicon.png" type="image/png">

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
                                <h3>Bank</h3>

                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item" aria-current="page"><a
                                                href="{{ route('bank') }}">Bank</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-content">

                    <div class="page-heading">
                        <!-- Basic Tables start -->

                        <section id="multiple-column-form">
                            <div class="row match-height">
                                <div class="col-12">
                                    <div class="card">

                                        <div class="card-content">
                                            <div class="card-body">
                                                <form class="form" method="POST" action="{{ route('bank.store') }}">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label for="first-name-column">Nama Pemilik</label>
                                                                <input type="text" id="first-name-column"
                                                                    class="form-control" placeholder="Nama Pemilik"
                                                                    name="ownerName" value="{{ old('ownerName') }}"
                                                                    required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label for="last-name-column">Nama Bank</label>
                                                                <input type="text" id="last-name-column"
                                                                    class="form-control" placeholder="Nama Bank"
                                                                    name="bankName" value="{{ old('bankName') }}"
                                                                    required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label for="city-column">Nomor Rekening</label>
                                                                <input type="number" id="city-column"
                                                                    class="form-control" placeholder="Nomor Rekening"
                                                                    name="accountNumber"
                                                                    value="{{ old('accountNumber') }}" required>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 d-flex justify-content-end">
                                                            <button type="submit"
                                                                class="btn btn-primary me-1 mb-1">Tambah</button>
                                                            <div class="px-2"></div>
                                                            <button type="reset"
                                                                class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- Basic Tables end -->
                    </div>

                </div>
            </div>

        </div>
    </div>
    <script src="/assets/js/bootstrap.js"></script>
    <script src="/assets/js/app.js"></script>

</body>

</html>
