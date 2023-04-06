<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link rel="stylesheet" href="assets/css/main/app.css">
    <link rel="stylesheet" href="assets/css/main/app-dark.css">
    <link rel="shortcut icon" href="assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="assets/images/logo/favicon.png" type="image/png">

    <link rel="stylesheet" href="assets/css/shared/iconly.css">
    <link rel="stylesheet" href="assets/css/pages/fontawesome.css">

    <link rel="stylesheet" href="assets/extensions/simple-datatables/style.css">
    <link rel="stylesheet" href="assets/css/pages/simple-datatables.css">

</head>

<body>
    <div id="app">
        @include('sidebar')

        <div id="main" class="layout-navbar">
            @include('header')
            <div id="main-content">
                <div class="page-heading">
                    <h3>Dashboard Statistik</h3>
                </div>
                <div class="page-content">
                    <section>
                        <div class="col-12 col-lg-12">
                            <div class="row">
                                <div class="col-6 col-lg-3 col-md-6">
                                    <div class="card">
                                        <div class="card-body px-4 py-4">

                                            <div
                                                class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                <div class="stats-icon purple mb-2">
                                                    <i class="iconly-boldBag"></i>
                                                </div>
                                                <div class="ms-3 name">
                                                    <h6 class="text-muted font-semibold">Transaksi</h6>
                                                    <h6 class="font-extrabold mb-0">{{ $transactions }}</h6>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-3 col-md-6">
                                    <div class="card">
                                        <div class="card-body px-4 py-4">

                                            <div
                                                class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                <div class="stats-icon blue mb-2">
                                                    <i class="iconly-boldProfile"></i>
                                                </div>
                                                <div class="ms-3 name">
                                                    <h6 class="text-muted font-semibold">Player</h6>
                                                    <h6 class="font-extrabold mb-0">{{ $users }}</h6>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-3 col-md-6">
                                    <div class="card">
                                        <div class="card-body px-4 py-4">

                                            <div
                                                class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                <div class="stats-icon green mb-2">
                                                    <i class="iconly-boldGame"></i>
                                                </div>
                                                <div class="ms-3 name">
                                                    <h6 class="text-muted font-semibold">Game</h6>
                                                    <h6 class="font-extrabold mb-0">{{ $games }}</h6>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-3 col-md-6">
                                    <div class="card">
                                        <div class="card-body px-4 py-4">

                                            <div
                                                class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                <div class="stats-icon red mb-2">
                                                    <i class="iconly-boldBookmark"></i>
                                                </div>
                                                <div class="ms-3 name">
                                                    <h6 class="text-muted font-semibold">Bank</h6>
                                                    <h6 class="font-extrabold mb-0">{{ $banks }}</h6>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>

                            </div>


                        </div>

                        <div class="page-heading">
                            <div class="page-title">
                                <div class="row">
                                    <div class="col-12 col-md-6 order-md-1 order-last">
                                        <h3>Transaksi Aktif</h3>

                                    </div>

                                </div>
                            </div>

                            <!-- Basic Tables start -->

                            <section class="section">
                                <div class="card">

                                    <div class="card-body">
                                        <table class="table table-striped" id="table1">
                                            <thead>
                                                <tr>
                                                    <th>Nama Player</th>
                                                    <th>Name Game</th>
                                                    <th>Item</th>
                                                    <th>Total Harga</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($gettransactions as $transaction)
                                                    <tr>
                                                        <td>{{ $transaction->user->name }}</td>
                                                        <td>{{ $transaction->game->gameName }}
                                                        </td>
                                                        <td>{{ $transaction->item }}
                                                            {{ $transaction->game->nominal_id }}
                                                        </td>
                                                        <td>{{ number_format($transaction->price) }}</td>
                                                        <td>
                                                            @if ($transaction->status == 'Pending')
                                                                <span
                                                                    class="badge badge-warning bg-warning">{{ $transaction->status }}</span>
                                                            @else
                                                                <span
                                                                    class="badge badge-warning bg-primary">{{ $transaction->status }}</span>
                                                            @endif
                                                        </td>

                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </section>
                            <!-- Basic Tables end -->
                        </div>
                    </section>
                </div>

            </div>
        </div>
    </div>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/app.js"></script>

    <!-- Need: Apexcharts -->
    <script src="assets/extensions/apexcharts/apexcharts.min.js"></script>
    <script src="assets/js/pages/dashboard.js"></script>


    <script src="assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
    <script src="assets/js/pages/simple-datatables.js"></script>

    <script>
        $('a').click(function() {
            var link = $(this).attr('href');
            bootbox.confirm({
                message: "Are you sure you want to logout?",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success'
                    },
                    cancel: {
                        label: 'No',
                        className: 'btn-danger'
                    }
                },
                callback: function(result) {
                    if (result) {
                        window.location.href = link;
                    }
                }
            });
            return false;
        });
    </script>


</body>

</html>
