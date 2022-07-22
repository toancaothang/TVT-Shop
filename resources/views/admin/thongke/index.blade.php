@extends('admin.app')
@section('content')
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2022.2.510/styles/kendo.default-ocean-blue.min.css" />
    <script src="https://kendo.cdn.telerik.com/2022.2.510/js/jquery.min.js"></script>
    <script src="https://kendo.cdn.telerik.com/2022.2.510/js/kendo.all.min.js"></script>
    <script src="https://kendo.cdn.telerik.com/2022.2.621/js/jszip.min.js"></script>
    <h4 class="dash-title">Thống kê</h4>
    <div class="dash-cards" >
        <section class="recent" style="margin-top: 0px">
            <div class="activity-grid">
                <div class="activity-card" style="width:1050px!important;">
                    <div id="tabstrip">
                        <ul>
                            <li>
                                Theo ngày
                            </li>
                            <li>
                                Theo tháng
                            </li>
                        </ul>
                        <div>
                            <h3>Biểu đồ thống kê doanh thu trong tháng</h3>
                            <select id="TheoThang" name="TheoThang" style="margin-left:30px;width:150px">
                                @for ($i = 1;$i<=12;$i++)
                                {
                                    <option value="{{ $i }}">Tháng {{ $i }}</option>
                                }  
                            @endfor
                            </select>
                            <select id="TheoNam" name="TheoNam" style="width:200px" >
                                <option value="2022" selected>Năm 2022</option>
                                <option value="2023">Năm 2023</option>
                            </select>
                            <button type="submit" onclick="TimkiemthongkeTheoThang()" class="button type2">Tìm kiếm</button>
                            <div class="chart" id="chart"></div>
                            <div class="charttheothang" id="charttheothang"></div>
                        </div>
                        <div>
                            <h3>Biểu đồ thống kê doanh thu trong năm</h3>
                                <select id="TheoNam1" name="TheoNam1" style="margin-left:30px;width:150px">
                                    <option value="2022">Năm 2022</option>
                                    <option value="2023">Năm 2023</option>
                                </select>
                                <button type="submit" onclick="TimkiemthongkeTheoNam()" class="button type2">Tìm kiếm</button>
                            <div class="chart" id="chart1"></div>
                        </div>
                    
            </div>
        </section>
    </div>
    <div class="dash-cards" >
        <section class="recent" style="margin-top: 3px">
            <h4 class="dash-title">Bảng thống kê doanh thu bán hàng</h4>
            <div class="activity-grid">
                    <div class="activity-card" style="width:1050px">
                        <div style="margin-bottom: 10px; float:right">
                            <select id="ChonThongKe" style="margin-left:30px;width:150px;width:200px">
                                    <option value="0">Bán chạy nhất</option> 
                                    <option value="1">Doanh thu cao nhất</option> 
                            </select>
                        </div>
                        <div class="table-responsive">
                              <div id="ThongkeSanPham"></div>
                           </div>
                        </div>
                    </div>
                </div>
            </section>
    </div>
    <script>
        var dataThang = [];
        var dataNgay = [];
        var b=[];
        var ngay =[];
        var theongay=[];
    function From(){
        $("#TheoThang").kendoDropDownList({
        });
        $("#TheoNam").kendoDropDownList({
        });
        $("#TheoNam1").kendoDropDownList({
        });
        $("#ChonThongKe").kendoDropDownList({
            select: chonphuongthuc,
        });
        $("#chart").kendoChart({
            legend: {
                position: "top"
            },
            seriesDefaults: {
                type: "column"
            },
            dataSource: [],
            series: [
                { field: "Value" }
            ],
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
                categories: ngay,
                line: {
                    visible: false
                },
                labels: {
                    padding: {top: 50}
                }
            },
            tooltip: {
                visible: true,
                format: "{0}%",
                template: '#= kendo.toString(value,"n0")# đ'
            }
        });
        $("#chart1").kendoChart({
            legend: {
                position: "top"
            },
            seriesDefaults: {
                type: "column"
            },
            dataSource: [],
            series: [
                { field: "Value" }
            ],
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
            tooltip: {
                visible: true,
                format: "{0}%",
                template: '#= kendo.toString(value,"n0")# đ'
            }
        });
    }
    function TimkiemthongkeTheoThang(){
        var Thang = $("#TheoThang").val();
        var Nam = $("#TheoNam").val();
        var Tong =[];
        Tong.push(Thang);
        Tong.push(Nam);
        var url = '{{ route("TimKiemThongKeTheoNgay",":Tong") }}';
            url = url.replace(':Tong', Tong);
        $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                success: function(data){
                    var dataThang = [];
                var dataNgay = [];
                var b=[];
                var ngay =[];
                var theongay=[];
                for(i=1;i<=12;i++){
                        b.push({thang: i,total: 0});
                    }
                for(i=1;i<=30;i++){
                    theongay.push({ngay:i,total: 0});
                    ngay.push(i);
                }
                for(i=0;i<theongay.length;i++){
                    for(j=0;j<data.length;j++){
                        if(theongay[i].ngay == data[j].ngay)
                        {
                            theongay[i].total = data[j].total;
                        }
                    }
                    dataNgay.push({Value: parseInt(theongay[i].total)});
                }
                var chart = $("#chart").data("kendoChart");
                    var dataSource = new kendo.data.DataSource( {
                    data: dataNgay
                    });
                    chart.setDataSource(dataSource);
                },
                error:function(error){
                    console.log(error)
                }
            });
    }
    function TimkiemthongkeTheoNam(){
        var TKNam = $("#TheoNam1").val();
        var url = '{{ route("TimKiemTheoNam", ":TKNam") }}';
        url = url.replace(':TKNam', TKNam);
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            success: function(data){
                var dataThang = [];
                var b=[];
                for(i=1;i<=12;i++){
                    b.push({thang: i,total: 0});
                }
                for(i=0;i<b.length;i++){
                    for(j=0;j<data.length;j++){
                        if(b[i].thang == data[j].thang)
                        {
                            b[i].total = data[j].total;
                        }
                    }
                    dataThang.push(b[i].total);
                }
                var chart = $("#chart1").data("kendoChart");
                    var dataSource = new kendo.data.DataSource( {
                    data: dataThang
                });
                chart.setDataSource(dataSource);
            },
            error:function(error){
                console.log(error)
            }
        });
    }
    function chonphuongthuc(e) {
        var dataItem = e.dataItem;
        if(dataItem.value == 1){
            doanhthucaonhat();
        }else{
            banchaynhat();
        }
    }
    function GoiDuLieu(){
        $.ajax({
            url:'{{route('ThongKeTheoThang')}}',
            type: "GET",
            dataType: "json",
            success:function(data){
                LoadSo();
                for(i=0;i<b.length;i++){
                    for(j=0;j<data.length;j++){
                        if(b[i].thang == data[j].thang)
                        {
                            b[i].total = data[j].total;
                        }
                    }
                    dataThang.push(b[i].total);
                }
                var chart = $("#chart1").data("kendoChart");
                    var dataSource = new kendo.data.DataSource( {
                    data: dataThang
                });
                chart.setDataSource(dataSource);
            },
            error:function(error){
                console.log(error)
            }
        });
        $.ajax({
            url:'{{route('ThongKeTheoNgay')}}',
            type: "GET",
            dataType: "json",
            success:function(data){
                LoadSo();
                for(i=0;i<theongay.length;i++){
                    for(j=0;j<data.length;j++){
                        if(theongay[i].ngay == data[j].ngay)
                        {
                            theongay[i].total = data[j].total;
                        }
                    }
                    dataNgay.push({Value: parseInt(theongay[i].total)});
                }
                var chart = $("#chart").data("kendoChart");
                    var dataSource = new kendo.data.DataSource( {
                    data: dataNgay
                    });
                    chart.setDataSource(dataSource);

            },
            error:function(error){
                console.log(error)
            }
        });
        $.ajax({
            url:'{{route('LoadBangDanhSach')}}',
            type: "GET",
            dataType: "json",
            success:function(data){
                var dataSource = new kendo.data.DataSource({
                data: data,
                pageSize: 5,
                });
                var grid = $("#ThongkeSanPham").data("kendoGrid");
                grid.setDataSource(dataSource);
                document.getElementsByClassName('k-button-text')[0].innerHTML = 'Xuất file excel';
                
            },
            error:function(error){
                console.log(error)
            }
        });
    }
    function banchaynhat(){
        $.ajax({
            url:'{{route('LoadBangDanhSach')}}',
            type: "GET",
            dataType: "json",
            success:function(data){
                var dataSource = new kendo.data.DataSource({
                data: data,
                pageSize: 5,
                });
                var grid = $("#ThongkeSanPham").data("kendoGrid");
                grid.setDataSource(dataSource);
                document.getElementsByClassName('k-button-text')[0].innerHTML = 'Xuất file excel';
                
            },
            error:function(error){
                console.log(error)
            }
        });
    }
    function doanhthucaonhat(){
        $.ajax({
            url:'{{route('Doanhthucaonhat')}}',
            type: "GET",
            dataType: "json",
            success:function(data){
                var dataSource = new kendo.data.DataSource({
                data: data,
                pageSize: 5,
                });
                var grid = $("#ThongkeSanPham").data("kendoGrid");
                grid.setDataSource(dataSource);
                document.getElementsByClassName('k-button-text')[0].innerHTML = 'Xuất file excel';
                
            },
            error:function(error){
                console.log(error)
            }
        });
    }
    $(document).ready(function(){
        
        $("#tabstrip").kendoTabStrip({
            animation:  {
                open: {
                    effects: "fadeIn"
                }
            }
        });
        for(i=1;i<=12;i++){
                b.push({thang: i,total: 0});
            }
        for(i=1;i<=30;i++){
            theongay.push({ngay:i,total: 0});
            ngay.push(i);
        }
        GoiDuLieu();
        From();
        LoadDanhSach();
    })
    function LoadDanhSach(){
        $('#ThongkeSanPham').kendoGrid({
            dataSource:[],
            sortable: true,
            pageable: true,
            groupable: true,
            height: 350,
            toolbar: ["excel"],
            pageable: {
                messages: {
                    display: "Dữ liệu báo cáo không tính các đơn hàng có trạng thái huỷ"
                }
            },
            groupable: {
                messages: {
                    empty: "Kéo tiêu đề cột và thả vào đây để nhóm theo cột đó"
                }
            },
            columns: [{
                title: "STT",
                template: "#= ++record #",
                width: 60
            },{
                template: '<div class="customer-photo"' +
                'style="background-image: url(\'{!! url("website/product/#:data.image#") !!}\')"></div>' +
                '<div class="customer-name">#: model_name #</div>',
                field: "model_name",
                title: "Tên sản phẩm",
                width: 340
            }, {
                field: "branch_name",
                title: "Danh mục"
            }, {
                field: "soluong",
                title: "Đã bán"
            }, {
                template:'<span>#= kendo.toString(tongtien, "n0")# đ</span>',
                field: "tongtien",
                title: "Tổng tiền"
            }],
            dataBinding: function() {
                record = (this.dataSource.page() -1) * this.dataSource.pageSize();
            },
        });
    }
    function LoadSo(){
        var dataThang = [];
        var dataNgay = [];
        var b=[];
        var ngay =[];
        var theongay=[];
        for(i=1;i<=12;i++){
                b.push({thang: i,total: 0});
            }
        for(i=1;i<=30;i++){
            theongay.push({ngay:i,total: 0});
            ngay.push(i);
        }
    }
    </script>
@endsection