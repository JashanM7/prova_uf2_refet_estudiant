<?php


function guardaUnaImatgeRetornaNomFitxer($imgFiles)
{

    $origen = $imgFiles["tmp_name"];
    $desti = "scooters/";

    $array = explode(".", $imgFiles['name']);
    $extensio = $array[count($array) - 1];

    if (!isset($_SESSION["counterImatges"])) {
        $_SESSION["counterImatges"] = 7;
    }

    $nomFitxer = "p" . $_SESSION["counterImatges"] . "." . $extensio;

    $_SESSION["counterImatges"]++;

    Store::store($origen, $desti, $nomFitxer);

    return $nomFitxer;
}
