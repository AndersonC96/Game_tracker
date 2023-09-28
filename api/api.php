<?php
    function getGameDescriptionFromAPI($api_key, $game_name){// Função para obter a descrição de um jogo da API RAWG
        $url = "https://api.rawg.io/api/games?key=$api_key&search=" . urlencode($game_name);// URL da API RAWG
        $ch = curl_init();// Inicialize a sessão cURL
        curl_setopt($ch, CURLOPT_URL, $url);// Defina a URL
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);// Defina a opção de transferência como TRUE
        $response = curl_exec($ch);// Execute a solicitação
        if(curl_errno($ch)){// Verifique se ocorreu algum erro
            echo 'Erro na solicitação à API: ' . curl_error($ch);// Imprima o erro
            return "";// Retorne uma string vazia
        }
        curl_close($ch);// Feche a sessão cURL
        $data = json_decode($response, true);// Decodifique a resposta JSON
        if(isset($data['results'][0]['description'])){// Verifique se a descrição do jogo está definida
            return $data['results'][0]['description'];// Retorne a descrição do jogo
        }
        return "";// Retorne uma string vazia
    }
?>