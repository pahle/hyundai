<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SliderModel;
use App\Models\MobilModel;
use App\Models\BeritaModel;
use App\Models\ArticleModel;

class Admin extends BaseController
{
    protected $sliderModel;
    protected $mobilModel;
    protected $beritaModel;
    protected $articleModel;

    public function __construct()
    {
        $this->sliderModel = new SliderModel();
        $this->mobilModel = new MobilModel();
        $this->beritaModel = new BeritaModel();
        $this->articleModel = new ArticleModel();
    }

    public function index()
    {
        $slider = $this->sliderModel->countAll();
        $mobil = $this->mobilModel->countAll();
        $berita = $this->beritaModel->countAll();
        $article = $this->articleModel->countAll();

        $data = [
            'title' => 'Hyundai',
            'slider' => $slider,
            'mobil' => $mobil,
            'berita' => $berita,
            'article' => $article,
        ];

        return view('admin/index', $data);

    }
}
