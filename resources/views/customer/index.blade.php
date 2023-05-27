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
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Dashboard</h6>
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
          <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
              <div class="card">
              <div class="card-body p-3">
                  <div class="row">
                  <div class="col-8">
                      <div class="numbers">
                      <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Order</p>
                      <h5 class="font-weight-bolder mb-0">
                          {{ $order }}
                      </h5>
                      </div>
                  </div>
                  <div class="col-4 text-end">
                      <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                      <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                      </div>
                  </div>
                  </div>
              </div>
              </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
              <div class="card">
              <div class="card-body p-3">
                  <div class="row">
                  <div class="col-8">
                      <div class="numbers">
                      <p class="text-sm mb-0 text-capitalize font-weight-bold">Approved Order</p>
                      <h5 class="font-weight-bolder mb-0">
                          {{ $approved }}
                      </h5>
                      </div>
                  </div>
                  <div class="col-4 text-end">
                      <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                      <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                      </div>
                  </div>
                  </div>
              </div>
              </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
              <div class="card">
              <div class="card-body p-3">
                  <div class="row">
                  <div class="col-8">
                      <div class="numbers">
                      <p class="text-sm mb-0 text-capitalize font-weight-bold">Rejected Order</p>
                      <h5 class="font-weight-bolder mb-0">
                        {{ $rejected }}
                      </h5>
                      </div>
                  </div>
                  <div class="col-4 text-end">
                      <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                      <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                      </div>
                  </div>
                  </div>
              </div>
              </div>
          </div>
          <div class="col-xl-3 col-sm-6">
              <div class="card">
              <div class="card-body p-3">
                  <div class="row">
                  <div class="col-8">
                      <div class="numbers">
                      <p class="text-sm mb-0 text-capitalize font-weight-bold">Waiting Order</p>
                      <h5 class="font-weight-bolder mb-0">
                        {{ $waiting }}
                      </h5>
                      </div>
                  </div>
                  <div class="col-4 text-end">
                      <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                      <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                      </div>
                  </div>
                  </div>
              </div>
              </div>
          </div>
          </div>
      <div class="row mt-4">
      <div class="col-12 col-lg-12">
          <div class="card">
              <div class="card-body">
                  <table class="table" id="admin-table-dashboard">
                      <thead>
                          <tr>
                              <th>Queue number</th>
                              <th>Order code</th>
                              <th>Book date</th>
                              <th>Payment status</th>
                              <th>Tire status</th>
                              <th>Status</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($orders as $item)
                          <tr>
                              <td class="text-capitalize">
                                @if ($item->queue_number == null)
                                Don't have a queue number yet
                                @else
                                {{ $item->queue_number }}
                                @endif
                              </td>
                              <td class="text-capitalize">{{ $item->order_code }}</td>
                              <td class="text-capitalize">{{ $item->book_date }}</td>
                              <td class="text-capitalize">{{ $item->payment_status }}</td>
                              <td class="text-capitalize">{{ $item->tire_status }}</td>
                              <td class="text-capitalize">
                                @if ($item->status == 'rejected')
                                <p class="fw-bold text-danger">
                                  {{ $item->status }}
                                </p>
                                @elseif ($item->status == 'approved')
                                <p class="fw-bold text-success">
                                  {{ $item->status }}
                                </p>
                                @else
                                <p class="fw-bold text-warning">
                                  {{ $item->status }}
                                </p>
                                @endif
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
        $('#admin-table-dashboard').DataTable({
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