  
 <!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Tạo phiếu chấm đề tài</h3>
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
          <div class="x_title">
            <div>
				<a href="admin.php?controller=add_edit_khoanmucdiem&act=add" class="btn btn-primary">Add</a>
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
                   
                    <th class="column-title">STT </th>
                    <th class="column-title">Nội dung đánh giá </th>
                    <th class="column-title">Điểm tối đa </th>
                    <th class="column-title">Điểm đánh giá </th>
               
                    <th class="column-title no-link last" ><span class="nobr">Action</span>
                    </th>
                    <th class="bulk-actions" colspan="7">
                      <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php $tongdiem=0; $index=0;?>
                <?php foreach($arr as $rows): ?>
                  <?php 
                      if($rows->c_diemtoida>0) $tongdiem+=$rows->c_diemtoida;
                      
                   ?>
                  <tr class="even pointer">
                    <td class="a-center ">
                      <input type="checkbox" class="flat" name="table_records">
                    </td>
                   
                    <td class=" "><?=++$index?></td>
                    <td class=" " style="font-weight: bold;"><?php echo $rows->c_tenkhoanmuc; ?></td>
                    <td class=" " style="font-weight: bold;"><?php echo $rows->c_diemtoida; ?></td>
                    <td class=" " style="font-weight: bold;"></td>
                    <td class=" last">
                      <a href="admin.php?controller=add_edit_khoanmucdiemcon&act=add&id=<?php echo $rows->pk_khoanmucdiem_id; ?>">Add</a>&nbsp;&nbsp;
                    	<a href="admin.php?controller=add_edit_khoanmucdiem&act=edit&id=<?php echo $rows->pk_khoanmucdiem_id; ?>">Edit</a>&nbsp;&nbsp;
						          <a onclick="return window.confirm('Are you sure?');" href="admin.php?controller=add_edit_khoanmucdiem&act=delete&id=<?php echo $rows->pk_khoanmucdiem_id; ?>">Delete</a>
                    </td>
                  </tr>
                  <?php $arr1= $this->model->get_all("select * from tbl_phieucham where parentId={$rows->pk_khoanmucdiem_id} order by pk_khoanmucdiem_id  limit $from,$record_per_page");?>
                  <?php foreach($arr1 as $rows1): ?>
                  <tr class="even pointer">
                    <td class="a-center ">
                      <input type="checkbox" class="flat" name="table_records">
                    </td>
               
                    <td class=" "></td>
                    <td class=" "><?php echo $rows1->c_tenkhoanmuc; ?></td>
                    <td class=" "><?php echo $rows1->c_diemtoida; ?></td>
                    <td class=" "></td>
                    <td class=" last">
                      <a href="admin.php?controller=add_edit_khoanmucdiem&act=edit&id=<?php echo $rows1->pk_khoanmucdiem_id; ?>"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                      <a href="admin.php?controller=add_edit_khoanmucdiem&act=edit&id=<?php echo $rows1->pk_khoanmucdiem_id; ?>">Edit</a>&nbsp;&nbsp;
                      <a onclick="return window.confirm('Are you sure?');" href="admin.php?controller=add_edit_khoanmucdiem&act=delete&id=<?php echo $rows1->pk_khoanmucdiem_id; ?>">Delete</a>
                    </td>
                  </tr>
                <?php endforeach; ?>
                <?php endforeach; ?>
                </tbody>
              </table>
              <div class="form-group">
                <label class="control-label col-md-1 col-sm-1 col-xs-12" style="margin-left: 105px;">Tổng 
                </label>
                <div class="col-md-1 col-sm-1 col-xs-12" style="margin-left: 440px;">
                  <input type="" name=" " value="<?php echo $tongdiem; ?>" class="form-control col-md-4 col-xs-12" readonly="" >  
                </div>
                
              </div>
            
             
            </div>
          </div>
        </div>
      </div>
    </div>
        <!-- footer content -->
        <footer>
          <div class="pull-right">
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
  </div>
</div>
<!-- /page content -->