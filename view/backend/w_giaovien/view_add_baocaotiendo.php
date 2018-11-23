
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Báo cáo tiến độ</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data" action="<?php echo $form_action; ?>">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Đề tài</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="fk_madetai_id" class="form-control col-md-7 col-xs-12">
                            <option value="0">Chọn</option>
                            <?php 
                              $detai = $this->model->get_all("select * from tbl_detai dt join tbl_user u on u.pk_user_id = dt.fk_user_id where dt.c_trangthai=2 and dt.fk_user_id={$_SESSION["SS_USER"]->pk_user_id} order by dt.pk_madetai_id desc");
                              foreach($detai as $rows):
                             ?>
                            <option <?php if(isset($_GET['fk_madetai_id'])&&$_GET['fk_madetai_id']==$rows->pk_madetai_id): ?> selected <?php endif; ?> value="<?php echo $rows->pk_madetai_id; ?>"><?php echo $rows->c_tendetai; ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>

                      <?php 
                          if(isset($_GET['fk_madetai_id'])){
                          $chunhiem = $this->model->get_a_record('select * from tbl_detai dt join tbl_user u on u.pk_user_id = dt.fk_user_id where dt.pk_madetai_id='.$_GET['fk_madetai_id']);
                        }
                       ?>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Chủ nhiệm đề tài</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="c_fullname" value="<?php echo isset($chunhiem)?$chunhiem->c_fullname:""; ?>" required class="form-control col-md-7 col-xs-12" disabled>
                        
                        </div>
                      </div>

                      <div class="form-group">
                        <?php 
                          if(isset($_GET['fk_madetai_id'])){
                            $bomonn = $this->model->get_a_record('select * from tbl_detai dt join tbl_user u on u.pk_user_id = dt.fk_user_id join tbl_bomon bm on bm.pk_mabomon_id=u.fk_mabomon_id where dt.pk_madetai_id ='.$_GET['fk_madetai_id']); 
                          }
                        ?>
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Bộ môn</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="fk_mabomon_id" value="<?php echo isset($bomonn)?$bomonn->c_tenbomon:""; ?>" required class="form-control col-md-7 col-xs-12" disabled>
                        </div>
                      </div>

                      

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Các kết quả đã đạt được 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="c_noidungtiendo" value="<?php echo isset($record->c_noidungtiendo)?$record->c_noidungtiendo:""; ?>" required class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tiến độ hoàn thành đề tài 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="c_hoanthanhtiendo" value="<?php echo isset($record->c_hoanthanhtiendo)?$record->c_hoanthanhtiendo:""; ?>" required class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Ghi chú 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="c_ghichu" value="<?php echo isset($record->c_ghichu)?$record->c_ghichu:""; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-primary" type="button"><a href="giaovien.php?controller=baocaotiendo" style="color: white;">Cancel</a></button>
						              <button class="btn btn-primary" type="reset" value="Reset">Reset</button>
                          <button type="submit" value="Process" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>
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



