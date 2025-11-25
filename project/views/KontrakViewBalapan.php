<?php

interface KontrakViewBalapan
{
    // Menampilkan tabel/list seluruh balapan
    public function tampilBalapan($listBalapan): string;

    // Menampilkan form tambah/ubah balapan
    public function tampilFormBalapan($data = null): string;

    // Opsional: kalau kamu butuh halaman detail balapan
    // public function tampilDetailBalapan($data): string;
}

?>
