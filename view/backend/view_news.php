  
 <!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Quản lý tin tức</h3>
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
      <div class="control-label col-md-0 col-sm-1 col-xs-12">Loại tin tức:</div>
        <div class="col-md-4 col-sm-4 col-xs-12" style="margin-bottom: 7px; margin-top: -7px;">
          <select class="form-control">
            <option>Choose option</option>
            <option>Option one</option>
            <option>Option two</option>
            <option>Option three</option>
            <option>Option four</option>
          </select>
        </div>
      </div>

      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <div>
				<a href="admin.php?controller=add_edit_news&act=add" class="btn btn-primary">Add</a>
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
                    <th class="column-title">Ảnh </th>
                    <th class="column-title">Tiêu đề </th>
                    <th class="column-title">Danh mục </th>
                    <th class="column-title">Hot_news </th>
               
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
                    <td class=" ">
                    	<?php if(file_exists("public/upload/news/".$rows->c_img)): ?>
							<img src="public/upload/news/<?php echo $rows->c_img; ?>" style="width: 150px;">
						<?php endif; ?>
                    </td>
                    <td class=" " style="width: 470px;"><?php echo $rows->c_name; ?></td>
                    <td class=" ">
                    	<?php 
							$category = $this->model->get_a_record("select c_name from tbl_category_news where pk_category_news_id={$rows->fk_category_news_id}");
							echo isset($category->c_name)?$category->c_name:"";
						 ?>
                    </td>
                    <td class=" ">
                    	<?php if($rows->c_hotnews == 1): ?>
							Hot
						<?php endif; ?>
                    </td>
                    <td class=" last">
                    	<a href="admin.php?controller=add_edit_news&act=edit&id=<?php echo $rows->pk_news_id; ?>">Edit</a>&nbsp;&nbsp;
						<a onclick="return window.confirm('Are you sure?');" href="admin.php?controller=add_edit_news&act=delete&id=<?php echo $rows->pk_news_id; ?>">Delete</a>
                    </td>
                  </tr>
                <?php endforeach; ?>
                </tbody>
              </table>

          <!--   <div>
				<a href="#" class="btn btn-primary">Delete</a>
			</div> -->
              <!-- phân trang -->
	          	<div class="card-footer" style="padding:5px !important">
					<ul class="pagination">
						<li class="page-item"><a class="page-link" href="#">Trang</a></li>
					<?php for($i=1; $i<=$num_page; $i++): ?>	
						<li class="page-item"><a class="page-link" href="admin.php?controller=news&p=<?php echo $i; ?>"><?php echo $i; ?></a></li>
					<?php endfor; ?>
					</ul>
				</div>
			<!-- end phân trang -->
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
