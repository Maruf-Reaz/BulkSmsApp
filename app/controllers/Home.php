<?php
/**
 * Created by PhpStorm.
 * User: Imran
 * Date: 8/15/2018
 * Time: 11:03 PM
 */
namespace App\Controllers;

use App\Libraries\Controller;

class Home extends Controller {

	public function __construct() {
		$this->middleware('Authentication')->except(['about']);
	}

	public function index() {
        if (isLoggedIn()) {
            //redirect('posts/index');
        }

        $data = ['title' => 'welcome'];
        $this->view('home/index', $data);
    }

    public function about() {
        $data = ['title' => 'welcome to about'];
        $this->view('home/about', $data);
    }

    public function notFound() {

        $this->view('home/404');
    }

    public function accessDenied() {

        $this->view('home/access_denied');
    }

    public function home() {
        $data = [];
        $this->view('layouts/index', $data);
    }
}
