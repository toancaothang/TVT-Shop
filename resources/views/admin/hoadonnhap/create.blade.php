   @extends('admin/app')
@section('title') Dashboard @endsection
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<base href="https://demos.telerik.com/kendo-ui/dropdownlist/template">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://kendo.cdn.telerik.com/2022.2.621/styles/kendo.default-ocean-blue.min.css" />
<script src="https://kendo.cdn.telerik.com/2022.2.621/js/jquery.min.js"></script>
<script src="https://kendo.cdn.telerik.com/2022.2.621/js/kendo.all.min.js"></script>
<section class="recent" style="margin-top: 0px;">
  <div class="activity-card" style="width:1050px">
    <div class="content" style="padding-top: 10px; padding-bottom:0px">
        <div class="container">
            <div class="row align-items-stretch no-gutters contact-wrap">
                <form class="mb-5" method="POST" action="{{route('xylythemHDN')}}" style="margin-left :20px; width:100%">
                    @csrf
            <div class="col-md-12">

                <div class="form h-100" style="padding-bottom: 0px">
                <h3>Thêm mới hoá đơn</h3>
                    <div class="row">
                        <div class="col-md-6 form-group mb-3">
                            <label for="" class="col-form-label">Đơn vị bán hàng</label>
                            <input id="txtNhaSanXuat" required>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="" class="col-form-label">Chọn sản phẩm *</label>
                            <input id="txtTenSP"  class="form-control" name="title" required>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="" class="col-form-label">Số điện thoại *</label>
                            <input id="txtSoDienThoai" type="text" class="form-control" name="phone_number" id="phone_number" placeholder="Nhập số điện thoại" required>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="" class="col-form-label">Nhập số lượng *</label>
                            <input id="txtSoLuong" type="number" class="form-control" name="title" id="title" placeholder="Nhập số lượng" required>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="" class="col-form-label">Địa chỉ *</label>
                            <input id="txtDiaChi" type="text" class="form-control" name="deliver_address" id="deliver_address" placeholder="Nhập địa chỉ" required>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="" class="col-form-label">Đơn giá</label>
                            <input id="txtDonGia" type="number" class="form-control" placeholder="Nhập đơn giá" name="title" >
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="" class="col-form-label">Ghi chú *</label>
                            <input id="txtGhiChu" type="text" class="form-control" name="notes" id="notes" placeholder="Thêm ghi chú" required>
                        </div>
                    </div>
          
                <div  style="margin-bottom: 20px; float:right"><a style="font-size:13px" onclick="themmoiloaisanpham()"  class="button type2">Thêm sản phẩm</a></div>
                <h4>Chi tiết hoá đơn</h4>
                <div class="table-responsive" style="margin-bottom:30px">
                    <table id="chitiethoadonnhap" style="margin-bottom:30px">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Đơn giá</th>
                            <th>Thành tiền</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>

                        </tbody>
                      </table>
                      <div style="float: right">
                        <div style="margin-top: 5px;margin-bottom: 5px">
                            <label>Số lượng</label>
                            <input  id="txtSoLuongSP" class="form-control" type="text" readonly>
                        </div>
                        <div style="margin-top: 5px;margin-bottom: 5px">
                            <label>Tổng tiền</label>
                            <input id="txtTongTienSP" class="form-control" type="text" readonly>
                        </div>
                        <div style="margin-top: 5px;margin-bottom: 5px">
                            <label>VAT(10%)</label>
                            <input id="txtVAT" class="form-control" type="text" readonly>
                        </div>
                        <div style="margin-top: 5px;margin-bottom: 5px">
                            <label>Tiền cần trả</label>
                            <input id="txtTienCanTra" class="form-control" type="text" readonly>
                        </div>
                    </div>
                  </div>
                  <div class="row" style="float:right;margin-top: 5px;margin-bottom: 5px">
                    <div class="col-md-12 form-group" style="height: 20px;">
                        <a style="font-size:20px;" onclick="ChangeData()" class="button type2">Thêm</a>
                    </div>
                    </div>
                </form>
                </div>

            </div>
            </div>
            </div>
        </div>
        </div>

    </div>
  </div>


</section>
<script>
    function onChangeSanPham(e){
        if (e.dataItem) {
            var dataItem = e.dataItem;
            var id = dataItem.id;
            var url = '{{ route("GetDanhSachSanPham", ":id") }}';
            url = url.replace(':id', id);
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                success: function(data){
                    if(data != null){
                        var dataSource = new kendo.data.DataSource({
                        data: data,
                        });
                        var dropdownlist = $("#txtTenSP").data("kendoDropDownList");
                        dropdownlist.setDataSource(data);
                    }
                },
                error:function(error){
                    console.log(error)
                }
            });
        }
    }
    var SoLuongSP =0;
    var TongTienSP = 0;
function themmoiloaisanpham() {
    var tenSP = $("#txtTenSP").data("kendoDropDownList").text();
    var ssss = $("#txtTenSP").data("kendoDropDownList").value();
    var Soluong = $("#txtSoLuong").val();
    var DonGia = $("#txtDonGia").val();
    if(tenSP == "" || ssss == "")
    { 
        alert("Vui lòng nhập tên sản phẩm trước khi thêm");
    }else if(Soluong == ""){
        alert("Vui lòng nhập số lượng trước khi thêm");
    }
    else if(DonGia == ""){
        alert("Vui lòng nhập đơn giá trước khi thêm");
    }else{
        $("#txtNhaSanXuat").data("kendoDropDownList").readonly();
        var table = document.getElementById("chitiethoadonnhap");
        var row = table.insertRow(1);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        var cell5 = row.insertCell(4);
        var cell6 = row.insertCell(5);
        var tongtien = (Soluong * DonGia).toString();
        cell1.innerHTML = $("#txtTenSP").data("kendoDropDownList").value();
        cell2.innerHTML = tenSP;
        cell3.innerHTML = Soluong;
        cell4.innerHTML = DonGia.replace(/\B(?=(\d{3})+(?!\d))/g, '.') + 'đ';
        cell5.innerHTML = tongtien.replace(/\B(?=(\d{3})+(?!\d))/g, '.') + 'đ';
        cell6.innerHTML = "<button style='font-size:11px' onclick='deleteRow(this)'  class='button type2'>Xoá</button>";
        SoLuongSP += parseInt(Soluong);
        TongTienSP += parseInt(tongtien);
        };
        var tien = TongTienSP.toString();
        $("#txtSoLuongSP").val(SoLuongSP);
        $("#txtTongTienSP").val(tien.replace(/\B(?=(\d{3})+(?!\d))/g, '.') + 'đ');
        var b = parseInt(TongTienSP);
        var VAT = (b/10);
        var GTGT = VAT.toString();
        $("#txtVAT").val(GTGT.replace(/\B(?=(\d{3})+(?!\d))/g, '.') + 'đ');
        var TienTra = TongTienSP + VAT;
        var TienCanTra = TienTra.toString();
        $("#txtTienCanTra").val(TienCanTra.replace(/\B(?=(\d{3})+(?!\d))/g, '.') + 'đ');
    }
    
    var tableID ="chitiethoadonnhap";
    
    function deleteRow(currentRow) {
        try {
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;
            for (var i = 0; i < rowCount; i++) {
                var row = table.rows[i];
                /*var chkbox = row.cells[0].childNodes[0];*/
                /*if (null != chkbox && true == chkbox.checked)*/

                if (row==currentRow.parentNode.parentNode) {
                    if (rowCount <= 1) {
                        alert("Cannot delete all the rows.");
                        break;
                    }
                    var SoLuong = parseInt(table.rows[i].getElementsByTagName("td")[2].innerHTML);
                    var tongtien = table.rows[i].getElementsByTagName("td")[4].innerHTML;
                    var xoacham = tongtien.split('.').join('');
                    const xoad = xoacham.slice(0, -1);
                    TongTienSP -= xoad;
                    SoLuongSP -= SoLuong;
                    var tien = TongTienSP.toString();
                    $("#txtSoLuongSP").val(SoLuongSP);
                    $("#txtTongTienSP").val(tien.replace(/\B(?=(\d{3})+(?!\d))/g, '.') + 'đ');
                    var b = parseInt(TongTienSP);
                    var VAT = (b/10);
                    var GTGT = VAT.toString();
                    $("#txtVAT").val(GTGT.replace(/\B(?=(\d{3})+(?!\d))/g, '.') + 'đ');
                    var TienTra = TongTienSP + VAT;
                    var TienCanTra = TienTra.toString();
                    $("#txtTienCanTra").val(TienCanTra.replace(/\B(?=(\d{3})+(?!\d))/g, '.') + 'đ');
                    table.deleteRow(i);
                    rowCount--;
                    i--;
                }
            }
            if(rowCount == 1 ){
                $("#txtNhaSanXuat").data("kendoDropDownList").enable(true);
            }
        } catch (e) {
            alert(e);
        }
    };
    function ChangeData(){
        var TableData;
        TableData = saveTblValues()

        function saveTblValues()
        {
        var TableData = new Array();

        $('#chitiethoadonnhap tr').each(function(row, tr){
            TableData[row]=
            {
                "id" : parseInt($(tr).find('td:eq(0)').text()) //for first column value
                , "quantity" : parseInt($(tr).find('td:eq(2)').text())  //for second column value
                , "unit_price" : parseInt((($(tr).find('td:eq(3)').text()).split('.').join('')).slice(0, -1)) //for third column value
            }    
        }); 
        TableData.shift();  // first row will be empty - so remove
        return TableData;
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var NSX =  $("#txtNhaSanXuat").data("kendoDropDownList").value();
        var SDT = $("#txtSoDienThoai").val();
        var DC = $("#txtDiaChi").val();
        var NOTE = $("#txtGhiChu").val();
        var TOTAL = (($("#txtTienCanTra").val()).split('.').join('')).slice(0, -1);
        var SoDienThoai = $("#txtSoDienThoai").val();
        var DiaChi = $("#txtDiaChi").val();
        var GhiChu = $("#txtGhiChu").val();
        var a =[];
        if(SoDienThoai == "")
        { 
            alert("Vui lòng nhập số điện thoại");
        }else if(DiaChi == ""){
            alert("Vui lòng nhập địa chỉ");
        }
        else if(GhiChu == ""){
            alert("Vui lòng nhập ghi chú");
        }else if(TableData.length == 0){
            alert("Không có sản phẩm được thêm");
        }else{
            $.ajax({
                type: "POST",
                url: '{{route('TaoMoiHoaDonNhap')}}',
                data: {"_token": "{{ csrf_token() }}",
                        "TableData":  TableData,
                        "branch_id": NSX,
                        "receiver_fullname": "{{ auth()->guard('admin')->user()->full_name }}",
                        "phone_number": SDT,
                        "deliver_address":DC ,
                        "notes":NOTE ,
                        "total": TOTAL,
                    },
                datatype: 'JSON',
                success: function(data){
                    window.location.href = "http://127.0.0.1:8000/admin/hoadonnhap/index";
                }
            });
        }
    }
    $(document).ready(function(){

        $("#txtTenSP").kendoDropDownList({
            dataTextField: "model_name",
            dataValueField: "SPid",
            filter: "contains",
            headerTemplate: '<div class="dropdown-header k-widget k-header">' +
                    '<span>Ảnh</span>' +
                    '<span>Tên sản phẩm </span>' +
                '</div>',
            footerTemplate: 'Tổng cộng có #: instance.dataSource.total() # sản phẩm',
            valueTemplate: '<span class="selected-value" style="background-image: url(\'{!! url("website/product/#:data.image#") !!}\')"></span><span>#:data.model_name# - Bộ nhớ: #: data.capacity != null ? data.capacity : "" #/ Màu: #: data.color != null ? data.color : ""#</span>',
            template: '<span class="k-state-default" style="float:left"><img style="width:70px;height:70px" src="{!! url("website/product/#:data.image#") !!}"></span>'+
                        '<span class="k-state-default" style="float:left; margin-left:5px"><h6>#: data.model_name #</h6><p>Bộ nhớ : #: data.capacity # / Màu: #: data.color #</p></span>',
            dataSource:[],
            height: 300
        });
        $("#txtNhaSanXuat").kendoDropDownList({
            select: onChangeSanPham,
            dataTextField: "branch_name",
            dataValueField: "id",
            dataSource:[],
        });
        GetDuLieu();
    });
    function GetDuLieu(){
        $.ajax({
            url:'{{route('getNhasanxuat')}}',
            type: "GET",
            dataType: "json",
            success:function(data){
                if(data !=null){
                    var dataSource = new kendo.data.DataSource({
                    data: data,
                    });
                    var dropdownlist = $("#txtNhaSanXuat").data("kendoDropDownList");
                    dropdownlist.setDataSource(data);
                }else{
                    console.log("Error")
                }
            },
            error:function(error){
                console.log(error)
            }
        });
    }
</script>

<style>
    .dropdown-header {
        border-width: 0 0 1px 0;
        text-transform: uppercase;
    }
    .dropdown-header > span {
        display: inline-block;
        padding: 10px;
        margin-right: 30px;
    }
    .dropdown-header > span:first-child {
        width: 50px;
    }
    .k-list-container > .k-footer {
        padding: 10px;
    }
    .selected-value {
        display: inline-block;
        vertical-align: middle;
        width: 24px;
        height: 24px;
        background-size: 100%;
        margin-right: 5px;
        border-radius: 50%;
    }
    #customers-list .k-list-item-text {
        line-height: 1em;
        min-width: 300px;
    }
    /* Material Theme padding adjustment*/
    .k-material #customers-list .k-list-item-text,
    .k-material #customers-list .k-list-item-text.k-state-hover,
    .k-materialblack #customers-list .k-list-item-text,
    .k-materialblack #customers-list .k-list-item-text.k-state-hover {
        padding-left: 5px;
        border-left: 0;
    }
    #customers-list .k-list-item-text > span {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        display: inline-block;
        vertical-align: top;
        margin: 20px 10px 10px 5px;
    }
    #customers-list .k-list-item-text > span:first-child {
        -moz-box-shadow: inset 0 0 30px rgba(0,0,0,.3);
        -webkit-box-shadow: inset 0 0 30px rgba(0,0,0,.3);
        box-shadow: inset 0 0 30px rgba(0,0,0,.3);
        margin: 10px;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background-size: 100%;
        background-repeat: no-repeat;
    }
    #customers-list h3 {
        font-size: 2px;
        font-weight: normal;
        margin: 0 0 1px 0;
        padding: 0;
    }
    #customers-list p {
        margin: 0;
        padding: 0;
        font-size: .8em;
    }
    .autocomplete-suggestions { border: 1px solid #999; background: #FFF; overflow: auto; }
    .autocomplete-suggestion { padding: 2px 5px; white-space: nowrap; overflow: hidden; }
    .autocomplete-selected { background: #F0F0F0; }
    /*.autocomplete-suggestions strong { font-weight: normal; color: #3399FF; }*/
    .autocomplete-group { padding: 2px 5px; }
    .autocomplete-group strong { display: block; border-bottom: 1px solid #000; }
</style>
@endsection