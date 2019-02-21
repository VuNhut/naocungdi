<?php if (in_category('cam-nang-du-lich')) : ?>
<div class="col-lg-4 col-sm-6">
    <div class="one-project">
        <a href="<?php the_permalink(); ?>">
            <div class="img-buiding">
                <?php the_post_thumbnail(); ?>
            </div>
            <div class="info-project">
                    <h3 class="name-project">
                        <?php the_title(); ?>
                        <?php
                            $score = get_post_meta(get_the_ID(), 'total-score', true);
                            if ($score >= 8) {
                                $bg_color = "#ed1a24";
                            } elseif ($score >= 6) {
                                $bg_color = "#26b6ef";
                            } elseif ($score >= 3) {
                                $bg_color = "#4dab2e";
                            } else {
                                $bg_color = "#384ff5";
                            }
                        ?>
                        <div class="info-score" style="background-color: <?php echo $bg_color; ?>">
                            <?php echo $score; ?>
                        </div>
                    </h3>
                    <p class="location-project"><i class="fas fa-map-marker-alt"></i> <?php rwmb_the_value('vi-tri'); ?></p>
                    <?php if(function_exists('the_ratings')) { the_ratings(); } ?>
                    <?php
                        if (in_category('dia-chi-an-uong')) {
                            $type_value = array('Mức giá trung bình', 'Mức giá');
                        } elseif (in_category('khach-san-homestay')) {
                            $type_value = array('Giá phòng tham khảo', 'Giá phòng');
                        } elseif (in_category('dia-diem-du-lich')) {
                            $type_value = array('Chi phí tham quan điểm du lịch', 'Giá vé');
                        } elseif (in_category('kinh-nghiem-du-lich')) {
                            $type_value = array('Tổng chi phí chuyến du lịch', 'Chi phí');
                        }
                    ?>
                    <?php if (rwmb_meta('chi-phi-du-lich') != "") : ?>
                    <p class="investment-project" data-toggle="tooltip" title="<?php echo $type_value[0]; ?>"><i class="far fa-money-bill-alt"></i> <?php echo $type_value[1]; ?>: <span class="value"><?php rwmb_the_value('chi-phi-du-lich'); if (rwmb_meta('chi-phi-du-lich') != "Miễn phí") { echo '<sup>đ</sup>'; } ?></span></p>
                    <?php else : ?>
                    <p class="investment-project" data-toggle="tooltip" title="<?php echo $type_value[0]; ?>"><i class="far fa-money-bill-alt"></i> <?php echo $type_value[1]; ?>: <span class="value">chưa cập nhật</span></p>
                    <?php endif; ?>
                    <div class="clearfix"></div>
            </div>
        </a>
    </div>
</div>
<?php else : ?>
<div class="col-lg-4 col-sm-6">
    <div class="one-project">
        <a href="<?php the_permalink(); ?>">
            <div class="img-buiding">
                <?php the_post_thumbnail(); ?>
            </div>
            <div class="info-project">
                    <h3 class="name-project title-search">
                        <?php the_title(); ?>
                    </h3>
            </div>
        </a>
    </div>
</div>
<?php endif; ?>