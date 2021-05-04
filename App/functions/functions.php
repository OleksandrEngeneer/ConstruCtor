<?php
function logs($up_info)
{
    $filename = __DIR__ . '/../../storege/logs/log.log';
    $data = $up_info;
    $today = date("F j, Y, g:i a");
    $str = $data . ';' . $today;
    $f = fopen($filename, "a+");
    fwrite($f, $str . PHP_EOL);
    fclose($f);
};
function noticeErrors()
{
    if ($last_error = error_get_last()) {
        $type_error = implode(" ", $last_error);
        $filename = __DIR__ . '/../../storege/logs/log.log';
        $f = fopen($filename, "a+");
        fwrite($f, $type_error . PHP_EOL);
        fclose($f);
    };
};
