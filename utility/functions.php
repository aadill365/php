<?php

function image_link(){

    $url = 'https://c.xkcd.com/random/comic/';
    $context = stream_context_create( [
    'ssl' => [
        'verify_peer' => false,
        'verify_peer_name' => false,
            ],
        ]);
    
    try {
        $head = get_headers( $url,0,$context);
        $comic_link = $head[7];
        preg_match( '/[0-9]+/', $comic_link, $matches );
        $rand_comic = $matches[0];
    } catch (\Throwable$th) {
        print($th->getMessage());
    }
    
    $url= 'https://xkcd.com/' . $rand_comic . '/info.0.json';
    $json = file_get_contents($url);
    $data = json_decode($json);
    $image = $data->img;
    return $image;
    }

    function get_comic(){
        $url = 'https://c.xkcd.com/random/comic/';
        $context = stream_context_create( [
        'ssl' => [
            'verify_peer' => false,
            'verify_peer_name' => false,
                ],
            ]);
        
        try {
            $head = get_headers( $url,0,$context);
            $comic_link = $head[7];
            preg_match( '/[0-9]+/', $comic_link, $matches );
            $rand_comic = $matches[0];
        } catch (\Throwable$th) {
            print($th->getMessage());
        }
    
        $url= 'https://xkcd.com/' . $rand_comic . '/info.0.json';
        $json = file_get_contents($url);
        $data = json_decode($json);
        $image = $data->img;
        $img = 'images/comic.png';
        file_put_contents($img,file_get_contents($image));
    
        return $data;
            
    }



?>