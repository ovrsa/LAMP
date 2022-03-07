<html>
<head></head>
<body>
	<h1>docker compose!</h1>
	<p><?php echo('php echo - docker compose!'); ?></p>
	<p><a href="index.html">index.html</a></p>
	<p><a href="info.php">info.php</a></p>

	<?php
		class Human {
			private $name;
			private $birthday;
			private $gender;

			public function __construct($name, $birthday, $gender) {
				$this -> name = $name;
				$this -> birthday = $birthday;
				$this -> gender = $gender;
			}

			public function walk() {
				echo "{$this -> name}は歩きます<br/>";
			}

			public function eat() {
				echo "{$this -> name}食べます<br/>";
			}
		}
		$human = new Human('yamasaki','19961124','man');
		$human -> eat();
		$human -> walk();
	?>
	
</body>
</html>
