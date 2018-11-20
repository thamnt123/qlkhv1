  
 <!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
     <!--    <h3>Đăng kí đề tài</h3> -->
      </div>


      <div class="clearfix"></div>

      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <div>
        <a href="giaovien.php?controller=add_dangkidetai&act=add" class="btn btn-primary">Đăng ký đề tài</a>
      </div>
            <div class="clearfix"></div>
          </div>

          <div class="x_content">
            <div class="table-responsive">
              <table class="table table-striped jambo_table bulk_action">
                <thead>
                  <tr class="headings">
                    <th>
                      <input type="checkbox" id="check-all" class="flat">
                    </th>
                    <th class="column-title">Tên đề tài </th>
                    <th class="column-title">Bộ môn </th>
                    <th class="column-title">Chủ nhiệm đề tài </th>
                    
                    <th class="column-title">Kinh phí </th>
                    <th class="column-title">Từ ngày </th>
                    <th class="column-title">Đến ngày </th>
                    <th class="column-title">File mô tả </th>
                    <th class="column-title">Trạng thái </th>
                    <th class="column-title">Action </th>
                    
                    
                  </tr>
                </thead>
                <tbody>
                <?php foreach($arr as $rows): ?>
                  <tr class="even pointer">
                    <td class="a-center ">
                      <input type="checkbox" class="flat" name="table_records">
                    </td>
                    <td class=" "><?php echo $rows->c_tendetai; ?></td>
                     <td class=" ">
                      <?=$rows->c_tenbomon?>
                    </td>
                    <td class=" ">

                     <?=$rows->c_fullname?>

                    </td>
                    
                    <td class=" "><?php echo $rows->c_kinhphi; ?></td>
                    <td class=" ">
                      <?php 
              $date = date_create($rows->c_tungay);
              echo date_format($date,"d/m/Y");      
            ?>  
                    </td>
                    <td class=" ">
                      <?php 
              $date = date_create($rows->c_denngay);
              echo date_format($date,"d/m/Y");      
            ?>  
                    </td>
                    <td class=" "><a href="<?php echo $rows->file_mo_ta; ?>">Download</a></td>

                    <td class=" ">
                      <?php 
                        if($rows->c_trangthai == 0)
                          echo "Chờ phê duyệt";
                        else if($rows->c_trangthai == 1)
                          echo "Chờ hội đồng duyệt";
                         else if($rows->c_trangthai == 2)
                          echo "Đang thực hiện";
                         else if($rows->c_trangthai == 3)
                          echo "Hoàn thành";
                        else if($rows->c_trangthai == 4)
                          echo "Đã hủy";
                      ?>  
                    </td>

                     <td class=" last">
                      
                      <button type="button" class="btn btn-default btn-xs"><a href="giaovien.php?controller=chitiet_dangkidetai&act=xem&id=<?php echo $rows->pk_madetai_id; ?>"">Xem chi tiết</a></button>
                    </td>

                  </tr>
                <?php endforeach; ?>
                </tbody>
              </table>

            
              <!-- phân trang -->
              <div class="card-footer" style="padding:5px !important">
          <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">Trang</a></li>
          <?php for($i=1; $i<=$num_page; $i++): ?>  
            <li class="page-item"><a class="page-link" href="giaovien.php?controller=dangkidetai&p=<?php echo $i; ?>"><?php echo $i; ?></a></li>
          <?php endfor; ?>
          </ul>
        </div>
      <!-- end phân trang -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /page content -->