<div class="col-lg-4 col-sm-6 float-xs-left">
    <div class="one-project moveTop-500 duration-1000 hidden">
        <a href="<?php the_permalink(); ?>">
            <div class="img-buiding">
                <?php the_post_thumbnail(); ?>
                <div class="project-buiding">
                    <p class="text-buiding">Dự án đang thực hiện</p>
                    <p class="icon-buiding"><i class="far fa-building fa-3x"></i></p>
                </div>
            </div>
            <div class="info-project">
                    <h3 class="name-project"><?php the_title(); ?></h3>
                    <p class="location-project"><i class="fas fa-map-marker-alt"></i> <?php rwmb_the_value('vi-tri'); ?></p>
                    <?php if(function_exists('the_ratings')) { the_ratings(); } ?>
                    <p class="investment-project" data-toggle="tooltip" title="Tổng chi phí chuyến du lịch"><i class="far fa-money-bill-alt"></i> Chi phí: <span class="value"><?php rwmb_the_value('chi-phi-du-lich'); ?><sup>đ</sup></span></p>
                    <div class="clearfix"></div>
            </div>
        </a>
    </div>
</div>