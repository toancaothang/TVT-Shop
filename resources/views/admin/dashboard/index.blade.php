@extends('admin.app')
@section('title') Dashboard @endsection
@section('content')
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2022.2.510/styles/kendo.default-ocean-blue.min.css" />
    <script src="https://kendo.cdn.telerik.com/2022.2.510/js/jquery.min.js"></script>
    <script src="https://kendo.cdn.telerik.com/2022.2.510/js/kendo.all.min.js"></script>
    <h2 class="dash-title">Thống kê</h2>
    <div class="dash-cards">
        <div class="card-single">
            <div class="card-body">
                <span class="ti-briefcase"></span>
                <div>
                    <h5>Tổng doanh thu</h5>
                    @foreach ($ThongKeTheoThang as $a)
                    <h4> <?php
                        echo number_format($a->total,'0','.','.')
                        ?>đ</h4>
                    @endforeach
                    
                </div>
            </div>
        </div>

            <div class="card-single">
            <div class="card-body">
                <span class="ti-reload"></span>
                <div>
                    <h5>Nhập hàng</h5>
                    @foreach ($Thongkenhaphang as $a)
                    <h4> <?php
                        echo number_format($a->total,'0','.','.')
                        ?>đ</h4>
                    @endforeach
                </div>
            </div>
            </div>

            <div class="card-single">
            <div class="card-body">
                <span class="ti-check-box"></span>
                <div>
                    <h5>Tồn kho</h5>
                    @foreach ($TongSoLuong as $a)
                    <h4>{{$a->stock}}</h4>
                    @endforeach
                </div>
            </div>
            </div>
        </div>

        <section class="recent">
            <div class="activity-grid">
                <div class="activity-card">
                <h3>Biểu đồ thống kê doanh thu</h3>
                <div id="thongkechart"></div>
                </div>

                <div class="summary">
                <div class="summary-card">
                    <div class="summary-single">
                    <span class="ti-id-badge"></span>
                    <div>
                        @foreach ($SPSapHetHang as $a)
                            <h5>{{$a->dem}}</h5>
                        @endforeach
                        <small>Sản phẩm sắp hết hàng</small>
                    </div>
                    </div>
                    <div class="summary-single">
                    <span class="ti-calendar"></span>
                    <div>
                        @foreach ($SPHetHang as $a)
                            <h5>{{$a->dem}}</h5>
                        @endforeach
                        <small>Sản phẩm hết hàng</small>
                    </div>
                    </div>
                </div>

                </div>
            </div>
        </section>
    </div>
    <script>

$(document).ready(function(){
    var dataNhap = [];
    var dataBan = [];
    var Nhap=[];
    var Ban=[];
    for(i=1;i<=12;i++){
        Nhap.push({thang: i,total: 0});
    }
    for(i=1;i<=12;i++){
        Ban.push({thang: i,total: 0});
    }

    $.ajax({
        url:'{{route('ThongKeBanHang')}}',
        type: "GET",
        dataType: "json",
        success:function(data){
            for(i=0;i<Nhap.length;i++){
                for(j=0;j<data.length;j++){
                    if(Nhap[i].thang == data[j].thang)
                    {
                        Nhap[i].total = data[j].total;
                    }
                }
                dataBan.push(Nhap[i].total);
            }
        },
        error:function(error){
            console.log(error)
        }
    });
    $.ajax({
        url:'{{route('ThongkeNhapHang')}}',
        type: "GET",
        dataType: "json",
        success:function(data){
            for(i=0;i<Ban.length;i++){
                for(j=0;j<data.length;j++){
                    if(Ban[i].thang == data[j].thang)
                    {
                        Ban[i].total = data[j].total;
                    }
                }
                dataNhap.push(Ban[i].total);
            }
        },
        error:function(error){
            console.log(error)
        }
    });
    console.log(dataNhap);
    var aaa = dataNhap;
    var bbb = dataBan;
    console.log(dataBan);
    $("#thongkechart").kendoChart({
        legend: {
            position: "top"
        },
        seriesDefaults: {
            type: "column"
        },
        series: [{
            name: "Nhập hàng",
            data: dataNhap,
        }, {
            name: "Bán hàng",
            data: dataBan,
        }],
        valueAxis: {
            labels: {
                template: "#= kendo.format('{0:N0}', value/1000000) # Tr"
            },
            line: {
                visible: false
            },
            axisCrossingValue: 0
        },
        categoryAxis: {
            categories: ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10","Tháng 11","Tháng 12"],
            line: {
                visible: false
            },
            labels: {
                padding: {top: 50}
            }
        },

    });

})
    </script>

{{--custom css item suggest search--}}
<style>
    .autocomplete-suggestions { border: 1px solid #999; background: #FFF; overflow: auto; }
    .autocomplete-suggestion { padding: 2px 5px; white-space: nowrap; overflow: hidden; }
    .autocomplete-selected { background: #F0F0F0; }
    /*.autocomplete-suggestions strong { font-weight: normal; color: #3399FF; }*/
    .autocomplete-group { padding: 2px 5px; }
    .autocomplete-group strong { display: block; border-bottom: 1px solid #000; }
</style>
@endsection