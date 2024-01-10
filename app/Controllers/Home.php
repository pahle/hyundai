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
        return view('pages/daftarhargapromo');
    }

    public function kontak(): string
    {
        return view('pages/contact');
    }
}
