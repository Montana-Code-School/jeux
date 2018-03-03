<?php  
   public function saveGameApiData()
       {
         $client = new Client();
         $res = $client->request('GET', 'https://www.boardgamegeek.com/xmlapi/collection/mtCodeSchoolPartTime');
         $xml = simplexml_load_string($res->getBody(),'SimpleXMLElement',LIBXML_NOCDATA);

         $json = json_encode($xml);
         file_put_contents('/tmp/gameData.json', $json);
         $array = json_decode($json, true);

         $data = [];
         $data["json"] = $array;
         foreach($array['item'] as $item){
           $game = new Game();
           $game->name = $item['name'];
           $game->image = $item['image'];
           $game->year = $item['yearpublished'];
           $game->min_player = $item['stats']['@attributes']['minplayers'];
           $game->max_player = $item['stats']['@attributes']['maxplayers'];

           if(isset($item['stats']['@attributes']['minplaytime'])){
           $game->min_play = $item['stats']['@attributes']['minplaytime'];
           }else{
             $game->min_play = rand(30,90);
           }if(isset($item['stats']['@attributes']['maxplaytime'])){
           $game->max_play = $item['stats']['@attributes']['maxplaytime'];
           }else{
             $game->max_play = rand(45, 120);
           }
           $game->save();
         }



 return view ('test', $data);
       }
