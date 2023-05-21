@extends('app')
@section('content')


<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
        navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a>
                    </li>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Order Detail</li>
                </ol>
                <h6 class="font-weight-bolder mb-0">Order Detail</h6>
            </nav>
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                    <div class="input-group">
                        <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" placeholder="Type here...">
                    </div>
                </div>
                <ul class="navbar-nav  justify-content-end">
                    <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item px-3 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body p-0">
                            <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    <div class="container-fluid py-4">

        @foreach ($orders as $order)

        <div class="row">
            <div class="col-12 my-2">
                <div class="card">
                    <div class="card-header">
                        <h3>Detail order</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-lg-3">
                                <h5>Order Code</h5>
                                <p>{{ $order->order_code }}</p>
                            </div>
                            <div class="col-12 col-lg-3">
                                <h5>Queue number</h5>
                                @if ($order->queue_number == null)
                                <p class="text-capitalize">wait for the admin to give the queue number</p>
                                @else
                                <p>{{ $order->queue_number }}</p>
                                @endif
                            </div>
                            <div class="col-12 col-lg-3">
                                <h5>Payment Status</h5>
                                <p class="text-capitalize">{{ $order->payment_status }}</p>
                            </div>
                            <div class="col-12 col-lg-3">
                                <h5>Status</h5>
                                <p class="text-capitalize">{{ $order->status }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 my-2">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                @if ($order->price_down_payment != null)
                                <form class="row" action="{{ route ('upload.dp') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" value="{{ $order->id }}" name="order_id">
                                    <div class="col-12 col-lg-3 form-group">
                                        <label class="form-control-label">Invoice Down Payment</label>
                                        <div>
                                            <a href="{{ route ('invoice.dp',$order->id) }}"
                                                class="btn btn-icon btn-3 bg-gradient-secondary">
                                                <span class="btn-inner--icon"><i
                                                        class="ni ni-cloud-download-95"></i></span>
                                                <span class="btn-inner--text">Download Invoice</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-5 form-group">
                                        <label for="file_dp" class="form-control-label">Proof of Payment DP</label>
                                        <input class="form-control" type="file" name="file_dp" id="file_dp">
                                    </div>
                                    <div class="col-4 text-center my-auto">
                                        <button type="submit" class="btn bg-gradient-info w-50">Submit</button>
                                    </div>
                                </form>
                                @endif
                            </div>
                            <div class="col-12 my-4">
                                <div class="row">
                                    <div class="col-12 col-lg-6 text-center">
                                        <h6>Picture Down Payment</h6>
                                        @if ($order->pict_down_payment == null)
                                        <p>Have not uploaded proof of payment.</p>
                                        @else
                                        <img class="w-75 rounded" src="{{ asset ('assets/dp/'.$order->pict_down_payment) }}"
                                            alt="DownPayment">
                                        @endif
                                    </div>
                                    <div class="col-12 col-lg-6 text-center">
                                        <h6>Picture Full Payment</h6>
                                        @if ($order->pict_full_payment == null)
                                        <p>Have not uploaded proof of payment.</p>
                                        @else
                                        <img src="{{ asset ('assets/dp/'.$order->pict_full_payment) }}"
                                            alt="FullPayment">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @endforeach

        <footer class="footer pt-3  ">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6 mb-lg-0 mb-4">
                        <div class="copyright text-center text-sm text-muted text-lg-start">
                            © <script>
                                document.write(new Date().getFullYear())

                            </script>,
                            made with <i class="fa fa-heart"></i> by
                            <a href="#" class="font-weight-bold" target="_blank">Ossiana tire</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    @endsection
