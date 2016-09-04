<?php

namespace App\Http\Controllers;

use Humweb\Html\Facades\AdminMenu;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    protected $layout = 'layouts.admin';
    protected $menu;

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->currentUser = Auth::user();
        $this->menu = AdminMenu::getFacadeRoot();

        $this->crumb('Admin', '/');
        view()->share('admin_menu', $this->menu->render());
    }
}
