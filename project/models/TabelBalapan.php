<?php

include_once("models/DB.php");
include_once("KontrakBalapan.php");

class TabelBalapan extends DB implements KontrakBalapan {

    public function __construct($host, $db_name, $username, $password) {
        parent::__construct($host, $db_name, $username, $password);
    }

    public function getAllBalapan(): array {
        // Kalau mau yang baru di BAWAH → pakai ASC
        $query = "SELECT * FROM balapan ORDER BY tanggal ASC";
        $this->executeQuery($query);
        return $this->getAllResult();
    }

    public function getBalapanById($id): ?array {
        $query = "SELECT * FROM balapan WHERE id = :id";
        $this->executeQuery($query, ['id' => $id]);
        $result = $this->getAllResult();
        return $result[0] ?? null;
    }

    public function addBalapan($namaBalapan, $lokasi, $tanggal): void {
        $query = "
            INSERT INTO balapan (namaBalapan, lokasi, tanggal)
            VALUES (:namaBalapan, :lokasi, :tanggal)
        ";
        $params = [
            'namaBalapan' => $namaBalapan,
            'lokasi' => $lokasi,
            'tanggal' => $tanggal
        ];
        $this->executeQuery($query, $params);
    }

    public function updateBalapan($id, $namaBalapan, $lokasi, $tanggal): void {
        $query = "
            UPDATE balapan
            SET namaBalapan = :namaBalapan,
                lokasi = :lokasi,
                tanggal = :tanggal
            WHERE id = :id
        ";
        $params = [
            'id' => $id,
            'namaBalapan' => $namaBalapan,
            'lokasi' => $lokasi,
            'tanggal' => $tanggal
        ];
        $this->executeQuery($query, $params);
    }

    public function deleteBalapan($id): void {
        $query = "DELETE FROM balapan WHERE id = :id";
        $this->executeQuery($query, ['id' => $id]);
    }
}

?>
