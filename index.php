<?php

require 'vendor/autoload.php';

use GuzzleHttp\Client;
use function GuzzleHttp\json_encode;

class ApiCaller
{
    public function sendRequest($query,$i)
    {
        $headers = [
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjQyNWJhZTU4ZWIxZjIxMTBjNDFlNDViZjA0ZWY3N2YzMDUyOTM1Njg1MDNiY2NkYzkzMWViZjliOTA3MDlmZWE3ZTBlY2Y4NjVkNGFhYmJhIn0.eyJhdWQiOiIxIiwianRpIjoiNDI1YmFlNThlYjFmMjExMGM0MWU0NWJmMDRlZjc3ZjMwNTI5MzU2ODUwM2JjY2RjOTMxZWJmOWI5MDcwOWZlYTdlMGVjZjg2NWQ0YWFiYmEiLCJpYXQiOjE1NjMwMzE4MjcsIm5iZiI6MTU2MzAzMTgyNywiZXhwIjoxNTk0NjU0MjI3LCJzdWIiOiI2OTIxIiwic2NvcGVzIjpbXX0.GERn2QXmWWlV3J28wR1vEPWhAzpzqEYf6oHIE1IP4JfwjJ00w_6g-Q740Bs7TysRiLFv1XWWniH6fqW1ed57FjGY6SGyzX4Ou6aLSaAObbQXZCdAIHwP9h6Ld_9_z-TdVAiYQBVhfrKG7j6f_17TNcoHAijiRQeGlqsadfxY9X1HXD07itg9Jj7WcmFuUY0UHcinXDvGOBZkpuYBZnr7YeWcoSBEfJUUbxMvwcVoLq-oDyd4hmW8WPCyL4RAHyO1V2sJa9xYtYHJZDlOsi0n-9i6lQluAM9i8gR-1el-HjMpgaVEcG5FcYs3B-6Bhp6ILRGEebmK3_nbUruKskHmKUcfiArhj5MIF-2oQWHkQM3Kqdj71BVvbpfaPWYVFQASWEFGR55Bz72FZs7_Oo-XCUnd3UtRz2YiElcoTozpuOIMonuqIcsxJGSawtl4dcYcxdc9VI1uTi0kJIfP2qSawS2ZOrtynCqXpURrjWmj3v7F9jRuRvlHjBTZdZysu5siucNINen9NUWusZdZeY2GXSLpfvPD3aUxW7LHZjbP3yqV1WXZhezUjNFpj-EQmRo-njZORBPKLtSbdVNY83FWu6QT2yIX33r0Y3TMpIaCnkRN4xiciNjkjLDrWC9swI9foGMNb8g7XLP9igZyCakAlF2QtKi8NWchzPET2ZoKxgY',
            'Accept'        => 'application/json',
            'Content-Type' => 'application/json'
        ];
        $client = new Client();
        try {
            $response = $client->post('https://api.brew.com/api/v1/search', [
                'headers' => $headers,
                'body' => json_encode([
                    'query' => $query
                ])
            ]);
    
            echo $i.PHP_EOL;
        } catch (\Exception $ex) {
            echo json_encode($ex);
        }
    }
}

$api = new ApiCaller();

$arr = array_keys((array) json_decode(file_get_contents('words.json')));
for ($i=42; $i < count($arr); $i++) { 
    $api->sendRequest($arr[$i],$i);
    sleep(4);
}