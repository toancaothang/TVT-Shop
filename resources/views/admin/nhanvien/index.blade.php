
@extends('admin/app')
@section('title') Dashboard @endsection
@section('content')
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"></script>
<section class="recent" style="margin-top: 0px;">     
    <h2 class="dash-title">Quản lý nhân viên</h2>
    <a style="margin-bottom: 0px;font-size:15px;margin-left:0px" class="button type2" href="{{route('formthemNV')}}">Thêm mới</a>
    <hr>
    <section class="recent" style="margin-top: 3px">
      <form method="GET" id="header-search" action="{{route('xylytkNV')}}">
        <input style=" width:300px;display: inline-block; vertical-align: middle" type="text" name="name" id="name" class="form-control" placeholder="Nhập tên nhân viên" />
        <button style=" display: inline-block; vertical-align: middle" type="submit" class="button type2">Tìm kiếm</button>
        {{ csrf_field() }}
        </form>
        <div class="activity-grid" style="margin-top: 20px">
                <div class="activity-card" style="width:1050px">
                  <div class="table-responsive">
                    <table class="table-sortable" id="example" style="margin-bottom: 20px">
                        <thead>
                          <tr>
                            <th>Ảnh đại diện</th>
                            <th>Họ tên</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Ngày sinh</th>
                            <th>Giới tính</th>
                            <th>Email</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($dsnhanvien as $a)
                            <tr>
                              <td style="padding-left: 30px"><img style="width:80px;height:80px" src="{!! url('adminavatar/'.$a->avatar.'') !!}"></td>
                              <td>{{$a->full_name}}</td>
                              <td>0{{$a->phone_number}}</td>
                              <td>{{$a->address}}</td>
                              <td>{{$a->birth}}</td>

                              <td>
                                @if ($a->gender == 1)
                                  Nam
                                @else
                                  Nữ
                                
                                @endif
                              </td>
                              <td>{{$a->email}}</td>
                              {{-- <td><img style="width:50px;height:50px" src="{!! url('backend/img/'.$a->anhdaidien.'') !!}"></td> --}}
                              <td>
                                <a href="{{route('SuaNV',['NV'=>$a->id])}}" class="button type2">Sửa</a>
                                <a href="{{route('xylyxoaNV',['NV'=>$a->id])}}" class="button type2">Xoá</a>
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
  function checkAlert(evt) {
    if (evt.target.value == "-1") {
      $('#dialog').css('display', '');
      $("#dialog").kendoDialog({
        closable: true,
        height:300,
        width:420,
        modal: true,
        title: "Quản lí loại sản phẩm",
    });
    }
  };
  $(document).ready(function(){
    // Cấu hình các nhãn phân trang
    $('#example').dataTable({
        "language": {
        "sProcessing":   "Đang xử lý...",
        "sLengthMenu":   "Xem _MENU_ mục",
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
    $('#themmoiloaisanpham').click( function() {
      $('#loaisanpham').append(`<tr>
        <td>
                                <form style="width:420px;height:5px" class="mb-5" method="POST" action={{route('xylythemLSP')}}>
                                      @csrf
                                    <input style="width:220px;float:left" class="form-control" type="text" name="category_name" class="form-control" required>
                                    <button style="margin-left:10px" type="submit" class="button type2">Lưu</button>
                                </form> </td></tr>`);
  });
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
  
  </script>
  
@endsection
    



