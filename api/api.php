<?php
    include_once 'config.php';// Inclua o arquivo de configuração
    function getGameDescriptionFromAPI($game_name){
        $api_key = RAWG_API_KEY;// Obtenha a chave da API da configuração
        $url = "https://api.rawg.io/api/games?key=$api_key&search=" . urlencode($game_name);// Crie a URL da API
        $ch = curl_init();// Inicialize a sessão cURL
        curl_setopt($ch, CURLOPT_URL, $url);// Defina a URL
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);// Defina a opção de transferência como verdadeira
        $response = curl_exec($ch);// Execute a solicitação
        if(curl_errno($ch)){
            echo 'Erro na solicitação à API: ' . curl_error($ch);// Se houver um erro, imprima-o
            return "";// Retorne uma string vazia
        }
        curl_close($ch);// Feche a sessão cURL
        $data = json_decode($response, true);// Decodifique a resposta JSON
        if(isset($data['results'][0]['description'])){// Se a descrição do jogo estiver definida
            return $data['results'][0]['description'];// Retorne a descrição do jogo
        }
        return "";// Retorne uma string vazia
    }
?>
