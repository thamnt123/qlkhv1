        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Thêm tin tức</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Tiêu đề <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        	<input type="text" name="c_name" value="<?php echo isset($record->c_name)?$record->c_name:""; ?>" required class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Danh mục <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        	<select name="fk_category_news_id">
            								<?php 
            									$category = $this->model->get_all("select * from tbl_category_news order by pk_category_news_id desc");
            									foreach($category as $rows):
            								 ?>
            								<option <?php if(isset($record->fk_category_news_id)&&$record->fk_category_news_id==$rows->pk_category_news_id): ?> selected <?php endif; ?> value="<?php echo $rows->pk_category_news_id; ?>"><?php echo $rows->c_name; ?></option>
            								<?php endforeach; ?>
            							</select>
                        </div>
                      </div>


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Giới thiệu <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                        	<textarea name="c_description" id="c_description">
            								<?php echo isset($record->c_description)?$record->c_description:''; ?>
            							</textarea>
            							<script type="text/javascript">
            								CKEDITOR.replace("c_description");
            							</script>
                        </div>
                      </div>


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Chi tiết <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                        	<textarea name="c_content" id="c_content">
									<?php echo isset($record->c_content)?$record->c_content:''; ?>
								</textarea>
				<script type="text/javascript">
					CKEDITOR
	                .create(document.querySelector( '#c_content' ));
				</script>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        	<input type="checkbox" <?php if(isset($record->c_hotnews)&&$record->c_hotnews==1): ?> checked <?php endif; ?> name="c_hotnews"> Tin nổi bật
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Ảnh <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        	<input type="file" name="c_img" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>


                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-primary" type="button"><a href="admin.php?controller=news" style="color: white;">Cancel</a></button>
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




