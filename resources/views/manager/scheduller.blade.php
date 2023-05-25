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
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Scheduller Tire</li>
                </ol>
                <h6 class="font-weight-bolder mb-0">Scheduller Tire</h6>
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

        @foreach ($inspection as $item)
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route ('manager.detail.page', $item->order->id)}}">Back</a>
                    <h3>Scheduller Tire</h3>
                    <hr>
                    <div class="row">
                        <div class="col-12 col-lg-4">
                            <h5>Queue number</h5>
                            <p class="fs-5">{{ $item->order->queue_number }}</p>
                        </div>
                        <div class="col-12 col-lg-4">
                            <h5>Total Tire</h5>
                            <p class="fs-5">{{ $item->order->total_tire }}</p>
                        </div>
                        <div class="col-12 col-lg-4">
                            <h5>Size Tire</h5>
                            <p class="fs-5">{{ $item->order->size_tire }}</p>
                        </div>
                        <hr>
                        <div class="col-12">
                            <form class="row" action="{{ route ('manager.scheduller.action') }}" method="POST">
                                @csrf
                                <input type="hidden" name="order_id" value="{{ $item->order->id }}">
                                <input type="hidden" name="inspection_id" value="{{ $item->id }}">
                                <input type="hidden" name="total_tire" value="{{ $item->order->total_tire }}">
                                <div class="col-12 col-lg-2 form-group">
                                    <label for="initial_inspection" class="form-control-label">Initial
                                        Inspection</label>
                                    <input class="form-control" type="number" min="1" name="initial_inspection"
                                        id="initial_inspection">
                                </div>
                                <div class="col-12 col-lg-2 form-group">
                                    <label for="washing" class="form-control-label">Washing</label>
                                    <input class="form-control" type="number" min="1" name="washing" id="washing">
                                </div>
                                <div class="col-12 col-lg-2 form-group">
                                    <label for="hotroom" class="form-control-label">Hot Room</label>
                                    <input class="form-control" type="number" min="1" name="hotroom" id="hotroom">
                                </div>
                                <div class="col-12 col-lg-2 form-group">
                                    <label for="flexible_buffing" class="form-control-label">Flexible Buffing</label>
                                    <input class="form-control" type="number" min="1" name="flexible_buffing"
                                        id="flexible_buffing">
                                </div>
                                <div class="col-12 col-lg-2 form-group">
                                    <label for="tire_washing" class="form-control-label">Tire Washing</label>
                                    <input class="form-control" type="number" min="1" name="tire_washing"
                                        id="tire_washing">
                                </div>
                                <div class="col-12 col-lg-2 form-group">
                                    <label for="cementing" class="form-control-label">Cementing</label>
                                    <input class="form-control" type="number" min="1" name="cementing" id="cementing">
                                </div>
                                <div class="col-12 col-lg-2 form-group">
                                    <label for="building_perfection" class="form-control-label">Building
                                        Perfection</label>
                                    <input class="form-control" type="number" min="1" name="building_perfection"
                                        id="building_perfection">
                                </div>
                                <div class="col-12 col-lg-2 form-group">
                                    <label for="grooving" class="form-control-label">Grooving</label>
                                    <input class="form-control" type="number" min="1" name="grooving" id="grooving">
                                </div>
                                <div class="col-12 col-lg-2 form-group">
                                    <label for="curing" class="form-control-label">Curing</label>
                                    <input class="form-control" type="number" min="1" name="curing" id="curing">
                                </div>
                                <div class="col-12 col-lg-2 form-group">
                                    <label for="finishing" class="form-control-label">Finishing</label>
                                    <input class="form-control" type="number" min="1" name="finishing" id="finishing">
                                </div>
                                <div class="col-12 col-lg-2 form-group">
                                    <label for="final_inspection" class="form-control-label">Final Inspection</label>
                                    <input class="form-control" type="number" min="1" name="final_inspection"
                                        id="final_inspection">
                                </div>
                                <div class="col-12 col-lg-2 form-group">
                                    <label for="total_hour" class="form-control-label">Total Hours</label>
                                    <input class="form-control" type="number" min="1" name="total_hour" id="total_hour">
                                </div>
                                <div class="col-12 col-lg-4 form-group">
                                    <label for="start_reparation_date" class="form-control-label">Start Reparation
                                        Date</label>
                                    <input class="form-control" type="date" min="1" name="start_reparation_date"
                                        id="start_reparation_date">
                                </div>
                                <div class="col-12 col-lg-4 form-group">
                                    <label for="end_reparation_date" class="form-control-label">End Reparation
                                        Date</label>
                                    <input class="form-control" type="date" min="1" name="end_reparation_date"
                                        id="end_reparation_date">
                                </div>
                                <div class="col-12 col-lg-4 form-group">
                                    <label for="estimasi_due_date" class="form-control-label">Estimasi Due Date</label>
                                    <input class="form-control" type="date" min="1" name="estimasi_due_date"
                                        id="estimasi_due_date">
                                </div>
                                <div class="col-12 text-center my-2">
                                    <button type="submit" class="btn bg-gradient-primary w-50">Submit</button>
                                </div>
                            </form>
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
