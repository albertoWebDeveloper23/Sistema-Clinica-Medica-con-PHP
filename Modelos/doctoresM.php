<?php 

    require_once "ConexionBD.php";

    class DoctoresM extends ConexionBD {

        static public function CrearDoctorM($tablaBD, $datosC) {

            $pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD(apellido, nombre, sexo, id_consultorio, usuario, clave, rol) VALUES(:apellido, :nombre, :sexo, :id_consultorio, :usuario, :clave, :rol)");

            $pdo->bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
            $pdo->bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
            $pdo->bindParam(":sexo", $datosC["sexo"], PDO::PARAM_STR);
            $pdo->bindParam(":id_consultorio", $datosC["id_consultorio"], PDO::PARAM_INT);
            $pdo->bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);
            $pdo->bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);
            $pdo->bindParam(":rol", $datosC["rol"], PDO::PARAM_STR);

            if ($pdo->execute()) {
                return true;
            }

            $pdo->close();
            $pdo = null;
            
        }

        static public function VerDoctoresM($tablaBD, $columna, $valor) {

            if ($columna != null) {

                $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

                $pdo->bindParam(":" . $columna, $valor, PDO::PARAM_STR);

                $pdo->execute();

                return $pdo->fetchAll(); /* Ojo esta parte ya que solo puede ser un solo resultado (fetch) */

            } else {

                $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD");

                $pdo->execute();

                return $pdo->fetchAll();

            }

            $pdo->close();
            $pdo = null;
        }

        /* Editar Doctor */
        static public function DoctorM($tablaBD, $columna, $valor) {

            if ($columna != null) {

                $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

                $pdo->bindParam(":" . $columna, $valor, PDO::PARAM_STR);

                $pdo->execute();

                return $pdo->fetch(); 

            } 

            $pdo->close();
            $pdo = null;
        }

    }

?>