        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Thêm hội đồng nghiệm thu</h3>
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
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data" action="<?php echo $form_action; ?>">

                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Bộ môn</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="fk_mabomon_id" class="form-control col-md-7 col-xs-12">
                            <?php 
                              $bomon = $this->model->get_all("select * from tbl_bomon order by pk_mabomon_id desc");
                              foreach($bomon as $rows):
                             ?>
                            <option <?php if(isset($_GET['fk_mabomon_id']) && $_GET['fk_mabomon_id'] ==$rows->pk_mabomon_id){echo 'selected';} elseif(isset($record->fk_mabomon_id)&&$record->fk_mabomon_id==$rows->pk_mabomon_id){echo 'selected';}  ?> value="<?php echo $rows->pk_mabomon_id; ?>"><?php echo $rows->c_tenbomon; ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Đề tài</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="fk_madetai_id" class="form-control col-md-7 col-xs-12">
                            <?php 
                              $detai = $this->model->get_all("select * from tbl_detai dt join tbl_user u on u.pk_user_id = dt.fk_user_id  where dt.c_trangthai=2 ".(isset($_GET['fk_mabomon_id'])? " and u.fk_mabomon_id =".$_GET['fk_mabomon_id']:"")." order by pk_madetai_id desc");
                              foreach($detai as $rows):
                             ?>
                            <option <?php if(isset($record->fk_madetai_id)&&$record->fk_madetai_id==$rows->pk_madetai_id): ?> selected <?php endif; ?> value="<?php echo $rows->pk_madetai_id; ?>"><?php echo $rows->c_tendetai; ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>

                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Tên hội đồng <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="c_tenhoidong" value="<?php echo isset($record->c_tenhoidong)?$record->c_tenhoidong:""; ?>" required class="form-control col-md-7 col-xs-12" id="first-name">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Ngày bảo vệ 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="date" name="c_ngaybaove" value="<?php echo isset($record->c_ngaybaove)?$record->c_ngaybaove:""; ?>"  class="form-control col-md-7 col-xs-12" >
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Thời gian bảo vệ 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="time" name="c_thoigian" value="<?php echo isset($record->c_thoigian)?$record->c_thoigian:""; ?>"  class="form-control col-md-7 col-xs-12" >
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Địa điểm bảo vệ 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="c_diadiem" value="<?php echo isset($record->c_diadiem)?$record->c_diadiem:""; ?>"  class="form-control col-md-7 col-xs-12" >
                        </div>
                      </div>


    
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-primary" type="button"><a href="admin.php?controller=hoidongnghiemthu" style="color: white;">Cancel</a></button>
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
    $('select.form-control[name="fk_mabomon_id"]').on('change',function(){
      //console.log($(this).val());
      window.location.href = URL_add_parameter(window.location.href,'fk_mabomon_id',$(this).val());
    });
  });
</script>


