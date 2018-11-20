  
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
        <a href="giaovien.php?controller=add_baocaotiendo&act=add" class="btn btn-primary">Báo cáo tiến độ</a>
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
                    <th class="column-title">Chủ nhiệm đề tài </th>
                    <th class="column-title">Bộ môn </th>
                    <th class="column-title">Các kết quả đạt được </th>
                    <th class="column-title">Tiến độ hoàn thành đề tài </th>
                    <th class="column-title">Ghi chú </th> 
                  </tr>
                </thead>
                <tbody>
                <?php foreach($arr as $rows): ?>
                  <tr class="even pointer">
                    <td class="a-center ">
                      <input type="checkbox" class="flat" name="table_records">
                    </td>

                    <td class=" ">
                      <?php 
                        $detai = $this->model->get_a_record("select c_tendetai from tbl_detai where pk_madetai_id={$rows->fk_madetai_id}");
                        echo isset($detai->c_tendetai)?$detai->c_tendetai:"";
                      ?>
                    </td>

                     <td class=" ">
                      <?=$rows->c_fullname?>
                    </td>

                    <td class=" ">
                      <?php 
                        $bomon = $this->model->get_a_record("select c_tenbomon from tbl_bomon where pk_mabomon_id={$rows->fk_mabomon_id}");
                        echo isset($bomon->c_tenbomon)?$bomon->c_tenbomon:"";
                      ?>
                    </td>

                    <td class=" "><?php echo $rows->c_noidungtiendo; ?></td>
                    <td class=" "><?php echo $rows->c_hoanthanhtiendo; ?>%</td>
                    <td class=" "><?php echo $rows->c_ghichu; ?></td>
                  </tr>
                <?php endforeach; ?>
                </tbody>
              </table>

              <!-- phân trang -->
              <div class="card-footer" style="padding:5px !important">
          <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">Trang</a></li>
          <?php for($i=1; $i<=$num_page; $i++): ?>  
            <li class="page-item"><a class="page-link" href="giaovien.php?controller=baocaotiendo&p=<?php echo $i; ?>"><?php echo $i; ?></a></li>
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