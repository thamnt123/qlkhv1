
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

      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            
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
                      <a href="hoidong.php?controller=thongtinhoidong_nghiemthu&IdHoiDong=<?=$rows->pk_hoidongnghiemthu_id?>&TenHoiDong=<?=$rows->c_tenhoidong?>&IdDeTai=<?=$rows->fk_madetai_id?>" style="color: white;">Thành viên hội đồng</a></button> 
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
                    
                    
                  </tr>
                <?php endforeach; ?>
                </tbody>
              </table>


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