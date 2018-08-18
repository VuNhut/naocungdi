<div class="col-lg-4 col-sm-6 float-xs-left">
    <div class="one-project moveTop-500 duration-1000 hidden">
        <a href="<?php the_permalink(); ?>">
            <div class="img-done">
                <?php the_post_thumbnail(); ?>
                <div class="project-done">
                    <p class="text-done">Dự án đã hoàn thành</p>
                    <p class="icon-done"><i class="far fa-check-circle fa-3x"></i></p>
                </div>
            </div>
            <div class="info-project">
                    <h3 class="name-project"><?php the_title(); ?></h3>
                    <?php if(in_category('can-ho')) : ?>
                    <p class="location-project"><i class="fas fa-map-marker-alt"></i> <?php rwmb_the_value('vi-tri'); ?></p>
                    <p>
                    <span class="area-project" data-toggle="tooltip" title="Số block căn hộ"><i class="fas fa-cubes"></i> Số block: <span class="value"><?php rwmb_the_value('so-block'); ?></span></span>
                        <span class="progress-project" data-toggle="tooltip" title="Tiến độ xây dựng"><i class="fas fa-spinner"></i> Tiến độ: <span class="value"><?php rwmb_the_value('tien-do-xay-dung'); ?></span></span>
                    </p>
                    <p>
                        <span class="floor-project" data-toggle="tooltip" title="Số tầng mỗi block"><i class="far fa-building"></i> Số tầng: <span class="value"><?php rwmb_the_value('so-tang'); ?></span></span>
                        <span class="aparment-project" data-toggle="tooltip" title="Tổng số căn hộ"><i class="fas fa-home"></i> Tổng số căn hộ: <span class="value"><?php rwmb_the_value('so-can-ho'); ?></span></span>
                    </p>
                    <div class="clearfix"></div>
                    <?php endif; ?>
                    <?php if(in_category('khu-dan-cu')) : ?>
                    <p class="location-project"><i class="fas fa-map-marker-alt"></i> <?php rwmb_the_value('vi-tri'); ?></p>
                    <p>
                        <span class="area-project" data-toggle="tooltip" title="Tổng diện tích của dự án"><i class="fas fa-cubes"></i> Diện tích: <span class="value"><?php rwmb_the_value('dien-tich-du-an'); ?></span></span>
                        <span class="progress-project" data-toggle="tooltip" title="Tiến độ xây dựng"><i class="fas fa-spinner"></i> Tiến độ: <span class="value"><?php rwmb_the_value('tien-do-xay-dung'); ?></span></span>
                    </p>
                    <p class="investment-project" data-toggle="tooltip" title="Tổng vốn đầu tư dự án"><i class="far fa-money-bill-alt"></i> Vốn đầu tư: <span class="value"><?php rwmb_the_value('von-dau-tu'); ?></span></p>
                    <div class="clearfix"></div>
                    <?php endif; ?>
            </div>
        </a>
    </div>
</div>