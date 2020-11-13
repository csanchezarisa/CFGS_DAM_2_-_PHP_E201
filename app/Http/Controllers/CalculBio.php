<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Components\jpgraph\src;
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

        // Es calculen els radians de cada cicle
        $radiansFisics = $ciclesFisic * 2 * \pi();
        $radiansEmotiu = $ciclesEmotiu * 2 * \pi();
        $radiansIntelectual = $ciclesIntelectual * 2 * \pi();

        // Es calcula el sinus de cada radiant i s'emmagatzemen els resultats
        $resultatFisic = \sin($radiansFisics);
        $resultatEmotiu = \sin($radiansEmotiu);
        $resultatIntelectual = \sin($radiansIntelectual);

        return \view("bio.result", ["nomUsuari" => $nomUsuari, "dataNaixement" => $dataNaixement, "resultatFisic" => $resultatFisic, "resultatEmotiu" => $resultatEmotiu, "resultatIntelectual" => $resultatIntelectual]);
    }
}
