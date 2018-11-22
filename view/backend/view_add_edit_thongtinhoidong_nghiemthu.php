        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Thành viên hội đồng nghiệm thu</h3>
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
                        <div class="col-md-4 col-sm-4 col-xs-12">
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

                      <?php $id_detai = $_SESSION['ID_DETAI']; $id_detai==null || $id_detai==''?$id_detai=0:''; ?>
                      <div class="form-group"> 
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Thành viên</label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <select name="fk_user_id" class="form-control col-md-7 col-xs-12">
                            <?php 
                              $giamkhao = $this->model->get_all("SELECT * from tbl_user where fk_mabomon_id=".(isset($_GET['fk_mabomon_id'])?$_GET['fk_mabomon_id']:(isset($record->pk_mabomon_id)?$record->pk_mabomon_id:""))." order by pk_user_id desc");
                              foreach($giamkhao as $rows):
                             ?>
                            <option <?php if(isset($record->pk_user_id)&&$record->pk_user_id==$rows->pk_user_id): ?> selected <?php endif; ?> value="<?php echo $rows->pk_user_id; ?>"><?php echo $rows->c_fullname; ?></option>
                            <?php endforeach; ?>
                          </select>

                        </div>
                      </div>

                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Vai trò</label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <select id="fk_vaitro_id" name="fk_vaitro_id" class="form-control col-md-7 col-xs-12">
                            <?php 
                              $vaitro = $this->model->get_all("select * from tbl_vaitro order by pk_vaitro_id desc");
                              foreach($vaitro as $rows):
                             ?>
                            <option <?php if(isset($record->fk_vaitro_id)&&$record->fk_vaitro_id==$rows->pk_vaitro_id): ?> selected <?php endif; ?> value="<?php echo $rows->pk_vaitro_id; ?>"><?php echo $rows->c_vaitro; ?></option>
                            <?php endforeach; ?>
                          </select>
                          <?php 
                            $idhddt = isset($record)&&isset($record->pk_hoidong_id)?$record->pk_hoidong_id:0; 
                            ($idhddt>0)?$_SESSION['fking_hddt'] = $idhddt:"";
                          ?>
                          <input type="text" name="pk_hd_detai_id" value="<?=$_SESSION['fking_hddt']?>" hidden>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-primary" type="button"><a href="admin.php?controller=thongtinhoidong_nghiemthu" style="color: white;">Cancel</a></button>
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



