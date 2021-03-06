
 <!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Hội đồng nghiệm thu đề tài</h3>
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
      <form method="post" enctype="multipart/form-data" action="<?php echo $form_action; ?>">
        <div class="control-label col-md-0 col-sm-1 col-xs-12">Chọn năm:</div>
        <div class="col-md-3 col-sm-3 col-xs-12" >
          <select class="form-control" name="nam" id="nam">
            <option value="0">Tất cả</option>
            <?php 
              $selected = isset($year)?$year:date("Y");
              // if(isset($year)){
              //   $selected = $year;
              // }else if(isset($_GET['year'])){
              //    $selected = $_GET['year'];
              // }else{
              //    $selected = date("Y");
              // }
              $nam = $this->model->get_all("select * from tbl_nam order by pk_nam_id desc");
              foreach($nam as $rows):
             ?>
            <option <?php if(isset($rows->c_nam)&&$rows->c_nam==$selected): ?> selected <?php endif; ?> value="<?php echo $rows->c_nam; ?>"><?php echo $rows->c_nam; ?></option>
            <?php endforeach; ?>
          
          </select>
        </div>
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
               ?>
              <option <?php if(isset($rows->pk_mabomon_id)&&$rows->pk_mabomon_id==$classB): ?> selected <?php endif; ?> value="<?php echo $rows->pk_mabomon_id; ?>"><?php echo $rows->c_tenbomon; ?></option>
              <?php endforeach; ?>
          </select>
        </div>
        <!-- end lọc bộ môn -->
        <div class="control-label col-md-0 col-sm-1 col-xs-12" >
          <button type="submit" name="Process" value="Process" class="btn btn-success">Search</button>
        </div>
      </form>

      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <div>
				<a href="admin.php?controller=add_edit_hoidongnghiemthu&act=add" class="btn btn-primary">Add</a>
			</div>
            <div class="clearfix"></div>
          </div>

          <div class="x_content">
            <div class="table-responsive">
              <table class="table table-striped jambo_table bulk_action">
                <thead>
                  <tr class="headings">
                    <th class="column-title">STT </th>
                    <th class="column-title">Tên hội đồng </th>
                    <th class="column-title">Đề tài </th>
                    <th class="column-title">Bộ môn </th>
                    <th class="column-title">Thành viên hội đồng </th>
                    <th class="column-title">Trạng thái </th>
                    <th class="column-title">Ngày </br>bảo vệ </th>
                    <th class="column-title">Thời gian </br>bảo vệ </th>
                    <th class="column-title">Địa điểm </br>bảo vệ </th>
                    
                    <th class="column-title no-link last" ><span class="nobr">Action</span></th>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php $index=0;?>
                <?php foreach($arr as $rows): ?>
                  <tr  class="even pointer">
                    
                    <td class=" "><?=++$index?></td>
                    <td class=" " style="width: 120px;"><?php echo $rows->c_tenhoidong; ?></td>
                     <td class=" " style="width: 120px;">
                      <?php 
                        $detai = $this->model->get_a_record("select c_tendetai from tbl_detai where pk_madetai_id={$rows->fk_madetai_id}");
                        echo isset($detai->c_tendetai)?$detai->c_tendetai:"";
                      ?>
                    </td>
                    <?php $bomon = $this->model->get_a_record("select * from tbl_detai dt join tbl_user u on u.pk_user_id = dt.fk_user_id join tbl_bomon bm on bm.pk_mabomon_id=u.fk_mabomon_id where dt.pk_madetai_id =".$rows->fk_madetai_id); ?>
                    <td class=""><?=$bomon->c_tenbomon?></td>

                    <td class=" ">
                      <button type="button" class="btn btn-success btn-xs">
                      <a href="admin.php?controller=thongtinhoidong_nghiemthu&IdHoiDong=<?=$rows->pk_hoidongnghiemthu_id?>&TenHoiDong=<?=$rows->c_tenhoidong?>&IdDeTai=<?=$rows->fk_madetai_id?>" style="color: white;">Thành viên hội đồng</a></button> 
                    </td>
                    
                    <?php  $thanhvien = $this->model->num_rows("SELECT * FROM `tbl_hoidong_detai` where fk_hoidongnghiemthu_id =".$rows->pk_hoidongnghiemthu_id); ?>
                    <td class=" "><?=(($thanhvien>0)?'Đã lập thành viên':'Chưa lập thành viên')?></td>

                    <td class=" ">
                      <?php 
                         $date = date_create($rows->c_ngaybaove);
                         echo date_format($date,"d/m/Y");     
                      ?>  
                    </td>
                    <td class=" "><?php echo $rows->c_thoigian; ?></td>
                    <td class=" "><?php echo $rows->c_diadiem; ?></td>
                    
                    <td class=" last">
                    	<!-- <a href="admin.php?controller=add_edit_hoidongnghiemthu&act=edit&id=<?php //echo $rows->pk_hoidongnghiemthu_id; ?>">Edit</a>&nbsp;&nbsp; -->
						          <a onclick="return window.confirm('Are you sure?');" href="admin.php?controller=add_edit_hoidongnghiemthu&act=delete&id=<?php echo $rows->pk_hoidongnghiemthu_id; ?>">Delete</a>
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
            <li class="page-item"><a class="page-link" onclick="phanTrang(this)" href="admin.php?controller=hoidongnghiemthu&p=<?php echo $i; ?>" ><?php echo $i; ?></a></li>

          <?php endfor; ?>
          <script type="text/javascript">
            function phanTrang(el){
              debugger
              var namm = $("#nam").val();
              var bomonn = $("#bomon").val();
              var hdrf = URL_add_parameter($(el).attr('href'),'year',namm);
              $(el).attr('href',URL_add_parameter(hdrf,'classB',bomonn));
              
              //alert($('#btn_xemchitiet').attr('href'));
            }
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
          </script>

          </ul>
        </div>
      <!-- end phân trang -->

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