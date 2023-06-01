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
                        <h3 class="mb-4">Inspect Tire Order</h3>
                        <div class="row">
                            @if ($inspection != null)
                                @foreach ($inspection as $item)
                                <div class="col-12">
                                    <p>Detail inspection</p>
                                    <div class="row">
                                        <div class="col-12 col-lg-3">
                                            <p>Tire Arrival : {{ $item->tire_arrival }}</p>
                                        </div>
                                        <div class="col-12 col-lg-3">
                                            <p class="text-capitalize">Damage Type: {{ $item->damage_type }}</p>
                                        </div>
                                        <div class="col-12 col-lg-3">
                                            <p>Costs: Rp {{ number_format($item->inspection_costs, 0, ',', '.') }}</p>
                                        </div>
                                        @if($item->order->payment_status == 'paid')
                                        <div class="col-12 col-lg-3">
                                            <form class="row" action="{{ route ('success.reparation') }}" method="POST">
                                                @csrf
                                                <input type="hidden" value="{{ $order->id }}" name="order_id">
                                                <div class="col my-auto">
                                                    <button type="submit" class="btn bg-gradient-primary" {{ $item->order->tire_status == 'success' ? 'disabled':''}}>Tires have been taken</button>
                                                </div>
                                            </form>
                                        </div>
                                        @else
                                        <div class="col-12 col-lg-3 text-center">
                                            <a href="{{ route ('manager.scheduller.page', $item->id) }}" class="btn btn-icon btn-3 bg-gradient-primary rounded-pill">
                                                <span class="btn-inner--icon"><i class="ni ni-calendar-grid-58"></i> </span>
                                                <span class="btn-inner--text">Scheduller Tire</span>
                                            </a>
                                        </div>
                                        @endif
                                    </div>
                                    <hr>
                                </div>  
                                @endforeach
                                    @if ($item->order->tire_status == 'success')
                                    <p class="fw-bold">Ban Telah selesai di reparasi</p>
                                    @else
                                    <div class="col-12">
                                        <form class="row" action="{{ route ('manager.inspect.action') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="order_id" id="order_id" value="{{ $order->id }}">
                                            <input type="hidden" name="user_id" id="user_id" value="{{ $order->user_id }}">
                                            <div class="col-12 col-lg-3 form-group">
                                                <label for="tire_arrival" class="form-control-label">Tire Arrival</label>
                                                <input class="form-control" type="date" name="tire_arrival"
                                                    id="tire_arrival">
                                            </div>
                                            <div class="col-12 col-lg-3 form-group">
                                                <label for="damage_type" class="form-control-label">Damage Type</label>
                                                <select class="form-control" name="damage_type" id="damage_type">
                                                    <option>-- select --</option>
                                                    <option value="minor">Minor</option>
                                                    <option value="major">Major</option>
                                                </select>
                                            </div>
                                            <div class="col-12 col-lg-3 form-group">
                                                <label for="inspection_cost" class="form-control-label">Inspection cost</label>
                                                <input class="form-control" type="number" name="inspection_cost"
                                                    id="inspection_cost">
                                                <div id="cost_inspect" class="form-text"></div>
                                            </div>
                                            <div class="col-12 col-lg-3 form-group">
                                                <label for="file_inspection" class="form-control-label">File Inspection</label>
                                                <input class="form-control" type="file" name="file_inspection"
                                                    id="file_inspection">
                                            </div>
                                            <div class="col-12 text-center">
                                                <div class="text-white">.</div>
                                                <button type="submit" class="btn bg-gradient-info w-45">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                    @endif
                                @endif
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
        $('#inspection_cost').on('input', function () {
            var price = $('#inspection_cost').val();
            var nominal = $('#cost_inspect');
            nominal.html('Rp ' + Number(price).toLocaleString('id-ID'));
        });

    </script>
    @endpush

    @endsection
