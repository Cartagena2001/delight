<?php

class Validator{

    //Propiedades parar manejar la validaciones de una imagen
    private $imageError = null;
    private $imageName = null;

    public function getImageName()
    {
        return $this->imageName;
    }

    //Metodo para obtener el error al validar una imagen
    public function getImageError()
    {
        switch ($this->imageError) {
            case 1:
                $error = 'El tipo de la imagen debe ser gif, jpg o png';
                break;
            case 2:
                $error = 'La dimensión de la imagen es incorrecta';
                break;
            case 3:
                $error = 'El tamaño de la imagen debe ser menor a 2MB';
                break;
            case 4:
                $error = 'El archivo de la imagen no existe';
                break;
            default:
                $error = 'Ocurrió un problema con la imagen';
        }
        return $error;
    }

    //Metodo para limpiar todos los campos del formulario quitando todo los espacios en blanco 
    public function validateForm($fields)
    {
        foreach ($fields as $index => $value) {
            $value = trim($value);
            $fields[$index] = $value;
        }
        return $fields;
    }

    //Metodo para validar un numero natural, como por ejemeplo una llave primaria
    public function validateNaturalNumber($value)
    {
        if (filter_var($value, FILTER_VALIDATE_INT, array('min_range' => 1))) {
            return true;
        } else {
            return false;
        }
    }

    //Metodo para validar cualquier imagen ingresada al formulario
    public function validateImageFile($file, $maxWidth, $maxHeigth)
    {
        if ($file) {
            if ($file['size'] <= 2097152) {
                list($width, $height, $type) = getimagesize($file['tmp_name']);
                if ($width <= $maxWidth && $height <= $maxHeigth) {
                    if ($type == 1 || $type == 2 || $type == 3) {
                        $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
                        $this->imageName = uniqid().'.'.$extension;
                        return true;
                    } else {
                        $this->imageError = 1;
                        return false;
                    }
                } else {
                    $this->imageError = 2;
                    return false;
                }
             } else {
                $this->imageError = 3;
                return false;
             }
        } else {
            $this->imageError = 4;
            return false;
        }
    }

    //Metodo para validar un correo electronico
    public function validateEmail($value)
    {
        if (filter_var($value, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }

    //Metodo para validar un dato de tipo Boleano (true o false)
    public function validateBoolean($value)
    {
        if ($value == 1 || $value == 0 || $value == true || $value == false) {
            return true;
        } else {
            return false;
        }
    }


    //Metodo para validar una cadena de datos de todo tipo comom letras, digitos, signos de puntuacion etc. 
    public function validateString($value, $minimum, $maximum)
    {

        if (preg_match('/^[a-zA-Z0-9ñÑáÁéÉíÍóÓúÚ\s\,\;\.]{'.$minimum.','.$maximum.'}$/', $value)) {
            return true;
        } else {
            return false;
        }
    }

    //Metodo para validar un dato alfabetico
    public function validateAlphabetic($value, $minimum, $maximum)
    {

        if (preg_match('/^[a-zA-ZñÑáÁéÉíÍóÓúÚ\s]{'.$minimum.','.$maximum.'}$/', $value)) {
            return true;
        } else {
            return false;
        }
    }

    //Metodo para validar un dato alfanumerico
    public function validateAlphanumeric($value, $minimum, $maximum)
    {

        if (preg_match('/^[a-zA-Z0-9ñÑáÁéÉíÍóÓúÚ\s]{'.$minimum.','.$maximum.'}$/', $value)) {
            return true;
        } else {
            return false;
        }
    }

    //Metodo para validar un dato monetario
    public function validateMoney($value)
    {

        if (preg_match('/^[0-9]+(?:\.[0-9]{1,2})?$/', $value)) {
            return true;
        } else {
            return false;
        }
    }

    //Metodo para validar una contrasenia
    public function validatePassword($value)
    {

        if (strlen($value) >= 6) {
            return true;
        } else {
            return false;
        }
    }

    //Metodo para validar la ubicacion del archivo antes de subirlo al servidor
    public function saveFile($file, $path, $name)
    {
        if ($file) {
            if (file_exists($path)) {
                if (move_uploaded_file($file['tmp_name'], $path.$name)) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    //Metodo para validar la ubicacion del archivo antes de ser eliminado
    public function deleteFile($path, $name)
    {
        if (file_exists($path)) {
            if (@unlink($path.$name)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
?>