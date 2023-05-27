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
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Admin Order</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Admin Order</h6>
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
        <div class="row mt-4">
            <div class="col-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table" id="admin-table-order">
                            <thead>
                                <tr>
                                  <th class="text-capitalize text-center">Queue Number</th>
                                  <th class="text-capitalize text-center">Order code</th>
                                  <th class="text-capitalize text-center">Book date</th>
                                  <th class="text-capitalize text-center">Payment status</th>
                                  <th class="text-capitalize text-center">Tire status</th>
                                  <th class="text-capitalize text-center">Status</th>
                                  <th class="text-capitalize text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($orders as $order)
                              <tr>
                                  @if ($order->queue_number == null)
                                      <td class="text-capitalize text-center">Waiting admin approve your order</td>
                                  @else
                                      <td class="text-capitalize text-center">{{ $order->queue_number }}</td>
                                  @endif
                                  <td>{{ $order->order_code }}</td>
                                  <td>{{ $order->book_date }}</td>
                                  <td class="text-capitalize text-center">{{ $order->payment_status }}</td>
                                  <td class="text-capitalize text-center">{{ $order->tire_status }}</td>
                                  <td class="text-capitalize text-center">{{ $order->status }}</td>
                                  <td>
                                      <a href="{{ route ('admin.detail.page', $order->id) }}" class="btn btn-primary btn-sm {{ $order->status == 'rejected' ? 'disabled':'' }}" >Detail order</a>
                                  </td>
                              </tr>
                            @endforeach
                            </tbody>
                        </table>
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

@push('script')
<script>
    $(document).ready(function () {
        $('#admin-table-order').DataTable({
            responsive: true,
            lengthMenu: [
                [5, 25, 50, -1],
                [10, 25, 50, 'All'],
            ],
        });
    });

</script>
@endpush

@endsection