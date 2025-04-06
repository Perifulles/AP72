<?php
class Model extends Conexion
{

//EJ2
    public function getAllProducts(){

        $query = 'SELECT * FROM PRODUCTO';
        $stmt = $this->getConn()->query($query);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function showAllProducts(){
        $result = $this->getAllProducts();

        echo '<table class="table table-striped">';
        echo '<thead><tr><th>Numero Producto</th><th>Descripción</th></tr></thead>';
        foreach ($result as $row) {
            echo '<td>';
            echo $row['PROD_NUM'];
            echo '<td>';
            echo $row['DESCRIPCION'];
            echo '<tr>';
        }
        echo '</table>';


    }


//EJ3
    public function getAllEmp(){
    
        $query = 'Select EMP_NO, APELLIDOS, DEPT_NO, SALARIO, FECHA_ALTA from EMP';
        $stmt = $this->GetConn()->query($query);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    //Guardamos los n de empresa de colores diferentes.
    public function showAllEmp(){
        $result = $this->getAllEmp();

        echo '<table class="table table-striped">';
        echo '<thead><tr><th>Numero de departamento</th><th>Apellido</th><th>Salario</th><th>Fecha de alta</th><th>Departamento</th></tr></thead>';
        foreach ($result as $row) {
            $id = $row['DEPT_NO'];
                $color = "";
            if ($id == 10){
                $color = "blue";
            }elseif( $id == 20){
                $color = "red";
            }elseif ( $id == 30){
                $color = "green";
            }

            $salario = number_format($row['SALARIO'], 2, ',', '.') . " €"; // Formato moneda
            $fechaAlta = date("d/m/Y", strtotime($row['FECHA_ALTA'])); // Formato fecha

            echo '<td>';
            echo $row['EMP_NO'];
            echo '<td>';
            echo $row['APELLIDOS'];
            echo '<td>';
            echo $salario;
            echo '<td>';
            echo $fechaAlta;
            echo '<td style="background-color:' . $color . '";>';
            echo "";
            echo '<tr>';
        }
        echo '</table>';

    }


//EJ4
    public function getAllClients($order){
        $query = 'Select * from CLIENTE order by NOMBRE ' . $order;
        $stmt = $this->getConn()->query($query);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function showAllClients($order){
        $result = $this->getAllClients($order);


        echo '<table class="table table-striped">';
        echo '<thead><tr><th>CLIENTE_COD</th><th>NOMBRE</th><th>CIUDAD</th></tr></thead>';
        foreach ($result as $row){
            echo '<td>';
            echo $row['CLIENTE_COD'];
            echo '<td>';
            echo $row['NOMBRE'];
            echo '<td>';
            echo $row['CIUDAD'];
            echo '<tr>';
        }
        echo '</table>';        
    }


//EJ5

    public function getOrder($total){
        $query = 'Select PEDIDO_NUM, CLIENTE_COD, TOTAL from PEDIDO where TOTAL >' . $total;
        $stmt = $this->getConn()->query($query);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function showOrder($total){
        $result = $this->getOrder($total);


        echo '<table class="table table-striped">';
        echo '<thead><tr><th>PEDIDO_NUM</th><th>CLIENTE_COD</th><th>TOTAL</th></tr></thead>';
        foreach ($result as $row){
            echo '<td>';
            echo $row['PEDIDO_NUM'];
            echo '<td>';
            echo $row['CLIENTE_COD'];
            echo '<td>';
            echo $row['TOTAL'];
            echo '<tr>';
        }
        echo '</table>';    
    

    }      
    


//EJ6

    public function getOrderLines($pedido){
        $query = 'Select PEDIDO_NUM, DETALLE_NUM, IMPORTE from DETALLE where PEDIDO_NUM =' . $pedido;
        $stmt = $this->getConn()->query($query);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getOrderLinesHigh($pedido){
        $max = 0;
        $query = 'Select PEDIDO_NUM, DETALLE_NUM, IMPORTE from DETALLE where PEDIDO_NUM =' . $pedido;
        $stmt = $this->getConn()->query($query);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row){
            if ($max < $row['IMPORTE']){
                $max = $row['IMPORTE'];
            }
        }
        return $max;
    }

    public function showOrderLines($pedido){
        $result = $this->getOrderLines($pedido);
        $max = $this->getOrderLinesHigh($pedido);


        echo '<table class="table table-striped">';
        echo '<thead><tr><th>PEDIDO_NUM</th><th>DETALLE_NUM</th><th>IMPORTE</th></tr></thead>';
        foreach ($result as $row){
            echo '<td>';
            echo $row['PEDIDO_NUM'];
            echo '<td>';
            echo $row['DETALLE_NUM'];
            echo '<td>';
            if ($row['IMPORTE'] == $max){
                echo $row['IMPORTE'] . ' <img src="star-256.png" alt="JAKPOOO" width="20px">';
            }else{
                echo $row['IMPORTE'];}
            echo '<tr>';
        }
        echo '</table>';    
    }     




//EJ7



//EJ8
}