  
 <!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Khoản mục con</h3>
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
				<a href="hoidong.php?controller=add_edit_khoanmucdiemcon&act=add" class="btn btn-primary">Add</a>
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
                  <?php foreach($arr as $rows): ?>
                  <tr class="even pointer">
                    <td class="a-center ">
                      <input type="checkbox" class="flat" name="table_records">
                    </td>
                    <td class=" " style="font-weight: bold;"><?php echo $rows->c_tenkhoanmuc; ?></td>
                    <td class=" " style="font-weight: bold;"><?php echo $rows->c_diemtoida; ?></td>
                    <td class=" " style="font-weight: bold;"><?php echo $rows->c_diemdanhgia; ?></td>
                    <td class=" last">
                  
                    	<a href="hoidong.php?controller=add_edit_khoanmucdiemcon&act=edit&id=<?php echo $rows->pk_khoanmucdiem_id; ?>">Edit</a>&nbsp;&nbsp;
						<a onclick="return window.confirm('Are you sure?');" href="hoidong.php?controller=add_edit_khoanmucdiemcon&act=delete&id=<?php echo $rows->pk_khoanmucdiem_id; ?>">Delete</a>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                  
                </tbody>
              </table>
             
            
             
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