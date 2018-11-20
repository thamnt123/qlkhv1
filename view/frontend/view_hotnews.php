<h5 class="box-right-title">Tin nổi bật</h5>
        <div class="card" style="margin-top: 20px; height: 300px; margin-top:0px;">
          <div class="card-body">
            <marquee behavior="scroll" direction="up" onMouseOver="this.setAttribute('scrollamount', 0, 0);this.stop();" OnMouseOut="this.setAttribute('scrollamount', 2, 0);this.start();" height="250px" scrollamount="2">
            <ul class="hot-news" style="padding:0px; margin:0px; list-style: none;">
            <?php 
                $news = $this->model->get_all("select * from tbl_news where c_hotnews=1 order by pk_news_id desc");
                foreach($news as $rows):
             ?>
              <li><a href="index.php?controller=news_detail&id=<?php echo $rows->pk_news_id; ?>"><?php echo $rows->c_name; ?></a>
                <div class="dotted"></div>
              </li>
            <?php endforeach; ?>
            </ul>
            </marquee>
          </div>
        </div>