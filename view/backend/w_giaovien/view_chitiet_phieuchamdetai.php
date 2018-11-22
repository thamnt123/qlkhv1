  <?php 

  ?>
 <!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Phiếu chấm đề tài</h3>
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
          <div class="x_title" >
             <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data" action="<?php echo $form_action; ?>">
                       <div class="form-group">

                        <label class="control-label col-md-1 col-sm-1 col-xs-12" >Bộ môn 
                        </label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                          <input name="fk_mabomon_id" class="form-control col-md-7 col-xs-12" value="<?=$record->c_tenbomon?>" readonly>
                        </div>
                        
                        <label class="control-label col-md-1 col-sm-1 col-xs-12">Đề tài</label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                          <input type="text" name="fk_madetai_id" class="form-control col-md-7 col-xs-12" value="<?=$record->c_tendetai?>" readonly="">
                        </div>

                        
                      </div>

                      <div class="form-group">
                        <?php 
                          $ngay_hop = explode("-", $record->ngay_hop);
                          $ngay_hop = $ngay_hop[2]."-".$ngay_hop[1]."-".$ngay_hop[0];
                          $hoi_dong = $this->model->get_all("select * from tbl_detai dt join tbl_hoidongnghiemthu hd on hd.fk_madetai_id = dt.pk_madetai_id join tbl_hoidong_detai hddt on hddt.fk_hoidongnghiemthu_id = hd.pk_hoidongnghiemthu_id join tbl_vaitro vt on hddt.fk_vaitro_id = vt.pk_vaitro_id join tbl_user u on hddt.fk_user_id = u.pk_user_id where dt.pk_madetai_id=".$record->pk_madetai_id);
                        ?>
                        <label class="control-label col-md-1 col-sm-1 col-xs-12" >Ngày họp 
                        </label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                          
                          <input type="text" id="ngayHop" name="ngay_hop" value="<?=(isset($ngay_hop)?$ngay_hop:"")?>" required class="form-control col-md-7 col-xs-12" readonly> 
                        </div>

                         <label class="control-label col-md-1 col-sm-1 col-xs-12" >Địa điểm 
                        </label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                          <input type="text" id="diaDiem" name="dia_diem" value="<?=$record->dia_diem?>" required class="form-control col-md-7 col-xs-12" readonly> 
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-1 col-sm-1 col-xs-12" >Hội đồng 
                        </label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                           <div class="table-responsive">
                              <table class="table table-striped jambo_table ">
                                <thead>
                                   <tr class="headings">
                                      <th class="column-title">Vai Trò  </th>
                                      <th class="column-title">Tên </th>
                                    </tr>
                                  </thead>
                                    <tbody>
                                      <?php 
                                        if(isset($hoi_dong)){ 
                                          foreach ($hoi_dong as $item) {
                                      ?>
                                       <tr class="even pointer">
                                          <td class=" "><?=$item->c_vaitro?></td>
                                          <td class=" "><?=$item->c_fullname?></td>      
                                        </tr>
                                      <?php }} ?>
                                    </tbody>
                                  </table>
                                </div>
                        </div>

                         <label class="control-label col-md-1 col-sm-1 col-xs-12" >Chủ nhiệm đề tài </label>
                          <div class="col-md-5 col-sm-5 col-xs-12">
                            <input class="form-control col-md-7 col-xs-12" value="<?=$record->c_fullname?>" readonly> 
                          </div>
                      </div>
              </form>
          <div> 
      </div>
            <div class="clearfix"></div>
          </div>

          <div class="x_content">
            <div class="table-responsive">
              <table class="table table-striped jambo_table bulk_action">
                <thead>
                  <tr class="headings">
                    <th class="column-title" >STT </th>
                    <th class="column-title">Nội dung đánh giá </th>
                    <th class="column-title">Điểm tối đa </th>
                    <th class="column-title" >Điểm đánh giá </th>
                    <th class="column-title" >Điểm đánh giá </th>
                    <th class="column-title" >Điểm đánh giá </th>
                  </tr>

                   <tr class="headings"> 
                      <td></td>
                      <td></td>
                      <td></td>
                      <td>Chủ tịch</td>
                      <td>Phản biện 1</td>
                      <td>Phản biện 2</td>
                    </tr>
                </thead>
                <tbody>
                  <?php 
                    $index = 0;
                    $tong_diem_chu_tich=0;
                    $tong_diem_phan_bien_1=0;
                    $tong_diem_phan_bien_2=0;
                  ?>
                  <?php $arr= $this->model->get_all("SELECT * FROM tbl_diem_phieucham dpc JOIN tbl_detai_phieucham dtpc ON dpc.fk_detai_phieucham_id = dtpc.pk_detai_phieucham_id JOIN tbl_phieucham pc ON dpc.fk_khoanmucdiem_id = pc.pk_khoanmucdiem_id WHERE parentId=0 AND dpc.fk_detai_phieucham_id= $record->pk_detai_phieucham_id order by pc.pk_khoanmucdiem_id");?>
                <?php foreach($arr as $rows): ?>
                  <?php 
                      $tong_diem_chu_tich+=$rows->diem_chu_tich;
                      $tong_diem_phan_bien_1+=$rows->diem_phan_bien_1;
                      $tong_diem_phan_bien_2+=$rows->diem_phan_bien_2;
                   ?>
                  <tr id="ptrId_<?=$rows->pk_khoanmucdiem_id?>" parentTr="<?=$rows->parentId?>" class="even pointer linePoint">
                    <td class=""><?=++$index?></td>
                    <td class=" " style="font-weight: bold; width: 250px;"><?php echo $rows->c_tenkhoanmuc; ?></td>
                    <td class=" " style="font-weight: bold;"><?=$rows->c_diemtoida?></td>
                    <td class=" " style="font-weight: bold;">
                      <input id="parent_<?=$rows->pk_khoanmucdiem_id?>" parent="0" type="text" class="form-control diem_chu_tich" value="<?=$rows->diem_chu_tich?>" readonly>
                    </td>
                    <td class=" " style="font-weight: bold;">
                      <input id="parent_<?=$rows->pk_khoanmucdiem_id?>" parent="0" type="text" class="form-control diem_phan_bien_1" value="<?=$rows->diem_phan_bien_1?>" readonly>
                    </td>
                    <td class=" " style="font-weight: bold;">
                      <input id="parent_<?=$rows->pk_khoanmucdiem_id?>" parent="0" type="text" class="form-control diem_phan_bien_2" value="<?=$rows->diem_phan_bien_2?>" readonly>
                      
                    </td>
                   
                  </tr>
                  <?php $arr1= $this->model->get_all("SELECT * FROM tbl_diem_phieucham dpc JOIN tbl_detai_phieucham dtpc ON dpc.fk_detai_phieucham_id = dtpc.pk_detai_phieucham_id JOIN tbl_phieucham pc ON dpc.fk_khoanmucdiem_id = pc.pk_khoanmucdiem_id WHERE parentId = $rows->pk_khoanmucdiem_id AND dpc.fk_detai_phieucham_id= $record->pk_detai_phieucham_id order by pc.pk_khoanmucdiem_id");?>
                  <?php foreach($arr1 as $rows1): ?>
                  <tr id="ptrId_<?=$rows1->pk_khoanmucdiem_id?>" parentTr="<?=$rows1->parentId?>" class="even pointer linePoint">
                    <td class=" "></td>
                    <td class=" "><?php echo $rows1->c_tenkhoanmuc; ?></td>
                    <td class=" "><?=$rows1->c_diemtoida?></td>
                    <td class=" "><input parent="<?=$rows1->parentId?>" type="text" class="form-control diem_chu_tich" value="<?=$rows1->diem_chu_tich?>" readonly></td>
                    <td class=" "><input parent="<?=$rows1->parentId?>" type="text" class="form-control diem_phan_bien_1" value="<?=$rows1->diem_phan_bien_1?>" readonly></td>
                    <td class=" ">
                      <input parent="<?=$rows1->parentId?>" type="text" class="form-control diem_phan_bien_2" value="<?=$rows1->diem_phan_bien_2?>" readonly>
                    </td>
                  </tr>
                <?php endforeach; ?>
                <?php endforeach; ?>
                </tbody>
              </table>
 
            </div>
             <!-- <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data" action="<?php //echo $form_action; ?>"> -->
               
              <div class="form-horizontal form-label-left">
                <div class="form-group">
                  <label class="control-label col-md-1 col-sm-1 col-xs-12" style="margin-left: 105px;">Tổng 
                  </label>
                  <div class="col-md-1 col-sm-1 col-xs-12" style="margin-left: 208px;">
                    <input id="tong_diem_chu_tich" onchange="" type="text"  value="<?=$tong_diem_chu_tich?>" class="form-control col-md-4 col-xs-12 tongdiem1" readonly="" >  
                  </div>
                  <div class="col-md-1 col-sm-1 col-xs-12" style="margin-left: 120px;">
                    <input id="tong_diem_phan_bien_1" onchange="" type="text" value="<?=$tong_diem_phan_bien_1?>" class="form-control col-md-4 col-xs-12 tongdiem1" readonly="" >  
                  </div>
                  <div class="col-md-1 col-sm-1 col-xs-12" style="margin-left: 120px;">
                    <input id="tong_diem_phan_bien_2" onchange="" type="text" value="<?=$tong_diem_phan_bien_2?>" class="form-control col-md-4 col-xs-12 tongdiem1" readonly="" >  
                  </div>
                </div>

                 <!-- <div class="form-group">
                     <label class="control-label col-md-1 col-sm-1 col-xs-12" style="margin-top: 10px;">Ý kiến 
                    </label>
                    <div class="col-md-5 col-sm-5 col-xs-12" style="margin-top: 10px;">
                      <input type="text" name="" value="<?php echo isset($record->y_kien)?$record->y_kien:""; ?>" required class="form-control col-md-7 col-xs-12" id="yKien"> 
                    </div>
                    <label class="control-label col-md-1 col-sm-1 col-xs-12" style="margin-top: 10px;">Ghi chú 
                    </label>
                    <div class="col-md-5 col-sm-5 col-xs-12"style="margin-top: 10px;">
                      <input type="text" name="" value="<?php echo isset($record->ghi_chu)?$record->ghi_chu:""; ?>" required class="form-control col-md-7 col-xs-12" id="ghiChu"> 
                    </div>
                  </div> -->
                  <div class="form-group">
                      <label class="control-label col-md-1 col-sm-1 col-xs-12" >Xếp loại <span class="required">*</span>
                      </label>
                      <div class="col-md-5 col-sm-5 col-xs-12">
                        <input class="form-control col-md-4 col-xs-12" type="text" id="xepLoai" value="<?=$record->xep_loai?>" readonly=""> 
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-1 col-sm-1 col-xs-12" style="margin-top: 10px;">Ý kiến 
                    </label>
                    <div class="col-md-5 col-sm-5 col-xs-12">
                      <textarea id="yKien" class="form-control" rows="3" placeholder='Nhập ý kiến' readonly=""><?=$record->y_kien?></textarea>
                    </div>
                    <label class="control-label col-md-1 col-sm-1 col-xs-12" style="margin-top: 10px;">Ghi chú 
                    </label>
                    <div class="col-md-5 col-sm-5 col-xs-12">
                      <textarea id="ghiChu" class="form-control" rows="3" placeholder='Nhập ghi chú' readonly=""><?=$record->ghi_chu?></textarea>
                    </div>
                  </div>
                   

                   <div class="form-group">
                      <div class="col-md-5 col-sm-5 col-xs-12" style="margin-left: 90px; margin-top: 10px; font-weight: bold;">
                        <?=($record->detaidunghan_quahan==1?"Đúng thời hạn:":"Quá hạn:")?>
                        <input type="radio" class="flat" name="gender" id="genderM" value="" checked  required style=""> 
                      </div>
                  </div>

                   <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-5">
                          <button class="btn btn-primary" type="button"><a href="giaovien.php?controller=phieuchamdetai" style="color: white;">Cancel</a></button>
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
</script>
<script type="text/javascript">
  function tinhDiemChung(){
    //Tinh tong diem chu tich
    $(document).on('change', '.diem_chu_tich',function(){
      var tong = 0;
      var parentId = parseInt($(this).attr('parent'));
      if(parentId > 0){
        $(`.diem_chu_tich[parent="${parentId}"]`).each(function(i,e){
          //console.log(e.value);
          if(e.value){
            tong += parseInt(e.value);
          }
        });
        $(`.diem_chu_tich#parent_${parentId}`).val(tong);
      }
      tong=0;
      $('.diem_chu_tich[parent="0"]').each(function(i,e){
        //console.log(e.value);
        if(e.value){
          tong += parseInt(e.value);
        }
      });
      $('#tong_diem_chu_tich').val(tong);
      tinhtong();
    });
    //-----------------------------------
    $(document).on('change', '.diem_phan_bien_1',function(){
      var tong = 0;
      var parentId = parseInt($(this).attr('parent'));
      if(parentId > 0){
        $(`.diem_phan_bien_1[parent="${parentId}"]`).each(function(i,e){
          //console.log(e.value);
          if(e.value){
            tong += parseInt(e.value);
          }
        });
        $(`.diem_phan_bien_1#parent_${parentId}`).val(tong);
      }
      tong=0;
      $('.diem_phan_bien_1[parent="0"]').each(function(i,e){
        //console.log(e.value);
        if(e.value){
          tong += parseInt(e.value);
        }
      });
      $('#tong_diem_phan_bien_1').val(tong);
      tinhtong();
    });
    //-----------------------------------
    $('.diem_phan_bien_2').on('change',function(){
      var tong = 0;
      var parentId = parseInt($(this).attr('parent'));
      if(parentId > 0){
        $(`.diem_phan_bien_2[parent="${parentId}"]`).each(function(i,e){
          //console.log(e.value);
          if(e.value){
            tong += parseInt(e.value);
          }
        });
        $(`.diem_phan_bien_2#parent_${parentId}`).val(tong);
      }
      tong=0;
      $('.diem_phan_bien_2[parent="0"]').each(function(i,e){
        //console.log(e.value);
        if(e.value){
          tong += parseInt(e.value);
        }
      });
      $('#tong_diem_phan_bien_2').val(tong);
      tinhtong();
    });
    //-----------------------------------
  }
</script>
<script type="text/javascript">
  //--------------------------------------
  function tinhtong(){
    var tong = 0;
    var count = 0;
    $('input.tongdiem1').each(function(i,e){
        if(e.value){
          count++;
          tong += parseFloat(e.value);
        }
    });
    tong/=count;
    
    if(tong<=100 && tong >=81){
      tong = 'Xuất sắc';
    }else if(tong<=80 && tong >=65){
      tong = 'Khá';
    }else if(tong<=64 && tong >=50){
      tong = 'Đạt';
    }else if(tong<50 && tong >=0){
      tong = 'Không đạt';
    }else{
      tong = '0';
    }
    $('#xepLoai').val(tong);
  };
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

  $(function(){
    $('select.form-control[name="fk_mabomon_id"]').on('change',function(){
      //console.log($(this).val());
      var href = URL_add_parameter(window.location.href,'fk_mabomon_id',$(this).val());
      href = URL_add_parameter(href,'fk_madetai_id',0);
      window.location.href = href;
    });
    $('select.form-control[name="fk_madetai_id"]').on('change',function(){
      //console.log($(this).val());
      window.location.href = URL_add_parameter(window.location.href,'fk_madetai_id',$(this).val());
    });
  });

  function submitForm(){
    var listPoint = [];
    $('.linePoint').each(function(){

      let diem_chu_tich = $(this).find('.diem_chu_tich').val();
      let diem_phan_bien_1 = $(this).find('.diem_phan_bien_1').val();
      let diem_phan_bien_2 = $(this).find('.diem_phan_bien_2').val();
      let pk_khoanmucdiem_id = $(this).find('.pk_khoanmucdiem_id').val();
      var item = {
        pk_khoanmucdiem_id: pk_khoanmucdiem_id?pk_khoanmucdiem_id:0,
        diem_chu_tich : diem_chu_tich?diem_chu_tich:0,
        diem_phan_bien_1 : diem_phan_bien_1?diem_phan_bien_1:0,
        diem_phan_bien_2 : diem_phan_bien_2?diem_phan_bien_2:0
      };
      listPoint.push(item);
    });
    var objReturn = {
      fk_user_id: <?=$_SESSION['SS_USER']->pk_user_id?>,
      ghiChu : $('#ghiChu').val(),
      yKien : $('#yKien').val(),
      xepLoai: $('#xepLoai').val(),
      ngayHop: $('#ngayHop').val(),
      diaDiem: $('#diaDiem').val(),
      deTaiDungHan : $('input[name="gender"]:checked').val(),
      fk_madetai_id: $('select[name="fk_madetai_id"]').val(),
      listPoint : listPoint
    }
    console.log(objReturn);
    $.ajax({
        url: "view/backend/w_hoidong/controller_add_diem_phieucham.php",
        type: "get",
        contentType : 'application/json; charset=utf-8',
        dataType: "json",
        data: objReturn,
        success: function(data){
          debugger
          if(data.result === "OKE!"){
            alert("Thêm mới thành công!");
            location.href = "hoidong.php?controller=phieuchamdetai";
          }else{
            alert("Có lỗi xảy ra!");
          }
        }
    });
  }
</script>
<script type="text/javascript">
  $(function(){
    $('tr[id]').each(function(i,e){
      var id = parseInt($(this).attr('id').split('_')[1]);
      var parent = parseInt($(this).attr('parenttr'));
      if(parent == 0 && $(`tr[parenttr="${id}"]`).length>0){
        $(this).find('input').attr('readonly','readonly');
      }
    });
    tinhDiemChung()
    
  });
  
</script>