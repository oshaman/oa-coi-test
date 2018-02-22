<?php
/**
 * Created by PhpStorm.
 * User: ххх
 * Date: 21.02.2018
 * Time: 16:43
 */

namespace App\Repositories;

use App\Repositories\lib\curl;

class MapRepository
{
    public function Handle($request)
    {

        if ('text/xml' !== $request->file('file')->getMimeType()) {
            dd('error-mime');
        }

        ini_set('memory_limit', '256M');
        ini_set('max_execution_time', 600);
        $file = simplexml_load_file($request->file('file')->getRealPath(), 'SimpleXMLElement');


        $c = curl::app('https://medpravda.com.ua')
            ->config_load('/home/jenshen/j2landing.com/oshaman/app/Repositories/lib/wiki.cnf')
            ->follow(true);

        $result = [];

        foreach ($file as $link) {

            $uri = str_replace('https://medpravda.com.ua/', '', $link->loc);

            $data['uri'] = $uri;
            $data['headers'] = $c->request('/' . $uri);

//            dd($data);

            switch ($data['headers']) {
                case 200:  # OK
                    break;
                default:
                    $result[$data['uri']] = $data['headers'];
            }

        }
        dd($result);
    }
}