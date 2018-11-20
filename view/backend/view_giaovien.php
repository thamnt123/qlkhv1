<?php 
    include "db_connect.php";
    include "public/backend/Classes/PHPExcel.php";
    if(isset($_POST['import'])){
        $file = $_FILES['file']['tmp_name'];
        $objReader = PHPExcel_IOFactory::createReaderForFile($file);
        //lấy tất cả các sheet excel
        $listWorkSheets = $objReader->listWorksheetNames($file);

        foreach($listWorkSheets as $c_tenbomon){
            $sql = "INSERT INTO tbl_bomon(c_tenbomon) values('$c_tenbomon')";
            $mysqli->query($sql);
            $fk_mabomon_id = $mysqli->insert_id;
            //lấy tên sheet
            $objReader->setLoadSheetsOnly($c_tenbomon);
            //nhận thông tin của sheet và truyền biến file
            $objExcel = $objReader->load($file);
            //các thành phần trong sheet
            $sheetData = $objExcel->getActiveSheet()->toArray('null', true, true, true);

            $highestRow = $objExcel->setActiveSheetIndex()->getHighestRow();
            for($row = 1; $row<=$highestRow; $row++){
               
                $c_tengiaovien = $sheetData[$row]['A'];
                $c_ngaysinh = $sheetData[$row]['B'];
                $c_hocvi = $sheetData[$row]['C'];
                $c_hocham = $sheetData[$row]['D'];
                $c_diachi = $sheetData[$row]['E'];
                $c_sdt = $sheetData[$row]['F'];
                $c_email = $sheetData[$row]['G'];

                $sql = "INSERT INTO tbl_giaovien(fk_mabomon_id, c_tengiaovien,c_ngaysinh, c_hocvi, c_hocham,  c_diachi, c_sdt, c_email) values ($fk_mabomon_id,'$c_tengiaovien','c_ngaysinh', '$c_hocvi', '$c_hocham', '$c_diachi', $c_sdt, '$c_email')";
                $mysqli->query($sql);
            }
        }
        $message = "Thành công";
		echo "<script type='text/javascript'>alert('$message');</script>";
        
    }
 ?>
 <!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Quản lý giáo viên</h3>
      </div>

      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button">Go!</button>
            </span>
          </div>
        </div>
      </div>
    </div>

      <div class="clearfix"></div>
      <div class="control-label col-md-0 col-sm-1 col-xs-12">Bộ môn:</div>
        <div class="col-md-4 col-sm-4 col-xs-12" style="margin-bottom: 7px; margin-top: -7px;">
          <select class="form-control">
            <option>Choose option</option>
            <option>Option one</option>
            <option>Option two</option>
            <option>Option three</option>
            <option>Option four</option>
          </select>
        </div>

      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <div>
				<a href="admin.php?controller=add_edit_giaovien&act=add" class="btn btn-primary">Add</a>
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
                    <th class="column-title">Tên giáo viên </th>
                    <th class="column-title">Bộ môn </th>
                    <th class="column-title">Học vị </th>
                    <th class="column-title">Học hàm </th>
                    <th class="column-title">Ngày sinh </th>
                    <th class="column-title">Địa chỉ </th>
                    <th class="column-title">SĐT </th>
                    <th class="column-title">Email </th>
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
                    <td class=" "><?php echo $rows->c_tengiaovien; ?></td>
                    <td class=" ">
                    	<?php 
							$bomon = $this->model->get_a_record("select c_tenbomon from tbl_bomon where pk_mabomon_id={$rows->fk_mabomon_id}");
							echo isset($bomon->c_tenbomon)?$bomon->c_tenbomon:"";
						?>
                    </td>
                    <td class=" "><?php echo $rows->c_hocvi; ?></td>
                    <td class=" "><?php echo $rows->c_hocham; ?></td>
                    <td class=" ">
                    	<?php 
							$date = date_create($rows->c_ngaysinh);
							echo date_format($date,"d/m/Y");			
						?>	
                    </td>
                    <td class=" "><?php echo $rows->c_diachi; ?></td>
                    <td class=" "><?php echo $rows->c_sdt; ?></td>
                    <td class=" "><?php echo $rows->c_email; ?></td>
                    <td class=" last">
                    	<a href="admin.php?controller=add_edit_giaovien&act=edit&id=<?php echo $rows->pk_magiaovien_id; ?>">Edit</a>&nbsp;&nbsp;
                    	<a onclick="return window.confirm('Are you sure?');" href="admin.php?controller=add_edit_giaovien&act=delete&id=<?php echo $rows->pk_magiaovien_id; ?>">Delete</a>
                    </td>
                  </tr>
                <?php endforeach; ?>
                </tbody>
              </table>

              <div class="outer-container">
			        <form action="" method="post" name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
			            <div>
			                <label>Choose Excel File</label> 
			                <input type="file" name="file" id="file" accept=".xls,.xlsx">
			                <button type="submit" id="submit" name="import" class="btn-submit">Import</button>
			            </div>
			        </form>
    			</div>
            <div>
				<a href="#" class="btn btn-primary">Delete</a>
			</div>
              <!-- phân trang -->
	          	<div class="card-footer" style="padding:5px !important">
					<ul class="pagination">
						<li class="page-item"><a class="page-link" href="#">Trang</a></li>
					<?php for($i=1; $i<=$num_page; $i++): ?>	
						<li class="page-item"><a class="page-link" href="admin.php?controller=giaovien&p=<?php echo $i; ?>"><?php echo $i; ?></a></li>
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




		
		