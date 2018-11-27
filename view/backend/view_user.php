<?php 
    include "db_connect.php";
    include "public/backend/Classes/PHPExcel.php";
    if(isset($_POST['import'])){
        $file = $_FILES['file']['tmp_name'];
        $objReader = PHPExcel_IOFactory::createReaderForFile($file);
        //lấy tất cả các sheet excel
        $listWorkSheets = $objReader->listWorksheetNames($file);

        foreach($listWorkSheets as $c_tenbomon){
            $sql = "select * from tbl_bomon where c_tenbomon = '$c_tenbomon'";
            global $db;
            $result = mysqli_query($db,$sql);
            $rows = mysqli_fetch_object($result);
            $fk_mabomon_id = $rows->pk_mabomon_id;
            //lấy tên sheet
            $objReader->setLoadSheetsOnly($c_tenbomon);
            //nhận thông tin của sheet và truyền biến file
            $objExcel = $objReader->load($file);
            //các thành phần trong sheet
            $sheetData = $objExcel->getActiveSheet()->toArray('null', true, true, true);

            $highestRow = $objExcel->setActiveSheetIndex()->getHighestRow();
            for($row = 1; $row<=$highestRow; $row++){
               //$myDateTime = DateTime::createFromFormat('Y-m-d', $dateString);
                $c_fullname = $sheetData[$row]['A'];
                $c_hocham = $sheetData[$row]['B'];
                $c_hocvi = $sheetData[$row]['C'];
                $c_ngaysinh = $sheetData[$row]['D'];
                $c_diachi = $sheetData[$row]['E'];
                $c_sdt = $sheetData[$row]['F'];
                $c_email = $sheetData[$row]['G'];
                //Conver ngay sinh
                $c_ngaysinh = explode('/',$c_ngaysinh);
                $c_ngaysinh = $c_ngaysinh[2].'-'.$c_ngaysinh[1].'-'.$c_ngaysinh[0];
                //
                $sql = "INSERT INTO tbl_user(fk_mabomon_id, c_fullname,c_hocham,c_hocvi,c_ngaysinh, c_diachi, c_sdt, c_email) values ($fk_mabomon_id,'$c_fullname','$c_hocham', '$c_hocvi', '$c_ngaysinh', '$c_diachi', $c_sdt, '$c_email')";
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
        <h3>Quản lý người dùng</h3>
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

             <div class="control-label col-md-0 col-sm-1 col-xs-12">
                <a href="admin.php?controller=add_edit_user&act=add" class="btn btn-primary">Add</a>
            </div>

            <form method="post" enctype="multipart/form-data" action="<?php //echo $form_action; ?>">
              <!-- lọc bộ môn -->
              <div class="control-label col-md-0 col-sm-1 col-xs-12">Bộ môn:</div>
              <div class="col-md-4 col-sm-4 col-xs-12" >
                <select class="form-control" name="bomon" id="bomon">
                
                  <option value="0">Tất cả</option>
                   <?php 
                      // $mabomonn = "";
                      // if(isset($_GET['classB'])){
                      //   $mabomonn = $_GET['classB'];
                      // }else{
                      //    $mabomonn = $classB;
                      // }
                      $bomon = $this->model->get_all("select * from tbl_bomon order by pk_mabomon_id desc");
                      foreach($bomon as $rows):
                        $flag=isset($rows->pk_mabomon_id)&&$rows->pk_mabomon_id==$classB;
                        
                        if(isset($_GET['fk_mabomon_id'])){
                          $flag= $rows->pk_mabomon_id==$_GET['fk_mabomon_id'];
                        }
                     ?>
                    <option <?php if($flag): ?> selected <?php endif; ?> value="<?php echo $rows->pk_mabomon_id; ?>"><?php echo $rows->c_tenbomon; ?></option>
                    <?php endforeach; ?>
                </select>
              </div>
              <!-- end lọc bộ môn -->
              <!-- <div class="control-label col-md-0 col-sm-1 col-xs-12" >
                <button type="submit" name="Process" value="Process" class="btn btn-success">Search</button>
              </div> -->
            </form>
           

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
                    <th class="column-title">UserID </th>
                    <th class="column-title">Họ và tên </th>
                    <th class="column-title">Bộ môn </th>
                    <th class="column-title">Học hàm </th>
                    <th class="column-title">Học vị </th>
                    <th class="column-title">Ngày sinh </th>
                    <th class="column-title">Địa chỉ </th>
                    <th class="column-title">SĐT </th>
                    <th class="column-title">Email </th>
                    <th class="column-title">UserType </th>
                    <th class="column-title no-link last" ><span class="nobr">Action</span>
                    </th>
                    <th class="bulk-actions" colspan="7">
                      <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                    </th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach($arr as $rows): ?>
                  <tr id="<?=$rows->pk_user_id?>" class="even pointer">
                    <td class="a-center ">
                      <input type="checkbox" class="flat" name="table_records">
                    </td>
                    <td class=" "><?php echo $rows->pk_user_id; ?></td>
                    <td class=" "><?php echo $rows->c_fullname; ?></td>
                    <td class=" ">
                      <?php 
                        $bomon = $this->model->get_a_record("select c_tenbomon from tbl_bomon where pk_mabomon_id={$rows->fk_mabomon_id}");
                        echo isset($bomon->c_tenbomon)?$bomon->c_tenbomon:"";
                      ?>
                    </td>
                    <td class=" "><?php echo $rows->c_hocham; ?></td>
                    <td class=" "><?php echo $rows->c_hocvi; ?></td>
                     <td class=" ">
                      <?php 
                        $date = date_create($rows->c_ngaysinh);
                        echo date_format($date,"d/m/Y");      
                      ?>  
                    </td>
                    <td class=" "><?php echo $rows->c_diachi; ?></td>
                    <td class=" "><?php echo $rows->c_sdt; ?></td>
                    <td class=" "><?php echo $rows->c_email; ?></td>
                    <td class=" "><?php echo $rows->UserType; ?></td>
                    <td class=" last">
                    	<a href="admin.php?controller=add_edit_user&act=edit&id=<?php echo $rows->pk_user_id; ?>">Edit</a>&nbsp;&nbsp;
						          <a onclick="return window.confirm('Are you sure?');" href="admin.php?controller=add_edit_user&act=delete&id=<?php echo $rows->pk_user_id; ?>">Delete</a>
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
        <script type="text/javascript">
          function DeleteMulti(){
            if(window.confirm('Are you sure?')){
              var listId = "";
              $('tr.selected').each(function(){
                listId += $(this).attr('id')+",";
              });
              listId = listId.substr(0,listId.length - 1);
              //alert(listId);
              var listId = "";
              $('tr.selected').each(function(){
                listId += $(this).attr('id')+",";
              });
              listId = listId.substr(0,listId.length - 1);
              //alert(listId);
              $('#btn_mutiDelete').attr('href',$('#btn_mutiDelete').attr('href')+","+ listId);
              
            }
          }
        </script>
				<a id="btn_mutiDelete" onclick="DeleteMulti();" href="admin.php?controller=add_edit_user&act=deleteMuti&listId=0" class="btn btn-primary">Delete</a>
			</div>
              <!-- phân trang -->
	          	<div class="card-footer" style="padding:5px !important">
					<ul class="pagination">
						<li class="page-item"><a class="page-link" href="#">Trang</a></li>
					<?php for($i=1; $i<=$num_page; $i++): ?>	
						<li class="page-item"><a class="page-link" onclick="phanTrang(this);" href="admin.php?controller=user&p=<?php echo $i; ?>"><?php echo $i; ?></a></li>
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
<script type="text/javascript">
  function URL_add_parameter(url, param, value){
    var hash       = {};
    var parser     = document.createElement('a');

    parser.href    = url;

    var parameters = parser.search.split(/\?|&/);

    for(var i=0; i < parameters.length; i++) {
        if(!parameters[i])
            continue;

        var ary      = parameters[i].split('=');
        hash[ary[0]] = ary[1];
    }

    hash[param] = value;

    var list = [];  
    Object.keys(hash).forEach(function (key) {
        list.push(key + '=' + hash[key]);
    });

    parser.search = '?' + list.join('&');
    return parser.href;
  }
  $('select.form-control[name="bomon"]').on('change',function(){
      //console.log($(this).val());
      var url=URL_add_parameter(window.location.href,'p',0);
      window.location.href = URL_add_parameter(url,'fk_mabomon_id',$(this).val());

  });
  function phanTrang(el){
    var bomonn = $('select.form-control[name="bomon"]').val();
    $(el).attr('href',URL_add_parameter($(el).attr('href'),'fk_mabomon_id',bomonn));
    
    //alert($('#btn_xemchitiet').attr('href'));
  }
</script>