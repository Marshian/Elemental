<?php
namespace Humweb\Categories;

use Laracasts\Presenter\PresentableTrait;
use Baum\Node;

/**
 * App\CategoryItem
 *
 * @property integer $id
 * @property integer $parent_id
 * @property integer $lft
 * @property integer $rgt
 * @property integer $depth
 * @property string $title
 * @property string $slug
 * @property-read \Humweb\Categories\CategoryItem $parent
 * @property-read \Illuminate\Database\Eloquent\Collection|\Humweb\Categories\CategoryItem[] $children
 * @method static \Illuminate\Database\Query\Builder|\Humweb\Categories\CategoryItem whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Humweb\Categories\CategoryItem whereParentId($value)
 * @method static \Illuminate\Database\Query\Builder|\Humweb\Categories\CategoryItem whereLft($value)
 * @method static \Illuminate\Database\Query\Builder|\Humweb\Categories\CategoryItem whereRgt($value)
 * @method static \Illuminate\Database\Query\Builder|\Humweb\Categories\CategoryItem whereDepth($value)
 * @method static \Illuminate\Database\Query\Builder|\Humweb\Categories\CategoryItem whereLabel($value)
 * @method static \Illuminate\Database\Query\Builder|\Humweb\Categories\CategoryItem whereType($value)
 * @method static \Illuminate\Database\Query\Builder|\Humweb\Categories\CategoryItem whereParams($value)
 * @method static \Illuminate\Database\Query\Builder|\Baum\Node withoutNode($node)
 * @method static \Illuminate\Database\Query\Builder|\Baum\Node withoutSelf()
 * @method static \Illuminate\Database\Query\Builder|\Baum\Node withoutRoot()
 * @method static \Illuminate\Database\Query\Builder|\Baum\Node limitDepth($limit)
 */
class CategoryItem extends Node
{
    protected $table = 'categories';
    protected $fillable = ['title', 'slug'];
    public $timestamps = false;
}
