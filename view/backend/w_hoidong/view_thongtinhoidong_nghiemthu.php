
 <!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Thành viên hội đồng: <?=$_SESSION["TEN_HOIDONG"]?></h3>
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
                    <th>
                      <input type="checkbox" id="check-all" class="flat">
                    </th>
                    <th class="column-title">ID giám khảo </th>
                    <th class="column-title">Giám khảo </th>
                    <th class="column-title">Vai trò </th>
                    <th class="column-title no-link last" ><span class="nobr">Action</span></th>
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
                    <td class=" "><?php echo $rows->pk_hoidong_id; ?></td>
                    <td class=" ">
                      <?php 
                        $giamkhao = $this->model->get_a_record("select c_fullname from tbl_user where pk_user_id={$rows->fk_user_id}");
                        echo isset($giamkhao->c_fullname)?$giamkhao->c_fullname:"";
                      ?>
                    </td>
                    <td class=" ">
                      <?php 
                        $vaitro = $this->model->get_a_record("select c_vaitro from tbl_vaitro where pk_vaitro_id={$rows->fk_vaitro_id}");
                        echo isset($vaitro->c_vaitro)?$vaitro->c_vaitro:"";
                      ?>
                    </td>
                 
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
           
        <div class="col-md-offset">
          <button class="btn btn-primary" type="button"><a href="hoidong.php?controller=hoidongnghiemthu" style="color: white;">Cancel</a></button>
          
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