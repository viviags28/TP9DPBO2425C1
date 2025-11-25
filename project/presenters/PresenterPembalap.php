<?php

include_once(__DIR__ . "/KontrakPresenter.php");
include_once(__DIR__ . "/../models/TabelPembalap.php");
include_once(__DIR__ . "/../models/Pembalap.php");
include_once(__DIR__ . "/../views/ViewPembalap.php");

class PresenterPembalap implements KontrakPresenter
{
    private $tabelPembalap;   // Model
    private $viewPembalap;    // View
    private $listPembalap = [];

    public function __construct($tabelPembalap, $viewPembalap)
    {
        $this->tabelPembalap = $tabelPembalap;    // FIX!
        $this->viewPembalap  = $viewPembalap;
        $this->initListPembalap();
    }

    public function initListPembalap()
    {
        $data = $this->tabelPembalap->getAllPembalap();

        $this->listPembalap = [];
        foreach ($data as $item) {
            $p = new Pembalap(
                $item['id'],
                $item['nama'],
                $item['tim'],
                $item['negara'],
                $item['poinMusim'],
                $item['jumlahMenang']
            );
            $this->listPembalap[] = $p;
        }
    }

    // READ
    public function tampilkanPembalap(): string
    {
        return $this->viewPembalap->tampilPembalap($this->listPembalap);
    }

    public function tampilkanFormPembalap($id = null): string
    {
        $data = null;
        if ($id !== null) {
            $data = $this->tabelPembalap->getPembalapById($id);
        }
        return $this->viewPembalap->tampilFormPembalap($data);
    }

    // CREATE
    public function tambahPembalap($nama, $tim, $negara, $poinMusim, $jumlahMenang): void
    {
        $this->tabelPembalap->addPembalap($nama, $tim, $negara, $poinMusim, $jumlahMenang);
        $this->initListPembalap();
    }

    // UPDATE
    public function ubahPembalap($id, $nama, $tim, $negara, $poinMusim, $jumlahMenang): void
    {
        $this->tabelPembalap->updatePembalap($id, $nama, $tim, $negara, $poinMusim, $jumlahMenang);
        $this->initListPembalap();
    }

    // DELETE
    public function hapusPembalap($id): void
    {
        $this->tabelPembalap->deletePembalap($id);
        $this->initListPembalap();
    }

    // Optional jika index memanggil tampilkan()
    public function tampilkan()
    {
        return $this->tampilkanPembalap();
    }
}

?>
