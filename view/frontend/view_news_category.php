<h5 class="box-main-title">
  <?php 
      $category = $this->model->get_a_record("select c_name from tbl_category_news where pk_category_news_id=$id");
      echo isset($category->c_name)?$category->c_name:"";
   ?>
</h5>
      <div class="row"> 
        <?php foreach($arr as $rows): ?>
        <!-- news -->
        <div class="col-md-6 col-sm-12">
          <article class="news">
            <figure> <img class="img-thumbnail" src="public/upload/news/<?php echo $rows->c_img; ?>"> </figure>
            <div><a href="index.php?controller=news_detail&id=<?php echo $rows->pk_news_id; ?>">
              <h5><?php echo $rows->c_name; ?></h5>
              </a></div>
            <p><?php echo $rows->c_description; ?></p>
          </article>
        </div>
        <!-- end news --> 
      <?php endforeach; ?>   
      </div>
      <!-- paging -->
      <ul class="pagination">
        <li class="page-item active"><a href="#" class="page-link">Trang</a></li>
        <?php for($i = 1; $i<=$num_page;$i++): ?>
        <li class="page-item"><a href="index.php?controller=news_category&id=<?php echo $id ?>&p=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a></li>
        <?php endfor; ?>
      </ul>
      <!-- end paging -->