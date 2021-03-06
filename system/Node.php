<?php
restrictAccess();


use Baum\Node as BaumNode;
use Illuminate\Database\Eloquent;
use Helpers\Uri;

/**
 * Node
 *
 * Nested sets are appropiate when you want either an ordered tree (menus,
 * commercial categories, etc.) or an efficient way of querying big trees.
 */
class Node extends BaumNode
{

    public static function getNestedList($column, $key = null, $seperator = ' ')
    {
        $instance = new static;

        $key = $key ?: $instance->getKeyName();
        $depthColumn = $instance->getDepthColumnName();

//    $nodes = $instance->newNestedSetQuery()->get()->toArray();
        $nodes = $instance->newNestedSetQuery()->get()->getDictionary();

        return array_combine(
            array_map(
                function ($node) use ($key) {
                    return $node[$key];
                }, $nodes),
            array_map(
                function ($node) use ($seperator, $depthColumn, $column) {
                    return str_repeat($seperator, $node->$depthColumn) . $node->$column;
                }, $nodes)
        );
    }

    public static function getNode()
    {
        $instance = new static;

        $nodes = $instance->newNestedSetQuery();
        $nodes = $nodes->get();
        $nodes = $nodes->getDictionary();

        return $nodes;
    }

    /**
     * Возвращает иерархии категорий по уровню
     * @return mixed
     */
    public static function getCategoryNode()
    {
        $instance = new static;

        $nodes = $instance->newNestedSetQuery();
        $nodes = $nodes->where('lvl','<=',Setting::MAX_CATEGORY_LEVEL)->get();
        $nodes = $nodes->getDictionary();

        return $nodes;
    }

    public static function getArticleSortableNode()
    {
        $instance = new static;

        $nodes = $instance->newNestedSetQuery();
        $nodes = $nodes->get()->toHierarchy();
//        $nodes = $nodes->whereStatus(1)->get()->toHierarchy();
//echo '<pre>';
//print_r($nodes);
//die;
        $output = '<ol class="sortable ui-sortable">';
            $output .= static::renderArticleSortableNode($nodes);
        $output .= '</ol>';

        return $output;
    }

    public static function renderArticleSortableNode($nodes)
    {
        $output = '';
        if(isset($nodes)){
            foreach($nodes as $node){
                $output .= '<li class="' . ((!$node->status) ? 'invisible-item' : '') . '"id="node_' . $node->id . '">';

                    // Если status 0 то присвоить клаас чтобы не показавыть с активноми
                    $output .= '<div class="node-item"><a href=""></a>
                                    <span class="glyphicon glyphicon-move move" aria-hidden="true"></span>
                                    <a href="' . Helpers\Uri::makeUri("Admin/Articles/Edit").'/'.$node->id . App::URI_EXT . '">
                                        ' . $node->title . '
                                    </a>
                                    <div class="pull-right">
                                        <a href="' . Helpers\Uri::makeUri("Admin/Articles/Edit").'/'.$node->id . App::URI_EXT . '">
                                            <i class="glyphicon glyphicon-pencil" aria-hidden="true"></i>
                                        </a>
                                        <a class="remove-confirm" href="' . Helpers\Uri::makeUri("Admin/Articles/Delete").'/'.$node->id . App::URI_EXT . '">
                                            <i class="glyphicon glyphicon-remove-sign"></i>
                                        </a>
                                    </div>
                                </div>';

                    if($node->children->count() != 0) {
                        $output .= '<ol>';
                            $output .= static::renderArticleSortableNode($node->children);
                        $output .= '</ol>';
                    }

                $output .= '</li>';
            }
        }

        return $output;
    }

    public static function getMenuSortableNode()
    {
        $instance = new static;

        $nodes = $instance->newNestedSetQuery();
        $nodes = $nodes->get()->toHierarchy();
//        $nodes = $nodes->whereStatus(1)->get()->toHierarchy();
//echo '<pre>';
//print_r($nodes);
//die;
        $output = '<ol class="sortable ui-sortable">';
            $output .= static::renderMenuSortableNode($nodes);
        $output .= '</ol>';

        return $output;
    }

    public static function renderMenuSortableNode($nodes)
    {
        $output = '';
        if(isset($nodes)){
            foreach($nodes as $node){

                // Если 'status' 0 то присвоить клаас 'invisible-item' чтобы не показавыть с активноми
                $output .= '<li data-menu-id="'. $node->menu_id .'" class="menu-node-item ' . ((!$node->status) ? 'invisible-item' : '') . '"id="node_' . $node->id . '">';
                    $output .= '<div class="node-item"><a href=""></a>
                                    <span class="glyphicon glyphicon-move move" aria-hidden="true"></span>
                                    <a href="' . Helpers\Uri::makeUriFromId("Admin/Menus/Edit/".$node->id) . '">
                                        ' . __($node->text()) . '
                                    </a>
                                    <div class="pull-right">
                                        <a href="' . Helpers\Uri::makeUriFromId("Admin/Menus/Edit/".$node->id) . '">
                                            <i class="glyphicon glyphicon-pencil" aria-hidden="true"></i>
                                        </a>
                                        <a class="remove-confirm" href="' . Helpers\Uri::makeUriFromId("Admin/Menus/Delete/".$node->id) . '">
                                            <i class="glyphicon glyphicon-remove-sign"></i>
                                        </a>
                                    </div>
                                </div>';

                    if($node->children->count() != 0) {
                        $output .= '<ol>';
                            $output .= static::renderMenuSortableNode($node->children);
                        $output .= '</ol>';
                    }

                $output .= '</li>';
            }
        }

        return $output;
    }
}
