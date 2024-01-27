<?php

namespace App\Controllers;

use App\Models\ArticleModel;
use App\Models\BeritaModel;
use App\Models\InformationModel;
use App\Models\MobilModel;
use App\Models\SliderModel;
use App\Models\TypeModel;

class Home extends BaseController
{
    protected $articleModel;
    protected $beritaModel;
    protected $informationModel;
    protected $mobilModel;
    protected $sliderModel;
    protected $typeModel;

    public function __construct()
    {
        $this->articleModel = new ArticleModel();
        $this->beritaModel = new BeritaModel();
        $this->informationModel = new InformationModel();
        $this->mobilModel = new MobilModel();
        $this->sliderModel = new SliderModel();
        $this->typeModel = new TypeModel();        
    }

    public function index(): string
    {
        // first slider
        $firstSlider = $this->sliderModel->first();
        $firstSliderId = $firstSlider['id'];

        // first berita
        $firstBerita = $this->beritaModel->first();
        $firstBeritaId = $firstBerita['id'];

        $data = [
            'title' => 'Home',
            'berita' => $this->beritaModel->findAll(),
            'mobil' => $this->mobilModel->findAll(),
            'slider' => $this->sliderModel->findAll(),
            'firstSliderId' => $firstSliderId,
            'firstBeritaId' => $firstBeritaId,
        ];

        // dd($data);
        return view('pages/home', $data);
    }

    public function mobil(): string
    {
        $data = [
            'title' => 'Mobil',
            'mobil' => $this->mobilModel->findAll(),
            'type' => $this->typeModel->findAll(),
            'information' => $this->informationModel->findAll(),
        ];
        return view('pages/daftarmobil', $data);
    }

    public function promo(): string
    {
        $data = [
            'title' => 'Promo',
            'mobil' => $this->mobilModel->findAll(),
            'type' => $this->typeModel->findAll(),
            'information' => $this->informationModel->findAll(),
        ];

        return view('pages/daftarhargapromo', $data);
    }

    public function article(): string
    {
        $data = [
            'title' => 'Article',
            'article' => $this->articleModel->findAll(),
        ];
        return view('pages/article', $data);
    }
    public function show($id)
    {
        $mobil = $this->mobilModel->find($id);
        $type = $this->typeModel->where('id_mobil', $id)->findAll();
        $information = $this->informationModel->where('id_mobil', $id)->findAll();


        $data = [
            'title' => 'Mobil',
            'mobil' => $mobil,
            'type' => $type,
            'information' => $information,
        ];

        return view('admin/mobil/detail', $data);
    }

    public function detailarticle($id)
    {
        $article = $this->articleModel->find($id);

        $data = [
            'article' => $article,
        ];

        return view('pages/detailarticle', $data);
    }

    public function kontak(): string
    {
        return view('pages/contact');
    }

    public function tentang(): string
    {
        return view('pages/tentang');
    }
}
