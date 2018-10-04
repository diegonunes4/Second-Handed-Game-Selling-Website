<?php

if (isset($msg['error'])) {
    echo "<br/>";
    foreach ($msg['error'] as $error) {
        echo $error, "<br/>";
    }
    echo "<br/>";
}
if (isset($msg['info'])) {
    echo "<br/>";
    foreach ($msg['info'] as $info) {
        echo $info, "<br/>";
    }
    echo "<br/>";
}
?>