<?php

function cleanStr($str) {

    return trim(htmlspecialchars(addslashes(strip_tags($str))));

}