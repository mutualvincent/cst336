<?php
    function getProducts($keywords) {
        // Replace whitespace so curl is happy
        $search = str_replace(' ', '%20', $keywords);
        $curl = curl_init();
        curl_setopt_array($curl, array(
          // CURLOPT_URL => "http://open.api.ebay.com/shopping?callname=FindProducts&responseencoding=XML&appid=YongJian-sandbox-PRD-bed59bfca-329276f6&siteid=0&QueryKeywords=dog&version=967",
          CURLOPT_URL => "http://api.walmartlabs.com/v1/search?apiKey=7eksjp57nqzw9hnb9hsudh93&query='$search'",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache"
          ),
        ));
        
        $jsonData = curl_exec($curl);
        $data = json_decode($jsonData, true);
        $items = $data['items'];
        
        return $items;
    }
?>