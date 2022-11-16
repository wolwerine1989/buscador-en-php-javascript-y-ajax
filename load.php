<?php 

require 'config.php';


$columns = ['Name','CountryCode','District','Population'];
$table = "city";

$campo = isset($_POST['campo']) ? 
$conn->real_escape_string($_POST['campo']) : null;

$where = '';

if ($campo != null) {
    $where = "WHERE (";
    $cont = count($columns);

    for($i = 0; $i < $cont; $i++){
        $where .= $columns[$i] . "LIKE '%". $campo ."% ' OR ";
    }
    $where = substr_replace($where, "", -3);
    $where .= ")";
}



$sql = "SELECT " . implode(", ", $columns). " 
FROM $table $where";

// echo $sql;
// exit;

$resultado = $conn->query($sql);
$num_rows = $resultado->num_rows;

$html = '';

if ($num_rows > 0) {
    while ($row = $resultado->fetch_assoc()){
        $html .= '<tr>';
        $html .= '<td>'.$row['Name'].'</td>';
        $html .= '<td>'.$row['CountryCode'].'</td>';
        $html .= '<td>'.$row['District'].'</td>';
        $html .= '<td>'.$row['Population'].'</td>';
        $html .= '<td><a href="">Editar</a></td>';
        $html .= '<td><a href="">Eliminar</a></td>';
        $html .- '</tr>';
    }
}else{
    $html .='<tr>';
    $html .='<td colspan="6">Sin resultados</td>';
    $html .='</tr>';
}

echo json_encode($html, JSON_UNESCAPED_UNICODE);





