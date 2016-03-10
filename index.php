<?php
  // header('Content-type: text/plain; charset=utf-8');
  include_once("simple_html_dom.php");
  $string = 'http://www.qualocep.com/busca-endereco//'. strtolower($_GET['cidade']) .'/'. strtolower($_GET['uf']);
  $html = file_get_html($string);

  // echo json_encode($object);
  $cidades = [];
  foreach ($html->find('table') as $key => $table) {
    foreach ($table->find('tr') as $key => $tr) {
      $cidade = new stdClass();
      $count = 0;
      foreach ($tr->find('td') as $key => $td) {
        $count++;
        foreach ($td->find('span') as $key => $span) {
          if($count == 1){
            $cidade->cep = trim($span->find('a')[0]->innertext);
          }elseif($count == 2) {
            $cidade->endereco = trim($span->find('a')[0]->innertext);
          }elseif($count == 3) {
            $cidade->bairro = trim($span->find('a')[0]->innertext);
          }elseif($count == 4) {
            $cidade->cidade = trim($span->find('a')[0]->innertext);
          }elseif($count == 5) {
            $cidade->uf = trim($span->find('a')[0]->innertext);
          }
        }
      }
      array_push($cidades, $cidade);
    }
  }
  array_splice($cidades, 0, 1);
  if(strtolower($_GET['formato']) == 'xml'){
    header('Content-type: text/xml; charset=utf-8');
    echo xmlrpc_encode($cidades);
  }elseif(strtolower($_GET['formato']) == 'json'){
    header('Content-type: application/json; charset=utf-8');
    echo json_encode($cidades);
  }
