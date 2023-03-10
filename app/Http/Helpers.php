<?php

function jsonArray($status = 500, $msg = '', $data = []){
    $status = (int)$status;
    $msg = (string)$msg;

    return ['status' => $status, 'msg' => $msg, 'data' => $data];
}
