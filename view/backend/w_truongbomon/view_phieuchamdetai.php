
 <!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Kết quả đề tài</h3>
      </div>
      <div class="clearfix"></div>

       <form method="post" enctype="multipart/form-data" action="<?php echo $form_action; ?>">
        <div class="control-label col-md-0 col-sm-1 col-xs-12">Chọn năm:</div>
        <div class="col-md-3 col-sm-3 col-xs-12" >
          <select class="form-control" name="nam" id="nam">
            <option value="0">Tất cả</option>
            <?php 
              $selected = isset($year)?$year:date("Y");
              // if(isset($year)){
              //   $selected = $year;
              // }else if(isset($_GET['year'])){
              //    $selected = $_GET['year'];
              // }else{
              //    $selected = date("Y");
              // }
              $nam = $this->model->get_all("select * from tbl_nam order by pk_nam_id desc");
              foreach($nam as $rows):
             ?>
            <option <?php if(isset($rows->c_nam)&&$rows->c_nam==$selected): ?> selected <?php endif; ?> value="<?php echo $rows->c_nam; ?>"><?php echo $rows->c_nam; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="control-label col-md-0 col-sm-1 col-xs-12" >
          <button type="submit" name="Process" value="Process" class="btn btn-success">Submit</button>
        </div>
      </form>
      
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
           <div class="x_title">
            <div>
      </div>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="table-responsive">
              <table class="table table-striped jambo_table bulk_action">
                <thead>
                  <tr class="headings">
                    <th>
                      <input type="checkbox" id="check-all" class="flat">
                    </th>
                    <th class="column-title">Tên đề tài </th>
                    <th class="column-title">Chủ nhiệm đề tài </th>
                    <th class="column-title">Bộ môn </th>
                    <th class="column-title">Xếp loại </th>
                    <th class="column-title">Action </th>
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
                    <td class=" "><?php echo $rows->c_tendetai;?></td>
                    <td class=" "><?php echo $rows->c_fullname;?></td>
                    <td class=" "><?php echo $rows->c_tenbomon;?></td>
                    <td class=" "><?php echo $rows->xep_loai;?></td>
                    <td class=" last">
                      <button type="button" class="btn btn-default btn-xs"><a href="truongbomon.php?controller=chitiet_phieuchamdetai&act=xem&id=<?php echo $rows->pk_madetai_id; ?>">Xem chi tiết</a></button>
                    </td>
                  </tr>
                <?php endforeach; ?>
                </tbody>
              </table>
            
           
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /page content -->




		
		