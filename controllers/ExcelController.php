<?php 

    namespace Controllers;

use Model\Embarque;
use Model\Laptop;
use MVC\Router;

    class ExcelController {

        public static function downloadLaptop(){
            $id = 'id';

            $id = redirecciona($id, 'id');
            
            $laptops = Laptop::consulta('tituloId', $id);

            $embarque = Embarque::find($_GET['id']);

            header("Content-Type: application/xls");
            header("Content-Disposition: attachment; filename=" . $embarque->titulo . ".xls");
            header("Pragma: no-cache");
            header("Expires: 0");
        
            $output = "";
        
            $output .= "
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Modelo</th>
                            <th>No. Serie</th>
                            <th>Procesador</th>
                            <th>Tamaño</th>
                            <th>Color</th>
                            <th>Tamaño memoria</th>
                            <th>RAM</th>
                            <th>Cantidad</th>
                            <th>Status</th>
                            <th>Observaciones</th>
                            <th>Registrado por</th>
                            <th>Registrado el</th>
                        </tr>
                    </thead>
            ";
        
            $output .= "
                    <tbody>
            ";
                foreach($laptops as $laptop):
            $output .= "        
                    <tr>
                        <td>" . $laptop->id . "</td>
                        <td>" . $laptop->modelo ."</td>
                        <td>" . $laptop->numero_serie . "</td>
                        <td>" . $laptop->procesador . "</td>
                        <td>" . $laptop->tamano . "</td>
                        <td>" . $laptop->color . "</td>
                        <td>" . $laptop->capacidad_almacenamiento . "</td>
                        <td>" . $laptop->ram . "</td>
                        <td>" . $laptop->cantidad . "</td>
                        <td>" . $laptop->status . "</td>
                        <td>" . $laptop->observaciones . "</td>
                        <td>" . $laptop->registrado_por . "</td>
                        <td>" . $laptop->creado_el . "</td>
                    </tr>
                ";
                endforeach;
            $output .= "
                    </tbody>
                </table>
            ";

            echo $output;
        }
    }