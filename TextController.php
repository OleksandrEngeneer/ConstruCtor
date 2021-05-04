<?php
$target_dir = __DIR__ . '/../../storege/files/';
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if (isset($_POST["submit"])) {
    $check = filesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        $up_info = "File is an txt/docx - " . $_FILES["fileToUpload"]["name"] . ".";
        $uploadOk = 1;
        $display_table = 'inline-block';
    } else {
        $up_info = "File is not an txt/docx.";
        $uploadOk = 0;
        logs($up_info);
    }
}

if (file_exists($target_file)) {
    $up_info = "Sorry, file already exists.";
    $uploadOk = 0;
    logs($up_info);
}

if ($_FILES["fileToUpload"]["size"] > SIZE_MAX) {
    $up_info = "Sorry, your file is too large.";
    $uploadOk = 0;
    logs($up_info);
}

if ($fileType != "txt" && $fileType != "docx") {
    $up_info = "Sorry, only txt/docx file are allowed.";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    $up_info2 = "Sorry, your file was not uploaded.";
    logs($up_info2);
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $up_info2 = "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
        logs($up_info2);
    } else {
        $up_info2 = "Sorry, there was an error uploading your file.";
        logs($up_info2);
    }
}
//Завантажує вміст документу
$text = file_get_contents($target_file);
//Довжина тексту
$calcSymbols = strlen($text);
$calcSymbols_mb = mb_strlen($text);
//Кількість речень
$calcLetters = count(explode(".", $text));
//Кількість слів
$words_array = explode(" ", $text);
$calcWords = count($words_array);
//Кількість повторень cлів
foreach ($words_array as $key => $words) {
    $calcSameWords = 0;
    for ($i = 0; $i < count($words_array); $i++) {
        if (mb_strtolower($words) === mb_strtolower($words_array[$i])) {
            $calcSameWords += 1;
        };
    };
    if ($calcSameWords >= 2) {
        $listSameWords[$calcSameWords] = mb_strtoupper($words);
    };
};
rsort($listSameWords);
//Кількість повторень літер
$array_text = str_split($text);

for ($o = 0; $o < count($alphabet); $o++) {
    $calcSameLetetrs = 0;
    for ($j = 0; $j < count($array_text); $j++) {
        if ($alphabet[$o] == $array_text[$j]) {
            $calcSameLetetrs += 1;
        };
    };
    if ($calcSameLetetrs > 0) {
        //Один з варіантів. Не розроблено до кніця
        //$listSameLettes .= "Кількість повторів літери " . $alphabet[$i] . " в тексті : " . $calcSameLetetrs . " разів.\n";
        $listSameLettes[$alphabet[$o]] = $calcSameLetetrs;
    };
};
arsort($listSameLettes);
//Пошук паліндромів
for ($r = 0; $r < count($words_array); $r++) {
    if (strrev($words_array[$r]) === $words_array[$r]) {
        $palyndromes = "There are palyndroms: " . $words_array[$r] . "\n";
    };
};

for ($t = 0; $t < count($words_array); $t++) {
    $exists = true;
    for ($y = 0; $y < count($unique_words); $y++) {
        if (mb_strtolower($words_array[$t]) === mb_strtolower($unique_words[$y])) {
            $exists = false;
        };
    };
    if ($exists === true) {
        $unique_words[] = $words_array[$t];
    };
};
//print_r($unique_words);
