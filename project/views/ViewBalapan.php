<?php

include_once("KontrakViewBalapan.php");
include_once("models/Balapan.php");

class ViewBalapan implements KontrakViewBalapan {

    public function tampilBalapan($listBalapan): string {

        $tbody = "";
        $no = 1;

        foreach ($listBalapan as $b) {
            $tbody .= "
                <tr>
                    <td class='col-id'>{$no}</td>
                    <td>" . htmlspecialchars($b->getNamaBalapan()) . "</td>
                    <td>" . htmlspecialchars($b->getLokasi()) . "</td>
                    <td>" . htmlspecialchars($b->getTanggal()) . "</td>

                    <td class='col-actions'>
                        <a href='index.php?menu=balapan&screen=edit&id=" . $b->getId() . "' class='btn-edit'>Edit</a>
                        <a href='index.php?menu=balapan&screen=delete&id=" . $b->getId() . "' class='btn-delete'>Hapus</a>
                    </td>
                </tr>
            ";
            $no++;
        }

        $templatePath = __DIR__ . '/../template/skinbalapan.html';

        if (file_exists($templatePath)) {
            $template = file_get_contents($templatePath);
            $template = str_replace('<!-- PHP will inject rows here -->', $tbody, $template);
            $template = str_replace('Total:', 'Total: ' . count($listBalapan), $template);
            return $template;
        }

        return $tbody;
    }

   public function tampilFormBalapan($data = null): string {

    $template = file_get_contents(__DIR__ . '/../template/formbalapan.html');

    if ($data) {
        // mode edit
        $template = str_replace('{{action}}', 'edit', $template);
        $template = str_replace('{{id}}', $data['id'], $template);
        $template = str_replace('{{namaBalapan}}', $data['namaBalapan'], $template);
        $template = str_replace('{{lokasi}}', $data['lokasi'], $template);
        $template = str_replace('{{tanggal}}', $data['tanggal'], $template);
    } else {
        // mode add
        $template = str_replace('{{action}}', 'add', $template);
        $template = str_replace('{{id}}', '', $template);
        $template = str_replace('{{namaBalapan}}', '', $template);
        $template = str_replace('{{lokasi}}', '', $template);
        $template = str_replace('{{tanggal}}', '', $template);
    }

    return $template;
}

}

?>
