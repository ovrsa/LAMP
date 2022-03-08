<?php

// 1.データベース接続
function dbConnect(){
	$dsn = 'mysql:host=db;dbname=docker_db;';
	try {
		$db = new PDO($dsn, 'docker_user', 'docker_pass');
		} catch (PDOException $e) {
			echo '接続失敗'. $e->getMessage();
			exit;
		};
		return $db;
}

// 2.データを取得
function getAllblog(){
	$db = dbConnect();
	$sql = 'SELECT * from blog';;
	$stmt = $db->prepare($sql);
	$stmt->execute();
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $result;
}
// 取得したデータを表示
$blogData = getAllblog();

// 3.カテゴリ名を表示
function setCategoryName($category){
	if ($category === '1') {
		return 'ブログ';
	} elseif ($category === '2') {
		return '日常';
	} else {
		return 'その他';
	}
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>blog一覧</title>
</head>
<body>
	<h2>ブログ一覧</h2>
	<table>
		<tr>
			<th>No</th>
			<th>タイトル</th>
			<th>カテゴリ</th>
		</tr>
		<?php foreach($blogData as $column): ?>
		<tr>
			<td><?php echo $column['id'] ?></td>
			<td><?php echo $column['title'] ?></td>
			<td><?php echo setCategoryName($column['category']) ?></td>
		</tr>
		<?php endforeach; ?>
	</table>
</body>
</html>
