<?php
function loadImg($maxFileSize, $validFiletypes, $uploadPath, $nameElem) {
    $error = "";
    $newName = "";

    if ($_FILES[$nameElem]) {
        $file = $_FILES[$nameElem];
        if (!empty($file['error'])) {
            $error = "Произошла ошибка загрузки данных...";
        } else if ($file['size'] > $maxFileSize) {
            $error = "Размер изображения слишком велик...";
        } else {
            $type = mime_content_type($file['tmp_name']);
            $name = pathinfo($file['name'], PATHINFO_FILENAME) . '_' . time();
            $ext = pathinfo($file["name"], PATHINFO_EXTENSION);
            $newName = "$name.$ext";

            if (in_array($type, $validFiletypes)) {
                if (!move_uploaded_file($file['tmp_name'], $uploadPath . $newName)) {
                    $error = "Не удалось загрузить изображение...";
                }
            } else {
                $error = "Расширение файла должно быть таким: jpg, jpeg или png";
            }
        };

        if (!empty($error)) {
            $error = $file['name'] . '_' . $error;
        }
    }
    return [$error, $newName];
}

//function deleteImg($file){
// $error = "";
// if(!unlink($file)) {
// $error = "Ошибка удаления файла";
// }
// return $error;
//}

function deleteImg($file){
    if(is_file($file)) {
        unlink($file);
    }
}

//function updatePost($file){
// $error = "";
// if(!unlink($file)) {
// $error = "Ошибка изменения данных";
// }
// return $error;
//}/}