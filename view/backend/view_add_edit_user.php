        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Thêm người dùng</h3>
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Họ và tên <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        	<input type="text" name="c_fullname" value="<?php echo isset($record->c_fullname)?$record->c_fullname:''; ?>" required class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Bộ môn</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="fk_mabomon_id" class="form-control col-md-7 col-xs-12">
                            <?php 
                              $bomon = $this->model->get_all("select * from tbl_bomon order by pk_mabomon_id desc");
                              foreach($bomon as $rows):
                             ?>
                            <option <?php if(isset($record->fk_mabomon_id)&&$record->fk_mabomon_id==$rows->pk_mabomon_id): ?> selected <?php endif; ?> value="<?php echo $rows->pk_mabomon_id; ?>"><?php echo $rows->c_tenbomon; ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Học hàm <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="c_hocham" value="<?php echo isset($record->c_hocham)?$record->c_hocham:""; ?>" required class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Học vị <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="c_hocvi" value="<?php echo isset($record->c_hocvi)?$record->c_hocvi:""; ?>" required class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Ngày sinh
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="date" name="c_ngaysinh" value="<?php echo isset($record->c_ngaysinh)?$record->c_ngaysinh:""; ?>" required class="date-picker form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Địa chỉ
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="c_diachi" value="<?php echo isset($record->c_diachi)?$record->c_diachi:""; ?>" required class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >SĐT <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="c_sdt" value="<?php echo isset($record->c_sdt)?$record->c_sdt:""; ?>" required class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        	<input <?php if(isset($record->c_email)) { ?> disabled <?php } ?> required type="email" name="c_email" value="<?php echo isset($record->c_email)?$record->c_email:""; ?>" class="form-control">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Password <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        	<input type="password" name="c_password" <?php if(isset($record->c_email)): ?> placeholder="Nhập password mới nếu muốn đổi password" <?php else: ?> required <?php endif; ?> class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Loại user</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="UserType" class="form-control col-md-7 col-xs-12">
                            <option value="1" <?php if(isset($record->UserType)&&$record->UserType==1){echo 'selected';} ?>>Giáo viên</option>
                            <option value="3" <?php if(isset($record->UserType)&&$record->UserType==3){echo 'selected';} ?>>Thư ký hội đồng</option>
                            <option value="2" <?php if(isset($record->UserType)&&$record->UserType==2){echo 'selected';} ?>>Trưởng bộ môn</option>
                            <option value="0" <?php if(isset($record->UserType)&&$record->UserType==0){echo 'selected';} ?>>Admin</option>
                          </select>
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-primary" type="button"><a href="admin.php?controller=user" style="color: white;">Cancel</a></button>
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




