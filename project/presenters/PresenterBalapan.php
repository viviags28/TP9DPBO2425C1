<?php

include_once(__DIR__ . "/KontrakPresenterBalapan.php");
include_once(__DIR__ . "/../models/TabelBalapan.php");
include_once(__DIR__ . "/../models/Balapan.php");
include_once(__DIR__ . "/../views/ViewBalapan.php");

class PresenterBalapan implements KontrakPresenterBalapan
{
    private $tabelBalapan;   // model Balapan
    private $viewBalapan;    // view Balapan

    private $listBalapan = [];   // array objek Balapan

    public function __construct($tabelBalapan, $viewBalapan)
    {
        $this->tabelBalapan = $tabelBalapan;
        $this->viewBalapan = $viewBalapan;
        $this->initListBalapan();
    }

    // ambil semua data balapan dari DB
    public function initListBalapan()
    {
        $data = $this->tabelBalapan->getAllBalapan();

        $this->listBalapan = [];
        foreach ($data as $item) {
            $balapan = new Balapan(
                $item["id"],
                $item["namaBalapan"],
                $item["lokasi"],
                $item["tanggal"]
            );
            $this->listBalapan[] = $balapan;
        }
    }

    // READ
    public function tampilkanBalapan(): string
    {
        return $this->viewBalapan->tampilBalapan($this->listBalapan);
    }

    // CREATE / UPDATE (form)
    public function tampilkanFormBalapan($id = null): string
    {
        $data = null;
        if ($id !== null) {
            $data = $this->tabelBalapan->getBalapanById($id);
        }
        return $this->viewBalapan->tampilFormBalapan($data);
    }

    // CRUD

    // CREATE
    public function tambahBalapan($namaBalapan, $lokasi, $tanggal): void
    {
        $this->tabelBalapan->addBalapan($namaBalapan, $lokasi, $tanggal);
        $this->initListBalapan();   // refresh list
    }

    // UPDATE
    public function ubahBalapan($id, $namaBalapan, $lokasi, $tanggal): void
    {
        $this->tabelBalapan->updateBalapan($id, $namaBalapan, $lokasi, $tanggal);
        $this->initListBalapan();
    }

    // DELETE
    public function hapusBalapan($id): void
    {
        $this->tabelBalapan->deleteBalapan($id);
        $this->initListBalapan();
    }
}

?>
