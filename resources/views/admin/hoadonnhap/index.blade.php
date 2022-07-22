@extends('admin/app')
@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"></script>
<section class="recent" style="margin-top: 0px;">     
    <h2 class="dash-title">Quản lý hoá đơn nhập</h2>
    <a style="margin-bottom: 0px;font-size:15px;margin-left:0px" class="button type2" href="{{route('formthemHDN')}}">Thêm mới</a>
    <hr>
        <section class="recent" style="margin-top: 3px">
          <form method="GET" id="header-search" action="{{route('xylytkHDN')}}">
            <select class="form-control" style=" width:180px;display: inline-block; vertical-align: middle" name="status" id="status">
              <option value="">---Trạng thái-----</option>
              <option value="0">Đang xác nhận</option>
              <option value="1">Đã xác nhận</option>
              <option value="2">Đã giao</option>
              <option value="3">Đã huỷ</option>
            </select>
            <button style=" display: inline-block; vertical-align: middle" type="submit" class="button type2">Tìm kiếm</button>
            {{ csrf_field() }}
            </form>
            <div class="activity-grid" >
                <div class="activity-card" >
                  <div class="table-responsive;"style="width:1000px!important;">
                    <table class="table-sortable" id="example" style="margin-bottom: 20px;">
                        <thead>
                          <tr>
                            <th>Tên sản phẩm</th>
                            <th>Đơn vị bán hàng</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Tổng tiền</th>
                            <th>Trạng thái</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($dshoadonnhap as $a)
                            <tr>
                              <td>{{$a->receiver_fullname}}</td>
                              <td>{{$a->branch_name}}</td>
                              <td>0{{$a->phone_number}}</td>
                              <td>{{$a->deliver_address}}</td>
                              <td>{{number_format($a->total)}}đ</td>
                              <td>
                                @if($a->status == 0)
                            <span style="color:#d35400;">Đang xác nhận</span>
                                @elseif($a->status == 1)
                                    <span style="color:#27ae60;">Đã xác nhận</span>
                                @elseif($a->status == 2)
                                    <span style="color:#2927ae;">Đã giao</span>
                                @elseif($a->status == 3)
                                    <span style="color:#505050;">Đã huỷ</span>
                                @endif
                              </td>
                              <td>
                                <a href="{{route('SuaHDN',['HDN'=>$a->id])}}" class="button type2">Cập nhật</a>
                              </td>
                            </tr>
                          @endforeach  
                        </tbody>
                      </table>
                  </div>
                </div>
            </div>
        </section>
    </div>
</section>
<style>  
input[type="search"] {
  display: none;
} 
  .larger-font {
    font-size: 12px;
  }
    .table-sortable th {
      cursor: pointer;
    }
    .table-sortable .th-sort-asc::after {
      content: "\25b4";
    }
    .table-sortable .th-sort-desc::after {
      content: "\25be";
    }
    .table-sortable .th-sort-asc::after,
    .table-sortable .th-sort-desc::after {
      margin-left: 5px;
    }
    .table-sortable .th-sort-asc,
    .table-sortable .th-sort-desc {
      background: rgba(0, 0, 0, 0.1);
    }
  </style>
  <script>
  $(document).ready(function(){
    // Cấu hình các nhãn phân trang
    $('#example').dataTable({
        "language": {
        "sProcessing":   "Đang xử lý...",
        "sLengthMenu":    "Xem Mục_MENU_ ",
        "sInfo":         "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
        "sInfoEmpty":    "Đang xem 0 đến 0 trong tổng số 0 mục",
        "sInfoFiltered": "(được lọc từ _MAX_ mục)",
        "sInfoPostFix":  "",
        "sSearch":       "",
        "oPaginate": {
            "sFirst":    "Đầu",
            "sPrevious": "Trước",
            "sNext":     "Tiếp",
            "sLast":     "Cuối"
            }
        },
        "processing": true, // tiền xử lý trước
        "aLengthMenu": [[5, 10, 20, 50], [5, 10, 20, 50]], // danh sách số trang trên 1 lần hiển thị bảng
        "order": [[ 1, 'desc' ]] //sắp xếp giảm dần theo cột thứ 1
    } );
    function sortTableByColumn(table, column, asc = true) {
      const dirModifier = asc ? 1 : -1;
      const tBody = table.tBodies[0];
      const rows = Array.from(tBody.querySelectorAll("tr"));
  
      // Sort each row
      const sortedRows = rows.sort((a, b) => {
          const aColText = a.querySelector(`td:nth-child(${ column + 1 })`).textContent.trim();
          const bColText = b.querySelector(`td:nth-child(${ column + 1 })`).textContent.trim();
  
          return aColText > bColText ? (1 * dirModifier) : (-1 * dirModifier);
      });
  
      // Remove all existing TRs from the table
      while (tBody.firstChild) {
          tBody.removeChild(tBody.firstChild);
      }
  
      // Re-add the newly sorted rows
      tBody.append(...sortedRows);
  
      // Remember how the column is currently sorted
      table.querySelectorAll("th").forEach(th => th.classList.remove("th-sort-asc", "th-sort-desc"));
      table.querySelector(`th:nth-child(${ column + 1})`).classList.toggle("th-sort-asc", asc);
      table.querySelector(`th:nth-child(${ column + 1})`).classList.toggle("th-sort-desc", !asc);
  }
  
  document.querySelectorAll(".table-sortable th").forEach(headerCell => {
      headerCell.addEventListener("click", () => {
          const tableElement = headerCell.parentElement.parentElement.parentElement;
          const headerIndex = Array.prototype.indexOf.call(headerCell.parentElement.children, headerCell);
          const currentIsAscending = headerCell.classList.contains("th-sort-asc");
  
          sortTableByColumn(tableElement, headerIndex, !currentIsAscending);
      });
  });
  })
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
{{--jquery.autocomplete.js--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.devbridge-autocomplete/1.4.10/jquery.autocomplete.min.js"></script>
{{--custom css item suggest search--}}
<style>
    .autocomplete-suggestions { border: 1px solid #999; background: #FFF; overflow: auto; }
    .autocomplete-suggestion { padding: 2px 5px; white-space: nowrap; overflow: hidden; }
    .autocomplete-selected { background: #F0F0F0; }
    /*.autocomplete-suggestions strong { font-weight: normal; color: #3399FF; }*/
    .autocomplete-group { padding: 2px 5px; }
    .autocomplete-group strong { display: block; border-bottom: 1px solid #000; }
</style>

</script>
@endsection
    



