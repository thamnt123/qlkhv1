
 <!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Danh sách đề tài chờ xét duyệt</h3>
      </div>

      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          <div class="input-group">
            <!-- <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button">Go!</button>
            </span> -->
          </div>
        </div>
      </div>
    </div>

      <div class="clearfix"></div>

      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
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
                    <th class="column-title">Nội dung nghiên cứu </th>
                    <th class="column-title">Kinh phí </th>
                    <th class="column-title">Từ ngày </th>
                    <th class="column-title">Đến ngày </th>
                    <th class="column-title">File mô tả </th>
                    <th class="column-title">Trạng thái </th>
                    <th class="column-title">Action </th>
                    </th>
                    <th class="bulk-actions" colspan="7">
                      <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                    </th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach($arr as $rows): ?>
                  <tr class="even pointer">
                    <td class="a-center ">
                      <input type="checkbox" class="flat" name="table_records">
                    </td>
                    <td class=" "><?php echo ucfirst($rows->c_tendetai); ?></td>
                     <td class=" ">
                      <?=$rows->c_tenbomon?>
                    </td>
                    <td class=" ">

                      <?=$rows->c_fullname?>

                    </td>
                    <td class=" "><?php echo $rows->c_noidungnghiencuu; ?></td>
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
                    <td class=" "><button type="button" class="btn btn-info btn-xs"><a href="<?php echo $rows->file_mo_ta; ?>" style="color: white;">Download</a></button></td>
                    <td class=" ">
                      <?php 
                        if($rows->c_trangthai == 0)
                          echo "Chờ trưởng bộ phận duyệt";
                        else if($rows->c_trangthai == 1)
                          echo "Chờ hội đồng duyệt";
                      ?>  
                    </td>

                    <td class=" last">
                      <a href="hoidong.php?controller=detaichoxetduyet&<?php echo "act=duyet&id=".$rows->pk_madetai_id ?>">
                          <button  type="button" class="btn btn-default btn-xs btn-duyet">Duyệt</button>
                      </a>
                      <a href="hoidong.php?controller=detaichoxetduyet&<?php echo "act=huy&id=".$rows->pk_madetai_id ?>">
                          <button  type="button" class="btn btn-default btn-xs btn-duyet">Hủy</button>
                      </a>
                      <button type="button" class="btn btn-default btn-xs"><a href="hoidong.php?controller=chitiet_detaichoxetduyet&act=xem&id=<?php echo $rows->pk_madetai_id; ?>"">Xem chi tiết</a></button>
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
						<li class="page-item"><a class="page-link" href="hoidong.php?controller=detaichoxetduyet&p=<?php echo $i; ?>"><?php echo $i; ?></a></li>
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
<script type="text/javascript">
  document.addEventListener('DOMContentLoaded', function() { 
  });
</script>
<!-- /page content -->




		
		