<main class="p-3" style="height: 500px;">
    <?php 

    $codigo = $_POST['codigo'];
    // echo $codigo;
    // die;
    
    $response = json_decode(rastreamento($codigo));

    // die;
    
    // foreach($response as $key => $value) {
    //     echo $key;
    // }
    
    // foreach ($response as $chave => $valor) {
    //     echo "$chave: ";
    //     imprimirValores($valor);
    //     echo "<br>";
    // }
    
    echo "<p>Código: ".$response->result[0]->code."</p>";
    echo "<p>Status: ".$response->result[0]->data[0]->details."</p>";
    
    // foreach($response->body())
    

    ?>

</main>


<?php 
    use Sdkcorreios\Config\Services;
    use Sdkcorreios\Methods\Tracking;
    
    function rastreamento($codigo) {
        try {
            Services::setServiceTracking("MelhorRastreio"); // ID do site de busca
            Services::setDebug(true);
    
            $tracking = new Tracking();
            $tracking->setCode($codigo);
            
            return json_encode($tracking->get());
        } catch (Exception $exception) {
            return "Erro encontrado: ".$exception->getMessage();
        }
    }

    function imprimirValores($valor) {
        if (is_array($valor) || is_object($valor)) {
            foreach ($valor as $chave => $elemento) {
                echo "$chave: ";
                imprimirValores($elemento);
                echo "<br>";
            }
        } else {
            echo "$valor";
        }
    }

    
    
    
    
?>