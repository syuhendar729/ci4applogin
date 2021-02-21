<?php

namespace App\Controllers;

use App\Models\AnimeModel;

class Anime extends BaseController
{
    protected $animeModel;

    # =================================================================
    public function __construct()
    {
        $this->animeModel = new AnimeModel();
    }

    # =================================================================
    public function index()
    {
        $data = [
            'title' => 'Daftar Anime | MyWebsite',
            'anime' => $this->animeModel->getAnime(),
        ];

        return view('anime/index', $data);
    }

    # =================================================================
    public function detail($slug)
    {

        $data = [
            'title' => 'Detail Anime | MyWebsite',
            'anime' => $this->animeModel->getAnime($slug),
        ];

        if (empty($data['anime'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Anime : $slug tidak ditemukan!");
        }

        return view('anime/detail', $data);
    }

    # =================================================================
    public function create()
    {
        $data = [
            'title'      => 'Tambah Data | MyWebsite',
            'validation' => \Config\Services::validation(),
        ];

        return view('anime/create', $data);
    }

    # =================================================================
    public function save()
    {
        $judul = $this->request->getVar('judul');

        if (!$this->validate([
            'judul'    => 'required|is_unique[anime.judul]',
            'rating'   => 'required|numeric',
            'genre'    => 'required',
            'sinopsis' => 'required|max_length[10240]',
            'image'    => [
                'rules'  => 'mime_in[image,image/png,image/jpg,image/jpeg]|is_image[image]|max_size[image,4096]',
                'errors' => [
                    'mime_in'  => 'This is not a image',
                    'is_image' => 'This is not a image',
                    'max_size' => 'Max size image 4 Mb',
                ],
            ],

        ])) {
            return redirect()->to('/anime/create')->withInput();
        }

        $fileImage = $this->request->getFile('image');

        if ($fileImage->getError() == 4) {
            $namaImage = 'anime.png';
        } else {
            $fileImage->move('img');
            $namaImage = $fileImage->getName();
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->animeModel->save([
            'judul'    => htmlspecialchars($judul),
            'slug'     => htmlspecialchars($slug),
            'rating'   => htmlspecialchars($this->request->getVar('rating')),
            'genre'    => htmlspecialchars($this->request->getVar('genre')),
            'sinopsis' => htmlspecialchars($this->request->getVar('sinopsis')),
            'image'    => $namaImage,
        ]);

        session()->setFlashData('pesan', 'Anime <b>' . $judul . '</b> successfully <b>created!</b>');
        session()->setFlashData('alert', 'success');
        return redirect()->to('/anime');
    }

    # =================================================================
    public function delete($id)
    {
        $anime = $this->animeModel->find($id);
        if ($anime['image'] != 'anime.png') {
            unlink('img/' . $anime['image']);
        }

        $this->animeModel->delete($id);
        // session()->setFlashData('pesan', 'Data has been <b>deleted!</b>');
        session()->setFlashData('pesan', 'Anime <b>' . $anime['judul'] . '</b> has been <b>deleted!</b>');
        session()->setFlashData('alert', 'danger');
        return redirect()->to('/anime');
    }

    # =================================================================
    public function edit($slug)
    {
        $data = [
            'title'      => 'Edit Data | MyWebsite',
            'validation' => \Config\Services::validation(),
            'anime'      => $this->animeModel->getAnime($slug),
        ];

        return view("anime/edit", $data);
    }

    # =================================================================
    public function update($id)
    {
        $judulBaru = $this->request->getVar('judul');
        $anime     = $this->animeModel->getAnimeById($id);

        if ($judulBaru == $anime['judul']) {
            $rule_judul = 'required';
        } else {
            $rule_judul = 'required|is_unique[anime.judul]';
        }

        if (!$this->validate([
            'judul'    => $rule_judul,
            'rating'   => 'required|numeric',
            'genre'    => 'required',
            'sinopsis' => 'required|max_length[10240]|htmlspecialchars',
            'image'    => [
                'rules'  => 'mime_in[image,image/png,image/jpg,image/jpeg]|is_image[image]|max_size[image,4096]',
                'errors' => [
                    'mime_in'  => 'This is not a image',
                    'is_image' => 'This is not a image',
                    'max_size' => 'Max size image 4 Mb',
                ],
            ],

        ])) {
            return redirect()->to('/anime/edit/' . $anime['slug'])->withInput();
        }

        $fileImage = $this->request->getFile('image');
        $imageLama = $this->request->getVar('imageLama');
        if ($fileImage->getError() == 4) {
            $namaImage = $imageLama;
        } else {
            if ($imageLama != 'anime.png') {
                unlink('img/' . $imageLama);
            }
            $fileImage->move('img');
            $namaImage = $fileImage->getName();
        }

        $slugBaru = url_title($this->request->getVar('judul'), '-', true);
        $this->animeModel->save([
            'id'       => $id,
            'judul'    => htmlspecialchars($judulBaru),
            'slug'     => htmlspecialchars_decode($slugBaru),
            'rating'   => htmlspecialchars($this->request->getVar('rating')),
            'genre'    => htmlspecialchars($this->request->getVar('genre')),
            'sinopsis' => htmlspecialchars($this->request->getVar('sinopsis')),
            'image'    => $namaImage,
        ]);

        session()->setFlashData('pesan', 'Anime <b>' . $anime['judul'] . '</b> successfully <b>edited!</b>');
        session()->setFlashData('alert', 'warning');
        return redirect()->to('/anime');
    }
}
