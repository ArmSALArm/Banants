<?php
/**
 * Created by PhpStorm.
 * User: Arsen
 * Date: 11/6/2015
 * Time: 3:20 PM
 */

use \Helpers\Uri;
use Ivliev\Imagefly\Imagefly;

?>

<div class="academy-anons">
    <a href="<?=Uri::makeUriFromId('academy_squads')?>" title="slideshow_image" rel="gallary">
        <img src="<?=Imagefly::imagePath('/uploads/images/academy/Image-2017-04-05.jpg', 'w445-h346-c-q60')?>" alt="container_top_slideshow_images" />
        <div class="container_top_slider_text">
            <div class="container_top_slider_text_inner">
                <?= __('Academy') ?>
                <br>
            </div>
        </div>
    </a>
</div>