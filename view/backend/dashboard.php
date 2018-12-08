<?php $model = new model(); ?>

<div class="right_col" role="main">
  <!-- top tiles -->
  <div class="row tile_count">

    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-user"></i> Tổng Users</span>
      <div class="count"><?php echo($model->num_rows("select * from tbl_user")); ?></div>
    </div>

    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-user"></i> Số đề tài hoàn thành</span>
      <div class="count green"><?php echo($model->num_rows("select * from tbl_detai where c_trangthai = 3")); ?></div>
    </div>

    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-user"></i> Số đề tài bị hủy</span>
      <div class="count red"><?php echo($model->num_rows("select * from tbl_detai where c_trangthai = 4")); ?></div>
    </div>

  </div>
</div>

  <!-- /top tiles -->

