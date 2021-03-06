<?php
/**
 * Created by PhpStorm.
 * User: Arsen
 * Date: 11/6/2015
 * Time: 3:20 PM
 *
 * @var $items array
 * @var $item \Football\Tournaments\Types\DoubleRoundRobin
 */

use Helpers\Uri;
use Football\Tournaments\Tournament;
?>

<div class="widget widget-with-tabs">
    <div class="widget-header">
        <div class="widget-tabs">

            <? foreach ($items as $key => $item): ?>
                <div class="tab-<?= ++$key ?> <?= ($key == 1) ? ' active' : ''?>"><div>
                        <span><?= __($item->getName()) ?></span>
                    </div>
                </div>
            <? endforeach ?>

        </div>
    </div>
    <div class="widget-body">
        <div class="widget-tabs-body">

            <? foreach ($items as $key => $item): ?>
                <div class="tab-<?= ++$key ?> <?= ($key == 1) ? ' active' : ''?>">

                    <?= $item->renderBasicWidget()?>
                    <span class="tournament-link">
                        <a href="<?= Uri::makeUriFromId(Tournament::getUriBySlug($item->getSlug())) ?>"><?= __('Games Schedule') ?></a>
                    </span>
                </div>
            <? endforeach ?>

        </div>
    </div>
    <div class="widget-footer">
        <div class="widget-pagination">
            <div class="owl-controls clickable">
                <div class="owl-pagination">

                    <? foreach ($items as $item): ?>
                        <div class="owl-page circle">
                            <span class=""></span>
                        </div>
                    <? endforeach ?>

                </div>
            </div>
        </div>
    </div>
</div>