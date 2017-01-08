<?php
namespace Humweb\Categories\Http\Controllers;

use App\Http\Controllers\Controller;
use Humweb\Categories\Category;
use Humweb\Categories\CategoryItem;
use Humweb\Categories\CategoryItemRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Quản lý category
     *
     * @var \Humweb\Categories\Category
     */
    protected $manager;
    protected $request;


    public function __construct(Request $request)
    {
        $this->request = $request;
        //        parent::__construct();
        //        CategoryItem::create(array('id' => 1, 'slug'=> 'root-1', 'title' => 'Root 1'   , 'lft' => 1  , 'rgt' => 10 , 'depth' => 0));
        //        CategoryItem::create(array('id' => 2, 'slug'=> 'child-1', 'title' => 'Child 1'  , 'lft' => 2  , 'rgt' => 3  , 'depth' => 1, 'parent_id' => 1));
        //        CategoryItem::create(array('id' => 3, 'slug'=> 'child-2', 'title' => 'Child 2'  , 'lft' => 4  , 'rgt' => 7  , 'depth' => 1, 'parent_id' => 1));
        //        CategoryItem::create(array('id' => 4, 'slug'=> 'child-2-1', 'title' => 'Child 2.1', 'lft' => 5  , 'rgt' => 6  , 'depth' => 2, 'parent_id' => 3));
        //        CategoryItem::create(array('id' => 5, 'slug'=> 'child-3', 'title' => 'Child 3'  , 'lft' => 8  , 'rgt' => 9  , 'depth' => 1, 'parent_id' => 1));
        //        CategoryItem::create(array('id' => 6, 'slug'=> 'root-2', 'title' => 'Root 2'   , 'lft' => 11 , 'rgt' => 12 , 'depth' => 0));

    }


    /**
     * @param string|null $type
     *
     * @return \Illuminate\View\View
     */
    public function index($type = null)
    {
        //        if ($type) {
        //            $this->manager->switchType($type);
        //        }
        //        $max_depth = $this->manager->max_depth;
        //        $nestable  = $this->manager->nestable();
        //        $types     = $this->manager->types;
        //        $current   = $this->manager->root->slug;
        // $this->buildHeading([trans('category.common.manage'), "[{$types[$current]}]"], 'fa-sitemap', ['#' => trans('category.common.category')]);

        /** @var Baum\Node */
        $root = CategoryItem::find(1);

        //CategoryItem::rebuild(true);
        $tree = ! is_null($root) ? $root->getDescendantsAndSelf()->toHierarchy() : [];

        $tree = $this->toNestable($tree, 5);

        //        dd($tree);
        return view('categories.index', compact('tree'));
    }


    /**
     * @param \Baum\Node $node
     * @param int        $max_depth
     *
     * @return string
     */
    protected function renderNode($node, $max_depth)
    {
        $children_html = '';
        if ( ! $node->isLeaf()) {
            $children_html = '\n<ol class="dd-list dd3-list">\n';
            foreach ($node->children as $child) {
                $children_html .= $this->renderNode($child, $max_depth);
            }
            $children_html .= "</ol>\n";
        }

        return '<li class="dd-item dd3-item nested-list-item" data-id="'.$node->id.'">'.'<div class="dd-handle dd3-handle">Handle</div>'.'<div class="dd3-content">'.$node->title.'<div class="actions nested-list-actions pull-right">'.'<ul class="list-inline">'.'<li><a href="#"><i class="fa fa-plus"></i></a></li>'.'<li><a href="#"><i class="fa fa-pencil"></i></a></li>'.'<li><a href="#"><i class="fa fa-trash"></i></a></li>'.'</ul></div></div>'.$children_html.'</li>';
    }


    /**
     * Render nested list
     *
     * @param \Illuminate\Database\Eloquent\Collection|array $roots
     * @param int                                            $max_depth
     *
     * @return string
     */
    protected function toNestable($roots, $max_depth)
    {
        $html = '';
        foreach ($roots as $node) {
            $html .= $this->renderNode($node, $max_depth)."\n";
        }

        return $html ? "\n<ol class=\"dd-list dd3-list\">\n$html</ol>\n" : null;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return $this->_create();
    }


    /**
     * Show the form for creating a new resource.
     *
     * @param \Humweb\Categories\CategoryItem $category
     *
     * @return \Illuminate\View\View
     */
    public function createChildOf(CategoryItem $category)
    {
        return $this->_create($category);
    }
    // B 8 l I 1 0 O
    /**
     * @param null|\Humweb\Categories\CategoryItem $parent
     *
     * @return \Illuminate\View\View
     */
    protected function _create($parent = null)
    {
        if ($parent) {
            $parent_title = $parent->title;
            $url          = route('backend.category.storeChildOf', ['category' => $parent->id]);
        } else {
            $parent_title = '- ROOT -';
            $url          = route('backend.category.store');
        }
        $category = new CategoryItem();
        $method   = 'post';

        return view('categories.form', compact('parent_title', 'url', 'method', 'category'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Humweb\Categories\CategoryItemRequest $request
     *
     * @return \Illuminate\View\View
     */
    public function store(CategoryItemRequest $request)
    {
        return $this->_store($request);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Humweb\Categories\CategoryItemRequest $request
     * @param \Humweb\Categories\CategoryItem        $category
     *
     * @return \Illuminate\View\View
     */
    public function storeChildOf(CategoryItemRequest $request, CategoryItem $category)
    {
        return $this->_store($request, $category);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Humweb\Categories\CategoryItemRequest $request
     * @param null|\Humweb\Categories\CategoryItem   $parent
     *
     * @return \Illuminate\View\View
     */
    public function _store($request, $parent = null)
    {
        $category = new CategoryItem();
        $category->fill($request->all());
        $category->save();
        if ($parent) {
            $category->makeChildOf($parent);
        } else {
            $category->makeChildOf(CategoryItem::find(0));
        }

        return redirect('/backend/category')->with('success', 'Created category.');
    }


    /**
     * Display the specified resource.
     *
     * @param \Humweb\Categories\CategoryItem $category
     *
     * @return \Illuminate\View\View
     */
    public function show(CategoryItem $category)
    {
        return view('categories.show', compact('category'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param \Humweb\Categories\CategoryItem $category
     *
     * @return \Illuminate\View\View
     */
    public function edit(CategoryItem $category)
    {
        $parent_title = $category->isRoot() ? '- ROOT -' : $category->parent->title;
        $url          = route('backend.category.update', ['category' => $category->id]);
        $method       = 'put';

        return view('categories.form', compact('parent_title', 'url', 'method', 'category'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Humweb\Categories\CategoryItemRequest $request
     * @param \Humweb\Categories\CategoryItem        $category
     *
     * @return \Illuminate\View\View
     */
    public function update(CategoryItemRequest $request, CategoryItem $category)
    {
        $category->fill($request->all());
        $category->save();

        return view('_modal_script', [
            'message'    => [
                'type'    => 'success',
                'content' => trans('common.update_object_success', ['name' => trans('category.common.item')])
            ],
            'reloadPage' => true,
        ]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param \Humweb\Categories\CategoryItem $category
     *
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function destroy(CategoryItem $category)
    {
        $category->delete();

        return response()->json([
            'type'    => 'success',
            'content' => trans('common.delete_object_success', ['name' => trans('category.common.category')]),
        ]);
    }


    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Laracasts\Presenter\Exceptions\PresenterException
     */
    public function data()
    {
        return response()->json(['html' => $this->manager->nestable()]);
    }


    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function move()
    {
        $category = $this->getNode('element');

        if (is_null($category)) {
            return $this->dieAjax();
        }

        switch (true) {
            case $leftNode = $this->getNode('left'):
                $category->moveToRightOf($leftNode);
                break;
            case $rightNode = $this->getNode('right'):
                $category->moveToLeftOf($rightNode);
                break;
            case $destNode = $this->getNode('parent'):
                $category->makeChildOf($destNode);
                break;
            default:
                return $this->dieAjax();
        }

        return response()->json([
            'type'    => 'success',
            'content' => 'Updated Item.',
        ]);
    }


    /**
     * @param \Illuminate\Http\Request $request
     * @param string                   $name
     *
     * @return \Humweb\Categories\CategoryItem|null
     */
    protected function getNode($name)
    {

        if ($id = $this->request->get($name)) {
            return CategoryItem::find($id);
        } else {
            return null;
        }
    }


    /**
     * Kết thúc App, trả về message dạng JSON
     *
     * @return mixed
     */
    protected function dieAjax()
    {
        return die(json_encode([
            'type'    => 'error',
            'content' => trans('category.common.not_found')
        ]));
    }
}
