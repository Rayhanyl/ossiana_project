<html>
<head>
    <title>Production Report</title>
</head>
<style type="text/css">
    body{
        font-family: 'Roboto Condensed', sans-serif;
    }

    .text-capitalize{
        text-transform: capitalize;
    }

    .text-order{
        font-size: 32px;
        padding: 10px;
        text-align: center;
        font-weight: bold;
    }
    .m-0{
        margin: 0px;
    }
    .p-0{
        padding: 0px;
    }
    .pt-5{
        padding-top:5px;
    }
    .mt-10{
        margin-top:10px;
    }
    .text-center{
        text-align:center !important;
    }
    .w-100{
        width: 100%;
    }
    .w-50{
        width:50%;   
    }
    .w-70{
        width:70%;   
    }
    .w-85{
        width:85%;   
    }
    .w-30{
        width:30%;   
    }
    .w-25{
        width:25%;   
    }
    .w-15{
        width:15%;   
    }
    .logo img{
        width:45px;
        height:45px;
        padding-top:30px;
    }
    .logo span{
        margin-left:8px;
        top:19px;
        position: absolute;
        font-weight: bold;
        font-size:25px;
    }
    .gray-color{
        color:#5D5D5D;
    }
    .text-bold{
        font-weight: bold;
    }
    .border{
        border:1px solid black;
    }
    table tr,th,td{
        border: 1px solid #d2d2d2;
        border-collapse:collapse;
        padding:7px 8px;
    }
    table tr th{
        background: #F4F4F4;
        font-size:15px;
    }
    table tr td{
        font-size:13px;
    }
    table{
        border-collapse:collapse;
    }
    .box-text p{
        line-height:10px;
    }
    .float-left{
        float:left;
    }
    .total-part{
        font-size:16px;
        line-height:12px;
    }
    .total-right p{
        padding-right:20px;
    }
</style>
<body>
    <div class="head-title">
        <h1 class="text-center m-0 p-0">Production Report</h1>
    </div>
    <div class="add-detail mt-10">
        <div class="w-50 float-left mt-10">
            <p class="m-0 pt-5 text-bold w-100">PT.Ossiana Sakti Ekamaju</p>
            <p class="m-0 pt-5 text-bold w-100">Date - <span class="gray-color">{{ $formattedDateTime }}</span></p>
        </div>
        <div style="clear: both;"></div>
    </div>
    <div class="table-section bill-tbl w-100 mt-10">
        <table class="table w-100 mt-10">
            <tr>
                <th class="w-25">Total Order</th>
                <th class="w-25">Approved</th>
                <th class="w-25">Waiting</th>
                <th class="w-25">Rejected</th>
            </tr>
            <tr>
                <td>
                    <div class="box-text">
                        <p class="text-order">{{ $order }}</p>
                    </div>
                </td>
                <td>
                    <div class="box-text">
                        <p class="text-order">{{ $approved }}</p>
                    </div>
                </td>
                <td>
                    <div class="box-text">
                        <p class="text-order">{{ $waiting }}</p>
                    </div>
                </td>
                <td>
                    <div class="box-text">
                        <p class="text-order">{{ $rejected }}</p>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="table-section bill-tbl w-100 mt-10">
        <table class="table w-100 mt-10">
            <tr>
                <th class="">Customer</th>
                <th class="">Order Code</th>
                <th class="">Book Date</th>
                <th class="">Tire Status</th>
                <th class="">Payment</th>
                <th class="">Status</th>
            </tr>
            @foreach ($orders as $item)
            <tr align="center">
                <td class="text-capitalize">{{ $item->user->name }}</td>
                <td>{{ $item->order_code }}</td>
                <td>{{ $item->book_date }}</td>
                <td class="text-capitalize">{{ $item->tire_status }}</td>
                <td class="text-capitalize">{{ $item->payment_status }}</td>
                <td class="text-capitalize">{{ $item->status }}</td>
            </tr>
            @endforeach
        </table>
    </div> 
</body>
</html>