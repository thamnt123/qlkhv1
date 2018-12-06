        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Danh sách đề tài đang thực hiện</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                   <!--  <input type="text" class="form-control" placeholder="Search for...">
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Tên đề tài
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        	<input type="text" name="c_tendetai" value="<?php echo isset($record->c_tendetai)?$record->c_tendetai:""; ?>" required class="form-control col-md-7 col-xs-12" readonly>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Bộ môn
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?php $bomonn = $this->model->get_a_record('select * from tbl_detai dt join tbl_user u on u.pk_user_id = dt.fk_user_id join tbl_bomon bm on bm.pk_mabomon_id=u.fk_mabomon_id where dt.pk_madetai_id ='.$record->pk_madetai_id) ?>
                        <input type="text" name="c_tendetai" value="<?php echo isset($bomonn->c_tenbomon)?$bomonn->c_tenbomon:""; ?>" required class="form-control col-md-7 col-xs-12" readonly>
                        </div>
                      </div>


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nội dung nghiên cứu 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        	<input type="text" name="c_noidungnghiencuu" value="<?php echo isset($record->c_noidungnghiencuu)?$record->c_noidungnghiencuu:""; ?>" required class="form-control col-md-7 col-xs-12" readonly>
                        </div>
                      </div>

                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Kinh phí 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="c_kinhphi" value="<?php echo isset($record->c_kinhphi)?$record->c_kinhphi:""; ?>" required class="form-control col-md-7 col-xs-12" readonly>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Từ ngày 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="c_tungay" value="<?php echo isset($record->c_tungay)?$record->c_tungay:""; ?>" required class="form-control col-md-7 col-xs-12" readonly>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Đến ngày 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="c_denngay" value="<?php echo isset($record->c_denngay)?$record->c_denngay:""; ?>" required class="form-control col-md-7 col-xs-12" readonly>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">File mô tả 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="file_mo_ta" value="<?php echo isset($record->file_mo_ta)?$record->file_mo_ta:""; ?>" required class="form-control col-md-7 col-xs-12" readonly>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Chủ nhiệm đề tài 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?php $item = $this->model->get_a_record("SELECT * FROM `tbl_user` where pk_user_id = $record->fk_user_id"); ?>
                           <input type="text" name="file_mo_ta" value="<?=$item->c_fullname?>" required class="form-control col-md-7 col-xs-12" readonly>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Người thực hiện đề tài 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="select2_multiple form-control" multiple="multiple">
                            <?php  $arr = $this->model->get_all("SELECT * FROM tbl_user u join tbl_detai_user du on u.pk_user_id = du.fk_user_id join tbl_detai dt on dt.pk_madetai_id = du.fk_madetai_id where dt.pk_madetai_id =$record->pk_madetai_id")?>
                            <?php foreach($arr as $rows): ?>
                            <option value="<?=$rows->pk_user_id?>" readonly><?=$rows->c_fullname?> - <?=$rows->c_email?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>



                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-primary" type="button"><a href="admin.php?controller=detaidangthuchien&classB=<?=$classB?>" style="color: white;">Cancel</a></button>
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




