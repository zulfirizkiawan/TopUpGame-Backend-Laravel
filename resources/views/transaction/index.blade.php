<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi</title>

    <link rel="stylesheet" href="/assets/css/main/app.css">
    <link rel="stylesheet" href="/assets/css/main/app-dark.css">
    <link rel="shortcut icon" href="/assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="/assets/images/logo/favicon.png" type="image/png">

    <link rel="stylesheet" href="/assets/css/shared/iconly.css">
    <link rel="stylesheet" href="/assets/css/pages/fontawesome.css">

    <link rel="stylesheet" href="/assets/extensions/simple-datatables/style.css">
    <link rel="stylesheet" href="/assets/css/pages/simple-datatables.css">

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
                        </div>
                    </div>
                </div>
                <div class="page-content">

                    <div class="page-heading">
                        <!-- Basic Tables start -->

                        <section class="section">
                            <div class="card">
                                <div class="card-body">
                                    <div style="border: 0.6px solid rgb(193, 193, 193);"></div>
                                    <table class="table table-striped" id="table1">
                                        <thead>
                                            <tr>
                                                <th>Nama Player</th>
                                                <th>Nama Game</th>
                                                <th>Item</th>
                                                <th>Total harga</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($transactions as $transaction)
                                                <tr>
                                                    <td>{{ $transaction->user->name }}</td>
                                                    <td>{{ $transaction->game->gameName }}
                                                    </td>
                                                    <td>{{ $transaction->item }} {{ $transaction->game->nominal_id }}
                                                    </td>
                                                    <td>{{ number_format($transaction->price) }}</td>
                                                    <td>
                                                        @if ($transaction->status == 'Pending')
                                                            <span
                                                                class="badge badge-warning bg-warning">{{ $transaction->status }}</span>
                                                        @elseif ($transaction->status == 'Processed')
                                                            <span
                                                                class="badge badge-warning bg-primary">{{ $transaction->status }}</span>
                                                        @elseif ($transaction->status == 'Success')
                                                            <span
                                                                class="badge badge-warning bg-success">{{ $transaction->status }}</span>
                                                        @else
                                                            <span
                                                                class="badge badge-warning bg-danger">{{ $transaction->status }}</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="buttons">

                                                            @if ($transaction->status == 'Failed' || $transaction->status == 'Success')
                                                                <a href="{{ route('transaction.show', $transaction->id) }}"
                                                                    class="btn btn-sm bg-info text-bold text-light px-3">Detail</a>
                                                            @elseif ($transaction->status == 'Pending')
                                                                <a href="{{ route('transaction.show', $transaction->id) }}"
                                                                    class="btn btn-sm bg-info text-bold text-light px-3">Detail</a>
                                                                <form
                                                                    action="{{ route('transaction.accept', $transaction->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <button type="submit"
                                                                        class="btn btn-sm bg-primary text-bold text-light px-3">Terima</button>
                                                                </form>
                                                                <form
                                                                    action="{{ route('transaction.tolak', $transaction->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('POST')
                                                                    <button type="submit"
                                                                        class="btn btn-sm bg-danger text-bold text-light px-3">Tolak</button>
                                                                </form>
                                                            @else
                                                                <a href="{{ route('transaction.show', $transaction->id) }}"
                                                                    class="btn btn-sm bg-info text-bold text-light px-3">Detail</a>
                                                                <form
                                                                    action="{{ route('transaction.selesai', $transaction->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <button type="submit"
                                                                        class="btn btn-sm bg-success text-bold text-light px-3">Selesai</button>
                                                                </form>
                                                            @endif
                                                        </div>
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

                </div>
            </div>

        </div>
    </div>
    <script src="/assets/js/bootstrap.js"></script>
    <script src="/assets/js/app.js"></script>

    <!-- Need: Apexcharts -->
    <script src="/assets/extensions/apexcharts/apexcharts.min.js"></script>
    <script src="/assets/js/pages/dashboard.js"></script>


    <script src="/assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
    <script src="/assets/js/pages/simple-datatables.js"></script>

</body>

</html>
