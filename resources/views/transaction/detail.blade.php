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
                                <h3>Transaksi</h3>

                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item" aria-current="page"><a
                                                href="{{ route('transaction') }}">Transaksi</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Detail Transaksi</li>
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
                            <div class="row match-height">
                                <div class="col-md-6 col-12">
                                    <div class="card">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="first-name-column">Nama Player</label>
                                                                <h6 class="font-bold py-1">
                                                                    {{ $transactions->user->name }}</h6>
                                                            </div>
                                                        </div>
                                                        <div class=" col-12">
                                                            <div class="form-group">
                                                                <label for="last-name-column">Nama Game</label>
                                                                <h6 class="font-bold py-1">
                                                                    {{ $transactions->game->gameName }}</h6>
                                                            </div>
                                                        </div>

                                                        <div class=" col-12">
                                                            <div class="form-group">
                                                                <label for="last-name-column">Item</label>
                                                                <h6 class="font-bold py-1">{{ $transactions->item }}
                                                                    {{ $transactions->game->nominal_id }}</h6>
                                                            </div>
                                                        </div>
                                                        <div class=" col-12">
                                                            <div class="form-group">
                                                                <label for="last-name-column">Total Harga</label>
                                                                <h6 class="font-bold py-1">
                                                                    {{ number_format($transactions->price) }}</h6>
                                                            </div>
                                                        </div>

                                                        <div class=" col-12">
                                                            <div class="form-group">
                                                                <label for="last-name-column">Transfer Kepada</label>
                                                                <h6 class="font-bold py-1">
                                                                    {{ $transactions->bank->bankName }} -
                                                                    {{ $transactions->bank->ownerName }} -
                                                                    {{ $transactions->bank->accountNumber }}
                                                                </h6>
                                                            </div>
                                                        </div>
                                                        <div class=" col-12">
                                                            <div class="form-group">
                                                                <label for="last-name-column">Status Transaksi</label>
                                                                <div class="py-1"></div>
                                                                @if ($transactions->status == 'Pending')
                                                                    <span
                                                                        class="badge badge-warning bg-warning">{{ $transactions->status }}</span>
                                                                @elseif ($transactions->status == 'Processed')
                                                                    <span
                                                                        class="badge badge-warning bg-primary">{{ $transactions->status }}</span>
                                                                @elseif ($transactions->status == 'Success')
                                                                    <span
                                                                        class="badge badge-warning bg-success">{{ $transactions->status }}</span>
                                                                @else
                                                                    <span
                                                                        class="badge badge-warning bg-danger">{{ $transactions->status }}</span>
                                                                @endif

                                                            </div>
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
                                            <h5 class="card-title">Gambar Game</h5>
                                        </div>
                                        <div class="card-content">
                                            <div class="card-body pt-0">
                                                <img class="img-preview" alt="" width="100%" height="100%"
                                                    src="{{ $transactions->game->gamePhotoPath }}">
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
