@extends('app')
@section('content')

    <style>
        div.dataTables_wrapper div.dataTables_length select {
            width: 100% !important;
            display: inline-block;
        }
        .page-item .page-link, .page-item span {
            display: flex;
            align-items: center;
            justify-content: center;
            color: #2a2a2a !important;
            padding: 0;
            margin: 0 3px;
            border-radius: 50% !important;
            width: 36px;
            height: 36px;
            font-size: 0.875rem;
        }
    </style>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Form Order</li>
            </ol>
            <h6 class="font-weight-bolder mb-0">Form Order</h6>
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
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h3>Form order service tire</h3>
                        <form class="row" action="{{ route ('order.action') }}" method="POST">
                            @csrf
                            <div class="col-12 col-lg-4 form-group">
                                <label for="customer" class="form-control-label">Customer</label>
                                <input class="form-control text-capitalize" type="text" value="{{ $users->name }}" name="customer" id="customer" onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                            <div class="col-12 col-lg-4 form-group">
                                <label for="email" class="form-control-label">Email</label>
                                <input class="form-control" type="email" value="{{ $users->email }}" name="email" id="email" onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                            <div class="col-12 col-lg-4 form-group">
                                <label for="phone" class="form-control-label">Phone Number</label>
                                <input class="form-control" type="text" value="{{ $users->phone }}" name="phone" id="phone" onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                            <div class="col-12 col-lg-3 form-group">
                                <label for="book_date" class="form-control-label">Book Date</label>
                                <input class="form-control" type="date" name="book_date" id="book_date" onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                            <div class="col-12 col-lg-3 form-group">
                                <label for="delivery_tire" class="form-control-label">Delivery Tire</label>
                                <input class="form-control" type="date" name="delivery_tire" id="delivery_tire" onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                            <div class="col-12 col-lg-3 form-group">
                                <label for="size_tire" class="form-control-label">Size Tire</label>
                                <input class="form-control" type="text" name="size_tire" id="size_tire" onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                            <div class="col-12 col-lg-3 form-group">
                                <label for="total_tire" class="form-control-label">Total Tire</label>
                                <input class="form-control" type="number" name="total_tire" id="total_tire" min="1" onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                            <div class="col-12 col-lg-12 form-group">
                                <label for="detail_order" class="form-control-label">Spesification Tire</label>
                                <textarea class="form-control" name="detail_order" id="detail_order" cols="30" rows="4"></textarea>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-info w-50">Order</button>
                            </div>
                        </form>
                    </div> 
                </div>
            </div>
        </div>
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