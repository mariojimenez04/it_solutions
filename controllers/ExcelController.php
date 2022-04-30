<?php 

    namespace Controllers;

    use Model\Embarque;
    use Model\Laptop;

    class ExcelController {

        public static function downloadLaptop(){
            $file_name =  '_libros.xls';
            $id = 'id';

            $id = redirecciona($id, 'id');
            
            $laptops = Laptop::consulta('tituloId', $id);

            $embarque = Embarque::find($_GET['id']);

            header("Content-Type: application/vnd.ms-excel");
            header("Content-Disposition: attachment; filename=" . $embarque->titulo . $file_name);
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
                        <td>" . $laptop->id_detalle . "</td>
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

        public static function downloadRoldan() {
            $file_name =  'libros.xlsx';
            $id = 'id';

            $id = redirecciona($id, 'id');
            
            $laptops = Laptop::consulta('tituloId', $id);

            $embarque = Embarque::find($_GET['id']);

            header("Content-Type: application/xls");
            header("Content-Disposition: attachment; filename=" . $embarque->titulo . "_roldan" . $file_name);
            header("Pragma: no-cache");
            header("Expires: 0");
        
            $output = "";
        
            $output .= "
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Modelo</th>
                            <th>Procesador</th>
                            <th>Observaciones</th>
                            <th>Tamaño</th>
                            <th>Color</th>
                            <th>Almacenamiento</th>
                            <th>RAM</th>
                            <th>Bateria</th>
                            <th>Wifi</th>
                            <th>Camara</th>
                            <th>Sonido</th>
                            <th>Fecha</th>
                            <th>Reviso</th>
                        </tr>
                    </thead>
            ";
            $output .= "
                    <tbody>
            ";
                foreach($laptops as $laptop):
            $output .= "        
                    <tr>
                        <td>" . $laptop->id_detalle . "</td>
                        <td>" . $laptop->modelo ."</td>
                        <td>" . $laptop->procesador . "</td>
                        <td>" . $laptop->observaciones . "</td>
                        <td>" . $laptop->tamano . "</td>
                        <td>" . $laptop->color . "</td>
                        <td>" . $laptop->capacidad_almacenamiento . "</td>
                        <td>" . $laptop->ram . "</td>
                        <td>" . "</td>
                        <td>" . "</td>
                        <td>" . "</td>
                        <td>" . "</td>
                        <td>" . date('Y-m-d') . "</td>
                        <td>" . $laptop->registrado_por . "</td>
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