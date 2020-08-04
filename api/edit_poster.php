<?php
include_once "../base.php";
// print_r($_POST);
foreach ($_POST['id'] as $key => $id) {
    if (!empty($_POST['del']) && in_array($id, $_POST['del'])) {
        $Poster->del($id);
    } else {
        $row = $Poster->find($id);
        $row['movie'] = $_POST['movie'][$key];
        $row['rank'] = $_POST['rank'][$key];
        $row['sh'] = (in_array($id, $_POST['sh'])) ? 1 : 0;
        $row['id'] = $id;
        $Poster->save($row);
    }
}
to("../admin.php?do=poster");
