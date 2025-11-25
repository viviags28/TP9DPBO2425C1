<?php

include_once("models/DB.php");

/* ==== PEMBALAP ==== */
include_once("models/TabelPembalap.php");
include_once("views/ViewPembalap.php");
include_once("presenters/PresenterPembalap.php");

/* ==== BALAPAN ==== */
include_once("models/TabelBalapan.php");
include_once("views/ViewBalapan.php");
include_once("presenters/PresenterBalapan.php");

/* ==== Tentukan menu ==== */
/* FIX UTAMA DI SINI */
// Tentukan menu
$menu = $_GET['menu'] ?? ($_POST['menu'] ?? ($_GET['page'] ?? 'pembalap'));

/* ==== Buat Presenter sesuai menu ==== */
if ($menu === 'pembalap') {
    $model = new TabelPembalap('localhost', 'mvp_db', 'root', '');
    $view  = new ViewPembalap();
    $presenter = new PresenterPembalap($model, $view);

} elseif ($menu === 'balapan') {
    $model = new TabelBalapan('localhost', 'mvp_db', 'root', '');
    $view  = new ViewBalapan();
    $presenter = new PresenterBalapan($model, $view);
} else {
    die("Menu tidak dikenal");
}


/* ========================  GET SCREEN  ======================== */

if (isset($_GET['screen'])) {

    /* FORM TAMBAH */
    if ($_GET['screen'] == 'add') {

        if ($menu === 'pembalap') {
            echo $presenter->tampilkanFormPembalap();
        } else {
            echo $presenter->tampilkanFormBalapan();
        }
        exit;
    }

    /* FORM EDIT */
    if ($_GET['screen'] == 'edit' && isset($_GET['id'])) {

        if ($menu === 'pembalap') {
            echo $presenter->tampilkanFormPembalap($_GET['id']);
        } else {
            echo $presenter->tampilkanFormBalapan($_GET['id']);
        }
        exit;
    }

    /* HAPUS */
    if ($_GET['screen'] == 'delete' && isset($_GET['id'])) {

        if ($menu === 'pembalap') {
            $presenter->hapusPembalap($_GET['id']);
        } else {
            $presenter->hapusBalapan($_GET['id']);
        }

        header("Location: index.php?menu=$menu");
        exit;
    }
}

/* ========================  POST CRUD  ======================== */

if (isset($_POST['action'])) {

    // Pastikan menu pembalap hanya membaca field pembalap
    if ($menu === 'pembalap') {

        if ($_POST['action'] == 'add') {
            $presenter->tambahPembalap(
                $_POST['nama'] ?? '',
                $_POST['tim'] ?? '',
                $_POST['negara'] ?? '',
                $_POST['poinMusim'] ?? '',
                $_POST['jumlahMenang'] ?? ''
            );
        }

        if ($_POST['action'] == 'edit') {
            $presenter->ubahPembalap(
                $_POST['id'],
                $_POST['nama'] ?? '',
                $_POST['tim'] ?? '',
                $_POST['negara'] ?? '',
                $_POST['poinMusim'] ?? '',
                $_POST['jumlahMenang'] ?? ''
            );
        }

    }

    // Pastikan menu balapan hanya membaca field balapan
    elseif ($menu === 'balapan') {

        if ($_POST['action'] == 'add') {
            $presenter->tambahBalapan(
                $_POST['namaBalapan'] ?? '',
                $_POST['lokasi'] ?? '',
                $_POST['tanggal'] ?? ''
            );
        }

        if ($_POST['action'] == 'edit') {
            $presenter->ubahBalapan(
                $_POST['id'],
                $_POST['namaBalapan'] ?? '',
                $_POST['lokasi'] ?? '',
                $_POST['tanggal'] ?? ''
            );
        }
    }

    header("Location: index.php?menu=$menu");
    exit;
}


/* ========================  TAMPIL DEFAULT  ======================== */

if ($menu === 'pembalap') {
    echo $presenter->tampilkanPembalap();
} else {
    echo $presenter->tampilkanBalapan();
}

?>
