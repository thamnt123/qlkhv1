
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Đăng kí đề tài</h3>
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Tên đề tài <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        	<input type="text" name="c_tendetai" value="<?php echo isset($record->c_tendetai)?$record->c_tendetai:""; ?>" required class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nội dung nghiên cứu 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="c_noidungnghiencuu" value="<?php echo isset($record->c_noidungnghiencuu)?$record->c_noidungnghiencuu:""; ?>" required class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Kinh phí 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" min="1000" step="1000" name="c_kinhphi" onchange="kinhPhiOnChange(this);" value="<?php echo isset($record->c_kinhphi)?$record->c_kinhphi:""; ?>" required class="form-control col-md-7 col-xs-12">
                        </div>
                        <script type="text/javascript">
                          function kinhPhiOnChange(el){
                            var value = $(el).val();
                            var index = 1;
                            var result = "";
                            debugger
                            value = value.split('').reverse().join('');
                            value=value.indexOf(',')==-1?value:(value.replace(/,/g,''));
                            if(typeof parseInt(value)=="number"){
                              while(index <= value.length){
                                 result+=value[index-1];
                                if(index%3==0&&index < value.length){
                                  result+=","; 
                                }
                                index++;
                              }
                              result = result.split('').reverse().join('');
                               $(el).val(result);
                            }
                          }
                        </script>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Từ ngày 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="date" name="c_tungay" value="<?php echo isset($record->c_tungay)?$record->c_tungay:""; ?>" required class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Đến ngày 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="date" name="c_denngay" value="<?php echo isset($record->c_denngay)?$record->c_denngay:""; ?>" required class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">File mô tả 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" name="file_mo_ta" id="file_mo_ta" value="" required class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Chủ nhiệm đề tài 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           <input type="text" name="" value="<?=$_SESSION['SS_USER']->c_fullname?>" required class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Người thực hiện đề tài 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="thanh_vien[]" class="select2_multiple form-control" multiple="multiple">
                            <?php  $arr = $this->model->get_all("select * from tbl_user where UserType = 1 and fk_mabomon_id={$_SESSION['SS_USER']->fk_mabomon_id}");?>
                            <?php foreach($arr as $rows): ?>
                            <option value="<?=$rows->pk_user_id?>"><?=$rows->c_fullname?> - <?=$rows->c_email?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>

                      


                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-primary" type="button"><a href="giaovien.php?controller=dangkidetai" style="color: white;">Cancel</a></button>
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




