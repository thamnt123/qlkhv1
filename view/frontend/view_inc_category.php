<h5 class="box-right-title">Danh mục</h5>
        <div class="card">
          <ul class="list-group list-group-flush category-box">
        <?php 
        	$category = $this->model->get_all("select * from tbl_category_news order by pk_category_news_id desc");
        	foreach($category as $rows):
         ?>
            <li class="list-group-item"><a href="index.php?controller=news_category&id=<?php echo $rows->pk_category_news_id; ?>"><?php echo $rows->c_name; ?></a></li>
        <?php endforeach; ?>
          </ul>
        </div>