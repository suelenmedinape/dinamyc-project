<?php    
    /**
     *  A função abaixo gera de forma pseudo-aleatória
     *  cores no padrão CSS hexadecimal.
     *  @return string: String contendo a cor no formato hexadecimal. Ex.: #20b2aa
     */
    function generateHexColor() {        
        $redChannel = str_pad(dechex(rand(0, 255)), 2, '0', STR_PAD_LEFT);
        $greenChannel = str_pad(dechex(rand(0, 255)), 2, '0', STR_PAD_LEFT);
        $blueChannel = str_pad(dechex(rand(0, 255)), 2, '0', STR_PAD_LEFT);
        return '#'.$redChannel.$greenChannel.$blueChannel;
    }     

    // Gerar 100 cores e armazená-las em um array
    $colors = [];
    for ($i = 0; $i < 100; $i++) {
        $colors[] = generateHexColor();
    }

    // Retornar as cores em formato JSON
    echo json_encode($colors);
?>