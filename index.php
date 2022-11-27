<?php
//функция для записи из xtml в базу
function insert($name, $desc, $year, $raiting, $poster, $category_id){
  $mysqli = new mysqli('localhost', 'root', '', 'kino');

  if(mysqli_connect_errno()){
    print_f('Соединение не установлено');
    exit();
  }
  $mysqli->set_charset('utf8');

  $query = "INSERT INTO move (`id`, `name`, `description`, `year`,
    `raiting`, `poster`, `add_date`, `category_id`) VALUES(null,
      '$name', '$desc', '$year', '$raiting',
    '$poster', Now(), '$category_id')";

  $result = false;

  if ($mysqli->query($query) or die($mysqli->error)) {
      $result = true;
  }

  return $result;
}



//работа с xml
  // $xml = simplexml_load_file("xml_files/movies.xml") or die("Error: Cannot create object");
  // echo "<pre>";
  // print_r($xml);
  // echo "</pre>";

  $xml = simplexml_load_file("xml_files/movies.xml") or die("Error: Cannot create object");
  //$xml = simplexml_load_file("xml_files/serials.xml") or die("Error: Cannot create object");

  $title = null;
  $title_orgin = null;
  $post = null;
  $raiting = null;
  $year = null;

//вывод названия title_russian
  // foreach ($xml as $movie_key => $movie) {
  //   $title = $movie->title_russian;
  //   $title_orgin = $movie->title_original;
  //   $year = $movie->year;

  foreach ($xml as $movie_key => $movie) {
    $title = $movie->title_russian;
    $title_orgin = $movie->title_original;
    $year = $movie->year;

    // foreach ($movie->poster->big->attributes() as $poster_key => $poster) {
    //   $post =  $poster;
    // }
    //
    // if($movie->imdb){
    //   $raiting = $movie->imdb->attributes();
    // }
    // else{
    //     $raiting = null;
    // }

    //insert($title, $title_orgin, $year, $raiting, $post, 1);
  }

  foreach ($movie->poster->big->attributes() as $poster_key => $poster) {
    $post =  $poster;
  }

  if($movie->imdb){
    $raiting = $movie->imdb->attributes();
  }
  else{
      $raiting = null;
  }
  insert($title, $title_orgin, $year, $raiting, $post, 1);
  print_r($xml);
  echo "</pre>";

?>
