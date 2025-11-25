<?php

/*
    Interface ini digunakan sebagai kontrak untuk Model Balapan
    dalam arsitektur MVP (Model–View–Presenter).

    Interface ini menentukan metode-metode CRUD yang wajib
    diimplementasikan oleh Model Balapan, sehingga Presenter 
    dapat berinteraksi tanpa mengetahui detail implementasi Model.

    Dengan adanya kontrak ini:
    - Struktur kode konsisten
    - Model dan Presenter dapat dikerjakan secara terpisah
    - Menghindari ketergantungan langsung antara View dan Model
*/

interface KontrakBalapan
{
    // READ
    public function getAllBalapan(): array;
    public function getBalapanById($id): ?array;

    // CREATE
    public function addBalapan($namaBalapan, $lokasi, $tanggal): void;

    // UPDATE
    public function updateBalapan($id, $namaBalapan, $lokasi, $tanggal): void;

    // DELETE
    public function deleteBalapan($id): void;
}

?>
