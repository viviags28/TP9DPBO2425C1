<?php

/*
    Interface ini mendefinisikan struktur dasar yang harus dimiliki oleh setiap Presenter
    untuk fitur BALAPAN dalam arsitektur MVP.

    Interface ini menentukan metode-metode yang wajib diimplementasikan 
    oleh Presenter Balapan, untuk memastikan View tidak langsung
    berhubungan dengan Model.
*/

interface KontrakPresenterBalapan
{
    // READ tabel balapan
    public function tampilkanBalapan(): string;

    // Form create + update
    public function tampilkanFormBalapan($id = null): string;

    // CRUD balapan
    public function tambahBalapan($namaBalapan, $lokasi, $tanggal): void;
    public function ubahBalapan($id, $namaBalapan, $lokasi, $tanggal): void;
    public function hapusBalapan($id): void;
}

?>
