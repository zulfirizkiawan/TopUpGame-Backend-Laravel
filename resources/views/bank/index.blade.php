<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank</title>

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
                                <h3>Bank</h3>

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
                                    <div class="mb-3">
                                        <a href="{{ route('bank.create') }}"
                                            class="btn btn-sm bg-success text-bold text-light">Tambah</a>
                                    </div>
                                    <div style="border: 0.6px solid rgb(193, 193, 193);"></div>
                                    <table class="table table-striped" id="table1">
                                        <thead>
                                            <tr>
                                                <th>Nama Pemilik</th>
                                                <th>Nama Bank</th>
                                                <th>Nomor Rekening</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($banks as $bank)
                                                <tr>
                                                    <td>{{ $bank->ownerName }}</td>
                                                    <td>{{ $bank->bankName }}</td>
                                                    <td>{{ $bank->accountNumber }}</td>
                                                    <td>
                                                        <div class="buttons">
                                                            <a href="{{ route('bank.edit', $bank->id) }}"
                                                                class="btn btn-sm bg-primary text-bold text-light px-3">Edit</a>
                                                            <form action="{{ route('bank.destroy', $bank->id) }}"
                                                                method="POST" style="display: inline-block;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-sm bg-danger text-bold text-light">Hapus</button>
                                                            </form>

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
