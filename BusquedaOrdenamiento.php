<?php

class BusquedaOrdenamiento {
    
    private $array;

    public function __construct($array) {
        $this->array = $array;
        // Aseguramos que el array esté ordenado al inicio
        sort($this->array);
    }

    // Búsqueda binaria
    public function busquedaBinaria($elemento) {
        $izquierda = 0;
        $derecha = count($this->array) - 1;

        while ($izquierda <= $derecha) {
            $mitad = floor(($izquierda + $derecha) / 2);

            if ($this->array[$mitad] == $elemento) {
                return $mitad; // Elemento encontrado
            }

            if ($this->array[$mitad] < $elemento) {
                $izquierda = $mitad + 1;
            } else {
                $derecha = $mitad - 1;
            }
        }

        return -1; // Elemento no encontrado
    }

    // Ordenamiento de burbuja
    public function ordenamientoBurbuja() {
        $n = count($this->array);

        for ($i = 0; $i < $n - 1; $i++) {
            for ($j = 0; $j < $n - $i - 1; $j++) {
                if ($this->array[$j] > $this->array[$j + 1]) {
                    // Intercambiar elementos si están en el orden incorrecto
                    $temp = $this->array[$j];
                    $this->array[$j] = $this->array[$j + 1];
                    $this->array[$j + 1] = $temp;
                }
            }
        }
    }

    // Ordenamiento por selección
    public function ordenamientoSeleccion() {
        $n = count($this->array);

        for ($i = 0; $i < $n - 1; $i++) {
            $minIndex = $i;
            for ($j = $i + 1; $j < $n; $j++) {
                if ($this->array[$j] < $this->array[$minIndex]) {
                    $minIndex = $j;
                }
            }

            // Intercambiar el elemento mínimo encontrado con el primero no ordenado
            $temp = $this->array[$minIndex];
            $this->array[$minIndex] = $this->array[$i];
            $this->array[$i] = $temp;
        }
    }

    // Ordenamiento por inserción
    public function ordenamientoInsercion() {
        $n = count($this->array);

        for ($i = 1; $i < $n; $i++) {
            $clave = $this->array[$i];
            $j = $i - 1;

            // Mover los elementos del array[0..i-1] que son mayores que $clave
            // a una posición adelante de su posición actual
            while ($j >= 0 && $this->array[$j] > $clave) {
                $this->array[$j + 1] = $this->array[$j];
                $j = $j - 1;
            }
            $this->array[$j + 1] = $clave;
        }
    }

    // Mostrar el array
    public function mostrarArray() {
        print_r($this->array);
    }
}

// Uso de la clase
$miArray = [3, 1, 4, 1, 5, 9, 2, 6, 5, 3, 5];
$objetoBusquedaOrdenamiento = new BusquedaOrdenamiento($miArray);

echo "Array original:\n";
$objetoBusquedaOrdenamiento->mostrarArray();

// Realizar búsqueda binaria
$elementoBuscado = 5;
$indice = $objetoBusquedaOrdenamiento->busquedaBinaria($elementoBuscado);
if ($indice != -1) {
    echo "\nEl elemento $elementoBuscado se encuentra en la posición $indice del array.\n";
} else {
    echo "\nEl elemento $elementoBuscado no se encuentra en el array.\n";
}

// Aplicar ordenamiento de burbuja
$objetoBusquedaOrdenamiento->ordenamientoBurbuja();
echo "\nArray ordenado con burbuja:\n";
$objetoBusquedaOrdenamiento->mostrarArray();

// Aplicar ordenamiento por selección
$objetoBusquedaOrdenamiento = new BusquedaOrdenamiento($miArray); // Reiniciamos el array
$objetoBusquedaOrdenamiento->ordenamientoSeleccion();
echo "\nArray ordenado con selección:\n";
$objetoBusquedaOrdenamiento->mostrarArray();

// Aplicar ordenamiento por inserción
$objetoBusquedaOrdenamiento = new BusquedaOrdenamiento($miArray); // Reiniciamos el array
$objetoBusquedaOrdenamiento->ordenamientoInsercion();
echo "\nArray ordenado con inserción:\n";
$objetoBusquedaOrdenamiento->mostrarArray();
