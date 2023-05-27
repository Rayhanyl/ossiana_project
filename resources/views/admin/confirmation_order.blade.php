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
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Detail Order</li>
                </ol>
                <h6 class="font-weight-bolder mb-0">Detail Order</h6>
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
                        <div class="row g-3">
                            <div class="col-12 col-lg-2">
                                <h5>Book date</h5>
                                <p class="detail-order-text-child text-capitalize">
                                    {{ \Carbon\Carbon::parse($order->book_date)->format('d F Y') }}</p>
                            </div>
                            <div class="col-12 col-lg-3">
                                <h5>Order code</h5>
                                <p class="detail-order-text-child">{{ $order->order_code }}</p>
                            </div>
                            <div class="col-12 col-lg-3">
                                <h5>Queue number</h5>
                                @if ($order->queue_number == null)
                                <p class="detail-order-text-child text-capitalize">wait for the admin to give the queue
                                    number</p>
                                @else
                                <p class="detail-order-text-child">{{ $order->queue_number }}</p>
                                @endif
                            </div>
                            <div class="col-12 col-lg-2">
                                <h5>Status</h5>
                                <p class="detail-order-text-child text-capitalize">{{ $order->status }}</p>
                            </div>
                            <div class="col-12 col-lg-2">
                                <h5>Payment status</h5>
                                <p class="detail-order-text-child text-capitalize">{{ $order->payment_status }}</p>
                            </div>
                            <div class="col-12 col-lg-3 text-center">
                                <h5>Tire delivery</h5>
                                <p class="detail-order-text-child text-capitalize">
                                    {{ \Carbon\Carbon::parse($order->delivery_tire)->format('d F Y') }}</p>
                            </div>
                            <div class="col-12 col-lg-3 text-center">
                                <h5>Total tire</h5>
                                <p class="detail-order-text-child text-capitalize">{{ $order->total_tire }}</p>
                            </div>
                            <div class="col-12 col-lg-3 text-center">
                                <h5>Size tire</h5>
                                <p class="detail-order-text-child text-capitalize">{{ $order->size_tire}}</p>
                            </div>
                            <div class="col-12 col-lg-3 text-center">
                                <h5>Tire status</h5>
                                <p class="detail-order-text-child text-capitalize">{{ $order->tire_status }}</p>
                            </div>
                            <div class="col-12">
                                <h5>Spesification Tire</h5>
                                <p class="detail-order-text-child-tire">{{ $order->detail_order }}</p>
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
                                @if ($order->status_dp == 'waiting'|| $order->status == 'rejected')
                                <form class="row" action="{{ route ('price.dp') }}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{ $order->id }}" name="order_id">
                                    <div class="col-12 col-lg-3 form-group">
                                        <label for="price_down_payment" class="form-control-label">Down Payment
                                            Price</label>
                                        <input class="form-control" type="number" name="price_down_payment"
                                            id="price_down_payment">
                                        <div id="nominal-dp" class="form-text"></div>
                                    </div>
                                    <div class="col my-auto">
                                        <div class="text-white">.</div>
                                        <button type="submit" class="btn bg-gradient-info">Submit</button>
                                        <div class="text-white">.</div>
                                    </div>
                                </form>
                                @elseif ($order->payment_status == 'waiting')
                                <form class="row" action="{{ route ('confirmation.order') }}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{ $order->id }}" name="order_id">
                                    <div class="col form-group">
                                        <label for="queue_number" class="form-control-label">Queue Number</label>
                                        <input class="form-control" type="number" min="1" name="queue_number"
                                            id="queue_number">
                                    </div>
                                    <div class="col form-group">
                                        <label for="status" class="form-control-label">Confirm Order Status</label>
                                        <select class="form-control" name="status" id="status">
                                            <option>-- select --</option>
                                            <option value="approved">Approved</option>
                                            <option value="rejected">Rejected</option>
                                        </select>
                                    </div>
                                    <div class="col-12 text-center">
                                        <button type="submit" class="btn bg-gradient-info w-50">Submit</button>
                                    </div>
                                </form>
                                @endif
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <h6>Picture Down Payment</h6>
                                        @if ($order->pict_down_payment == null)
                                        <p>Have not uploaded proof of payment.</p>
                                        @else
                                        <img class="rounded w-75"
                                            src="{{ asset ('assets/dp/'.$order->pict_down_payment) }}"
                                            alt="DownPayment">
                                        <div class="my-2">
                                            @if ($order->status_dp == 'rejected' || $order->status_dp == 'waiting')
                                            <form action="{{ route ('status.dp') }}" method="POST">
                                                @csrf
                                                <input type="hidden" value="{{ $order->id }}" name="order_id">
                                                <div class="form-group">
                                                    <label for="status" class="form-control-label">Confirm Payment
                                                        Dp</label>
                                                    <select class="form-control w-75" name="status" id="status">
                                                        <option>-- select --</option>
                                                        <option value="approved">Approved</option>
                                                        <option value="rejected">Rejected</option>
                                                    </select>
                                                </div>
                                                <div class="my-2">
                                                    <button type="submit" class="btn bg-gradient-info">Submit</button>
                                                </div>
                                            </form>
                                            @endif
                                        </div>
                                        @endif
                                    </div>
                                    <div class="col-12 col-lg-6 text-center">
                                        <h6>Picture Full Payment</h6>
                                        @if ($order->pict_full_payment == null)
                                        <p>Have not uploaded proof of payment.</p>
                                        @else
                                        <img src="{{ asset ('assets/dp/'.$order->pict_full_payment) }}"
                                            alt="FullPayment">
                                        <div class="my-2">
                                            @if ($order->status_fp == 'rejected' || $order->status_fp == 'waiting')
                                            <form action="{{ route ('status.fp') }}" method="POST">
                                                @csrf
                                                <input type="hidden" value="{{ $order->id }}" name="order_id">
                                                <div class="form-group">
                                                    <label for="status" class="form-control-label">Confirm Payment
                                                        Fp</label>
                                                    <select class="form-control w-75" name="status" id="status">
                                                        <option>-- select --</option>
                                                        <option value="approved">Approved</option>
                                                        <option value="rejected">Rejected</option>
                                                    </select>
                                                </div>
                                                <div class="my-2">
                                                    <button type="submit" class="btn bg-gradient-info">Submit</button>
                                                </div>
                                            </form>
                                            @endif
                                        </div>
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

    @push('script')
    <script>
        $('#price_full_payment').on('input', function () {
            var price = $('#price_full_payment').val();
            var nominal = $('#nominal-fp');
            nominal.html('Rp ' + Number(price).toLocaleString('id-ID'));
        });

        $('#price_down_payment').on('input', function () {
            var price = $('#price_down_payment').val();
            var nominal = $('#nominal-dp');
            nominal.html('Rp ' + Number(price).toLocaleString('id-ID'));
        });

    </script>
    @endpush
    @endsection
