<?php 
    $slide = $this->model->get_all("select * from tbl_slide order by pk_slide_id desc");
    $n = 0;
 ?>
<div id="slideshow" class="carousel slide" data-ride="carousel"> 
        <!-- Indicators -->
        <ul class="carousel-indicators">
        <?php foreach($slide as $rows): ?>
          <li data-target="#slideshow" data-slide-to="<?php echo $n; ?>" <?php if($n == 0): ?> class="active" <?php endif; ?> ></li>
        <?php 
            $n++;
          endforeach;
         ?>
        </ul>
        <!-- The slideshow -->
        <div class="carousel-inner">
        <?php 
            $n = 0;
            foreach($slide as $rows):
         ?>
          <div class="carousel-item <?php if($n==0): ?> active<?php endif; ?>"> <img src="public/upload/slide/<?php echo $rows->c_img; ?>" alt="<?php echo $rows->c_name; ?>">
            <div class="carousel-text"><a href="#"><?php echo $rows->c_name; ?></a></div>
          </div>
          <?php 
              $n++;
            endforeach;
           ?>
        </div>
        <!-- Left and right controls --> 
        <a class="carousel-control-prev" href="#slideshow" data-slide="prev"> <span class="carousel-control-prev-icon"></span> </a> <a class="carousel-control-next" href="#slideshow" data-slide="next"> <span class="carousel-control-next-icon"></span> </a> </div>