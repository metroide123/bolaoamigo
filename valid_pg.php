<?php
session_start();
include_once ("conn/connec.php");
if ($_SESSION['id']) {
    $id_atual = $_SESSION['id'];
    if (!empty(filter_input(INPUT_GET, 'h', FILTER_SANITIZE_STRING))) {
        $h = filter_input(INPUT_GET, 'h', FILTER_SANITIZE_STRING);
        
        if($h == "234234") {
        // Pegando Id do sorteio Ativo
        $result_Sorteio = "SELECT * FROM sorteios WHERE status = 1 LIMIT 1";
        $result_Sor = mysqli_query($con, $result_Sorteio);
        $row_sorteio = mysqli_fetch_assoc($result_Sor);
        $idsorteio = $row_sorteio['id_sorteio'];

        //Pegando id do ultimo ticket do usuario solicitado
        $result_tick = "SELECT * FROM tickets WHERE id_usuario = ' $id_atual' AND id_sorteio = '$idsorteio' AND status = 0 ORDER BY data_compra ASC LIMIT 1";
        $result_tikets = mysqli_query($con, $result_tick);
        $row_tik = mysqli_fetch_assoc($result_tikets);

        // Verificando se ouvi ticket de resposta.
        if (!empty($row_tik)) {
            $id_tiket = $row_tik['id_ticket'];

            // fazendo update no tickd para pago.
            do {
                $result = true;
                $tiket = rand(1000000000, 9999999999);
                $result_tick = "SELECT count(*) as total FROM tickets WHERE num_ticked = '$tiket' LIMIT 1";
                $result_tikets = mysqli_query($con, $result_tick);
                if($result_tikets != "1"){
                  $result = false;  
                }
            
            } while ($result);
            
            $Up_TikStatus = "UPDATE tickets SET status = 1, num_ticked = '$tiket' WHERE id_ticket ='$id_tiket' LIMIT 1";
            $result_usuario2 = mysqli_query($con, $Up_TikStatus);
            $Up_us = "UPDATE usuarios SET part_sorteio = 1 WHERE id ='$id_atual' LIMIT 1";
            $result_use = mysqli_query($con, $Up_us);
            
            // comissão usuario direto
            unset($result_usuario);
            unset($result_usuario1);
            $result_usuario = "SELECT * FROM usuarios WHERE id = '$id_atual' LIMIT 1";
            $result_usuario1 = mysqli_query($con, $result_usuario);
            $row_usu = mysqli_fetch_assoc($result_usuario1);
            if ($row_usu['status'] == "1") {
                $ads = 10;
                $id1 = $row_usu['id'];
                $id2 = $row_usu['id_indicador1'];
                
                if ($id2 != "0") {
                    $ads = $ads - 5;
                    unset($result_usuario);
                    unset($result_usuario1);
                    $result_usuario = "SELECT * FROM usuarios WHERE id = '$id2' LIMIT 1";
                    $result_usuario1 = mysqli_query($con, $result_usuario);

                    if (!empty($result_usuario1)) {
                        $row_ref = mysqli_fetch_assoc($result_usuario1);
                        $saldodir = $row_ref['saldo'];
                        $use_dir_partipasorteio = $row_ref['num_dir_sor_atual'];
                        $saldoAtualiza = $saldodir + 5;
                        $use_dir_partipasorteio++;
                        $sql_up = "UPDATE usuarios SET saldo = '$saldoAtualiza', num_dir_sor_atual = '$use_dir_partipasorteio' WHERE id ='$id2'";
                        $result_usuario2 = mysqli_query($con, $sql_up);
                    } else {
                        echo "erro erro comisão 1";
                    }
                }

                // pagamento comisão 2 caso exista
                $id3 = $row_usu['id_indicador2'];
                if ($id3 != "0") {
                    $ads = $ads - 1;
                    unset($result_usuario);
                    unset($result_usuario1);
                    $result_usuario = "SELECT * FROM usuarios WHERE id = '$id3' LIMIT 1";
                    $result_usuario1 = mysqli_query($con, $result_usuario);

                    if (!empty($result_usuario1)) {
                        $row_ref = mysqli_fetch_assoc($result_usuario1);
                        $saldoind1 = $row_ref['saldo'];
                        $use_ind_partipasorteio = $row_ref['num_dir_sor_atual'];
                        $saldoAtualiza2 = $saldoind1 + 1;
                        $use_ind_partipasorteio++;
                        $sql_up1 = "UPDATE usuarios SET saldo = '$saldoAtualiza2', num_dir_sor_atual = '$use_ind_partipasorteio' WHERE id ='$id3'";
                        $result_usuario3 = mysqli_query($con, $sql_up1);
                    } else {
                        echo "erro add comisão 2";
                    }
                }
                unset($result_usuario);
                unset($result_usuario1);
                $result_usuario = "SELECT * FROM usuarios WHERE id = 1 LIMIT 1";
                $result_usuario1 = mysqli_query($con, $result_usuario);
                if (!empty($result_usuario1)) {
                $row_ref = mysqli_fetch_assoc($result_usuario1);
                $saldoindacs = $row_ref['saldo'];
                $saldoindac = $saldoindacs + $ads;    
                $sql_up1 = "UPDATE usuarios SET saldo = '$saldoindac' WHERE id = 1 LIMIT 1";
                $result_usuario3 = mysqli_query($con, $sql_up1);
                }
                
                $_SESSION['msg'] = "Compra realizada com sucesso!.";
                header("Location: Sor_bihe.php");
                
            } else {
                echo "Erro confirmação de compra - não existe solicitação de ticket";
            }
        } 
        else {
            $_SESSION['msg'] = "Faça Loguin para Acesar a pagina.";
            header("Location: pages-login.php");
        }
        
        } else {
            $_SESSION['msg'] = "<p style='color: red'>Erro - User não logado</p>";
            header("Location: pages-login.php");
        } 
    } else {
        echo "Erro grave!";
    }
} else {
    $_SESSION['msg'] = "<p style='color: red'>Erro - User não logado</p>";
    header("Location: pages-login.php");
}

        