
 <!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Theo dõi đề tài chờ xét duyệt</h3>
      </div>

      <div class="clearfix"></div>
      <form method="post" enctype="multipart/form-data" action="<?php echo $form_action; ?>">
        <div class="clearfix"></div>

       
        <!-- lọc bộ môn -->
        <div class="control-label col-md-0 col-sm-1 col-xs-12">Bộ môn:</div>
        <div class="col-md-3 col-sm-3 col-xs-12" >
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
        
        <div class="control-label col-md-0 col-sm-1 col-xs-12">
          <button type="submit" name="Process" value="Process" class="btn btn-success">Search</button>
        </div>
      </form>

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
                    <th class="column-title">Chủ nhiệm</br>đề tài </th>
                    
                    
                    <th class="column-title">Từ ngày </th>
                    <th class="column-title">Đến ngày </th>
                    <th class="column-title">File mô tả </th>
                    <th class="column-title">Trạng thái </th>
                   
                    <!-- <th class="column-title">Action </th> -->
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
                    <td class=" " style="width: 120px;"><?php echo $rows->c_tendetai; ?></td>
                     <td class=" ">
                      <?php 
                        $bomon = $this->model->get_a_record("select c_tenbomon from tbl_bomon where pk_mabomon_id={$rows->fk_mabomon_id}");
                        echo isset($bomon->c_tenbomon)?$bomon->c_tenbomon:"";
                      ?>
                    </td>
                    <td class=" ">

                      <?php 
                        $item = $this->model->get_a_record(" select * from tbl_user where pk_user_id =".$rows->fk_user_id);  
                      
                      
                      echo (isset($item)&&$item != null && (isset($item->c_fullname))?$item->c_fullname:""); 
                      ?>

                    </td>
                  
                    
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
                          echo "Chờ phòng QLKH duyệt";
                      ?>  
                    </td>
                    

                    <script type="text/javascript">
                      function xemChiTiet(){
                        debugger
                       
                        var bomonn = $("#bomon").val();
                        $('#btn_xemchitiet').attr('href',`${$('#btn_xemchitiet').attr('href')}&classB=${bomonn}`);
                        //alert($('#btn_xemchitiet').attr('href'));
                      }
                    </script>
                    <!-- <td class=" last">
                      
                      <button type="button" class="btn btn-default btn-xs"><a id="btn_xemchitiet" onclick="xemChiTiet().call(this);" href="admin.php?controller=chitiet_detaichoxetduyet&act=xem&id=<?=$rows->pk_madetai_id?>">Xem chi tiết</a></button>                   
                    </td> -->
                  
                  </tr>
                <?php endforeach; ?>
                </tbody>
              </table>
            
            
              <!-- phân trang -->
              <div class="card-footer" style="padding:5px !important">
          <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">Trang</a></li>
          <?php for($i=1; $i<=$num_page; $i++): ?>  
            <li class="page-item"><a class="page-link" onclick="phanTrang(this)" href="admin.php?controller=theodoidetai&p=<?php echo $i; ?>"><?php echo $i; ?></a></li>
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




    
    