<?php 
    //liet ke cac danh muc co tin tuc
    $category = $this->model->get_all("select * from tbl_category_news where pk_category_news_id in (select fk_category_news_id from tbl_news where tbl_category_news.pk_category_news_id = tbl_news.fk_category_news_id) order by pk_category_news_id desc");
    foreach($category as $rows_category):
 ?>
<!-- list category -->
      <h5 class="box-main-title"><?php echo $rows_category->c_name; ?></h5>
      <div class="row"> 
      <?php 
          //lay mot ban ghi moi nhat thuoc danh muc nay trong tbl_news -> bai tin moi nhat
          $first_news = $this->model->get_a_record("select * from tbl_news where fk_category_news_id={$rows_category->pk_category_news_id} order by pk_news_id desc limit 0,1");
       ?>
        <!-- news -->
        <div class="col-md-6 col-sm-12">
          <article class="news">
            <figure> <img class="img-thumbnail" src="public/upload/news/<?php echo $first_news->c_img; ?>">
              <figcaption><a href="index.php?controller=news_detail&id=<?php echo $first_news->pk_news_id; ?>">
                <h6><?php echo $first_news->c_name; ?></h6>
                </a> </figcaption>
            </figure>
            <p><?php echo $first_news->c_description; ?></p>
          </article>
        </div>
        <!-- end news --> 
        <!-- news -->
        <div class="col-md-6 col-sm-12"> 
        <?php 
          //lay 4 tin tuc ke tiep (sau tin dau tien) thuoc danh muc nay
          $news = $this->model->get_all("select * from tbl_news where fk_category_news_id={$rows_category->pk_category_news_id} order by pk_news_id desc limit 1,4");
          foreach($news as $rows):
         ?> 
          <!-- other news -->
          <article class="news">
            <div class="row">
              <div class="col-md-4"><img class="img-thumbnail" src="public/upload/news/<?php echo $rows->c_img; ?>"></div>
              <div class="col-md-8 no-padding"><a href="index.php?controller=news_detail&id=<?php echo $rows->pk_news_id; ?>"><?php echo $rows->c_name; ?></a></div>
            </div>
            <div class="dotted"></div>
          </article>
          <!-- end other news --> 
          <?php endforeach; ?> 
        </div>
        <!-- end news --> 
      </div>
      <!-- end list category --> 
<?php endforeach; ?>      