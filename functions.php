<?php
/**
 * Created by PhpStorm.
 * User: ibrahimqraiqe
 * Date: 13.03.2018
 * Time: 09.06
 */

function m360_dagen_idag_get_html(){
    $nrk_content = file_get_contents('http://m.nrk.no/dagenidag/');
    $dom = new DOMDocument('1.0','UTF-8');
    $dom->loadHTML($nrk_content);
    $node = $dom->getElementsByTagName('div')->item(0);
    $html = $node->ownerDocument->saveHTML($node);
    $html .= '<div style="margin-top: 30px">';
    $html .= '<small>Dagen idag kommer fra: <a href="https://nrk.no">nrk</a></small>';
    $html .= '</div>';

    echo  $html;
}
