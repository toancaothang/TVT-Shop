@extends('admin.app')
@section('title') Dashboard @endsection
@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<section class="recent" style="margin-top: 0px;">     
    <h3 class="dash-title">Quản lý banner</h3>
    <a style="margin-bottom: 0px;font-size:15px;margin-left:0px" class="button type2" href="{{route('formthemBN')}}">Thêm mới</a>
    <hr>
    <section class="recent" style="margin-top: 3px">
            <div class="activity-grid" style="margin-top: 20px">
                <div class="activity-card" style="width:1050px">
                  <div class="table-responsive">
                    <table id="example" style="margin-bottom: 20px">
                        <thead>
                          <tr>
                            <th>Ảnh banner</th>
                            <th>Tên banner</th>
                            <th>Link</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody id="listUser">
                          @foreach ($dsbanner as $a)
                            <tr>
                              <td style="padding-left: 30px"><img style="width:80px;height:80px" src="{!! url('banner/'.$a->banner_image.'') !!}"></td>
                              <td>{{$a->banner_name}}</td>
                              <td><a href="{{$a->banner_link}}">{{$a->banner_link}}</a></td>
                              <td>
                                <a href="{{route('SuaBN',['BN'=>$a->id])}}" class="button type2">Sửa</a>
                                <a href="{{route('xylyxoaBN',['BN'=>$a->id])}}" class="button type2">Xoá</a>
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
        "sLengthMenu":   "Xem Mục_MENU_ ",
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
  </script>
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



@endsection
    



