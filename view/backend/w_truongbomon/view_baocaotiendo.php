        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Báo cáo tiến độ</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                  
                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data" action="">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Chọn đề tài</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="fk_madetai_id" class="form-control col-md-7 col-xs-12">

                            <option value="0">chọn</option>
                            <?php 
                              $detai = $this->model->get_all("select * from tbl_detai dt join tbl_user u on dt.fk_user_id = u.pk_user_id join tbl_bomon bm on bm.pk_mabomon_id = u.fk_mabomon_id where dt.c_trangthai in(2) and bm.pk_mabomon_id in(select fk_mabomon_id from tbl_user WHERE pk_user_id={$_SESSION['SS_USER']->pk_user_id}) order by pk_madetai_id desc");

                              foreach($detai as $rows):
                             ?>
                             
                            <option <?php if(isset($record->fk_madetai_id)&&$record->fk_madetai_id==$rows->pk_madetai_id){echo 'selected';}elseif(isset($_GET['fk_madetai_id'])&&($_GET['fk_madetai_id']==$rows->pk_madetai_id)){echo'selected';} ?> value="<?php echo $rows->pk_madetai_id; ?>"><?php echo $rows->c_tendetai; ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>

                    </form>

                    <div class="table-responsive">
                    <?php if(isset($_GET['fk_madetai_id'])&&$_GET['fk_madetai_id']>0){?>
                    <table class="table table-striped jambo_table bulk_action">
                      <thead>
                        <tr class="headings">
                          <th>
                            <input type="checkbox" id="check-all" class="flat">
                          </th>
                          <th class="column-title">Tên đề tài </th>
                          <th class="column-title">Chủ nhiệm đề tài </th>
                          <th class="column-title">Bộ môn </th>
                          <th class="column-title">Các kết quả đạt được </th>
                          <th class="column-title">Tiến độ hoàn thành đề tài </th>
                          <th class="column-title">Ghi chú </th> 
                        </tr>
                      </thead>
                      <tbody>
                      <?php foreach($arr as $rows): ?>
                        <tr class="even pointer">
                          <td class="a-center ">
                            <input type="checkbox" class="flat" name="table_records">
                          </td>

                          <td class=" ">
                            <?php 
                              $detai = $this->model->get_a_record("select c_tendetai from tbl_detai where pk_madetai_id={$rows->fk_madetai_id}");
                              echo isset($detai->c_tendetai)?$detai->c_tendetai:"";
                            ?>
                          </td>

                           <td class=" ">
                            <?=$rows->c_fullname?>
                          </td>
                          <td class=" ">
                            <?php 
                              $bomon = $this->model->get_a_record("select c_tenbomon from tbl_bomon where pk_mabomon_id={$rows->fk_mabomon_id}");
                              echo isset($bomon->c_tenbomon)?$bomon->c_tenbomon:"";
                            ?>
                          </td>
                          <td class=" "><?php echo $rows->c_noidungtiendo; ?></td>
                          <td class=" "><?php echo $rows->c_hoanthanhtiendo; ?>%</td>
                          <td class=" "><?php echo $rows->c_ghichu; ?></td>
                        </tr>
                      <?php endforeach; ?>
                      </tbody>
                    </table>
                    <?php }?>
                  </div>
                </div>
              </div>
            </div>

            </div>
            </div>
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

  $(function(){
    $('select.form-control[name="fk_madetai_id"]').on('change',function(){
      //console.log($(this).val());
      window.location.href = URL_add_parameter(window.location.href,'fk_madetai_id',$(this).val());
    });
  });
</script>


