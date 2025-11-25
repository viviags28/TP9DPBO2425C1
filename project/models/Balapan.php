<?php

class Balapan {

    private $id;
    private $namaBalapan;
    private $lokasi;
    private $tanggal;

    public function __construct($id, $namaBalapan, $lokasi, $tanggal){
        $this->id = $id;
        $this->namaBalapan = $namaBalapan;
        $this->lokasi = $lokasi;
        $this->tanggal = $tanggal;
    }

    // Getter
    public function getId(){
        return $this->id;
    }
    public function getNamaBalapan(){
        return $this->namaBalapan;
    }
    public function getLokasi(){
        return $this->lokasi;
    }
    public function getTanggal(){
        return $this->tanggal;
    }

    // Setter
    public function setNamaBalapan($namaBalapan){
        $this->namaBalapan = $namaBalapan;
    }
    public function setLokasi($lokasi){
        $this->lokasi = $lokasi;
    }
    public function setTanggal($tanggal){
        $this->tanggal = $tanggal;
    }
}
?>
