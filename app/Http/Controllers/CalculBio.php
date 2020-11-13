<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;

class CalculBio extends Controller
{
    public function calcularBiorritme(Request $request) {

        // Es fa un Set de la zona horaria per fer correctament els càlculs
        date_default_timezone_set("Europe/Madrid");

        // Es recuperen el nom d'usuari i la data de naixement que ha enviat l'usuari per formulari
        $nomUsuari = $request->input("nomusuari");
        $dataNaixement = $request->input("datanaixement");

        // La data de naixement es passa a tipus DateTime, i també es recupera la data actual
        $dataInicial = new DateTime($dataNaixement);
        $dataActual = new DateTime(date('Y/m/d'));

        // Es calcula la diferència entre les dues dates i es converteix el resultat a dies
        $diesDiferencia = $dataInicial->diff($dataActual);
        $diesDiferencia = $diesDiferencia->days;

        // Es calculen els cicles de cada apartat, segons la pràctica
        $ciclesFisic = $diesDiferencia / 23;
        $ciclesEmotiu = $diesDiferencia / 28;
        $ciclesIntelectual = $diesDiferencia / 33;

        $resultatFisic = \sin($ciclesFisic * 2 * \pi());
        $resultatEmotiu = \sin($ciclesEmotiu * 2 * \pi());
        $resultatIntelectual = \sin($ciclesIntelectual * 2 * \pi());

        $resultatsEixX = array();
        $resultatsFisicEixY = array();
        $resultatsEmotiuEixY = array();
        $resultatsIntelectualEixY = array();

        for ($index = -15; $index <= 15; $index++) {
            $resultatEixX = \date("d-m-Y", \strtotime(\date('Y/m/d') . "+" . $index . " days"));
            $resultatFisicX = \sin((($diesDiferencia + $index) / 23) * 2 * \pi());
            $resultatEmotiuX = \sin((($diesDiferencia + $index) / 28) * 2 * \pi());
            $resultatIntelectualX = \sin((($diesDiferencia + $index) / 33) * 2 * \pi());

            array_push($resultatsEixX, $resultatEixX);
            array_push($resultatsFisicEixY, $resultatFisicX);
            array_push($resultatsEmotiuEixY, $resultatEmotiuX);
            array_push($resultatsIntelectualEixY, $resultatIntelectualX);
        }

        $dataActual = \date('d/m/Y');

        return \view("bio.result", ["nomUsuari" => $nomUsuari, "dataNaixement" => $dataNaixement, "resultatFisic" => $resultatFisic, 
                                    "resultatEmotiu" => $resultatEmotiu, "resultatIntelectual" => $resultatIntelectual,
                                    "resultatsEixX" => $resultatsEixX, "resultatsFisicEixY" => $resultatsFisicEixY,
                                    "resultatsEmotiuEixY" => $resultatsEmotiuEixY, "resultatsIntelectualEixY" => $resultatsIntelectualEixY,
                                    "dataActual" => $dataActual]);
    }
}
