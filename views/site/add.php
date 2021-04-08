<?php
$request = Yii::$app->request;


$date = $request->post('date');
// $sum = $request->post('sum');
// $cat = $request->post('cat');

// $dsn = 'mysql:host=localhost;dbname=save_coin';
// $user = 'savecoin_user';
// $pass = 'savecoin_pass';
// $pdo = new PDO($dsn, $user, $pass);

// $sql = 'INSERT INTO money(date, sum, cat) VALUES(:date, :sum, :cat)';
// $query = $pdo->prepare($sql);
// $query->execute(['date' => $date, 'sum' => $sum, 'cat' => $cat]);

// header('Location: /');

echo $date . '<br>';
echo $sum . '<br>';
echo $cat . '<br>';
