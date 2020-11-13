<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;

class CalculBio extends Controller
{
    public function calcularBiorritme(Request $request) {

        // Tot ficat dins d'un bloc try/catch per si hi ha cap problema, poder mostrar la pàgina d'errors
        try {
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

            // Es calculen els resultat pel dia d'avui
            $resultatFisic = \sin($ciclesFisic * 2 * \pi());
            $resultatEmotiu = \sin($ciclesEmotiu * 2 * \pi());
            $resultatIntelectual = \sin($ciclesIntelectual * 2 * \pi());

            // Es preparen els arrays per emmagatzemar el llistat d'informació per poder dibuixar el gràfic
            $resultatsEixX = array();
            $resultatsFisicEixY = array();
            $resultatsEmotiuEixY = array();
            $resultatsIntelectualEixY = array();

            // S'omplen els arrays amb la informacio des de fa 15 dies fins a 15 dies futurs partint del dia actual
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

            // Es converteixen les dates a format espanyol
            $dataActual = \date('d/m/Y');
            $dataNaixement = \date('d/m/Y', \strtotime($dataNaixement));

            return \view("bio.result", ["nomUsuari" => $nomUsuari, "dataNaixement" => $dataNaixement, "resultatFisic" => $resultatFisic, 
                                        "resultatEmotiu" => $resultatEmotiu, "resultatIntelectual" => $resultatIntelectual,
                                        "resultatsEixX" => $resultatsEixX, "resultatsFisicEixY" => $resultatsFisicEixY,
                                        "resultatsEmotiuEixY" => $resultatsEmotiuEixY, "resultatsIntelectualEixY" => $resultatsIntelectualEixY,
                                        "dataActual" => $dataActual]);
            }
        catch (\Exception $e) {
            return \view("bio.error");
        }
    }
}
