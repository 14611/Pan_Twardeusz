<!DOCTYPE html>
<html lang="pl">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Pan Tadeusz</title>
<!-- Dodanie Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	</head>
	
	<body class="bg-light">
<!-- Navbar (Pasek nawigacyjny) -->
		<header class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
			<div class="container-fluid">
				<a class="navbar-brand" href="index.php">Pan Tadeusz</a>
			</div>
		</header>
		<div class="container-fluid">
			<div class="row mt-3">
<!-- Pasek boczny -->
<!-- Warunek do długości spisu treści -->
                    <?php
                    if (isset($_GET['book'])) 
                    {
                        echo '<nav class="col-md-3 col-lg-2 d-md-block bg-dark sidebar p-5 vh-100%">';
                    }
                    else
                    {
                        echo '<nav class="col-md-3 col-lg-2 d-md-block bg-dark sidebar p-5 vh-100">';   
                    }
                    ?>
					<div class="position-sticky">
						<ol class="nav flex-column">
                            <?php 
                                for ($i = 1; $i <= 12; $i++) 
                                {
                                    echo '<li class="nav-item"><a class="nav-link" href="?book=' . $i . '">Księga ' . $i . '</a></li>';
                                }
                            ?>
                        </ol>
					</div>
				</nav>

<!-- Blok główny -->
				<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 p-5">
					<div class="text-center">
						<h1>Pan Tadeusz, czyli ostatni zajazd na Litwie: historia szlachecka z roku 1811 i 1812 we dwunastu księgach wierszem.</h1>
					</div>
					<?php
// Warunek dla strony index.php
                    if (!isset($_GET['book'])) 
                    {
                        echo '<div class="text-center mb-0"><img src="1.jpg" alt="Obraz"></div>';
                    }
// Sprawdzenie, czy parametr book jest ustawiony
						if (isset($_GET['book'])) 
						{
// Pobranie numeru księgi z parametru book
							$bookNumber = $_GET['book'];
// Weryfikacja, czy numer księgi mieści się w zakresie od 1 do 12
							if ($bookNumber >= 1 && $bookNumber <= 12) 
							{
// Wyświetlenie treści księgi
								$bookContent = file_get_contents("k$bookNumber.html");
								echo $bookContent;
							} else
							{
// Wyświetlenie komunikatu o błędzie
								echo '<p class="text-danger">Błąd: Nieprawidłowy numer księgi.</p>';
							}
						}
					?>
<!-- Dodaj więcej treści do sekcji main, jeśli to konieczne -->
				</main>
			</div>
		</div>
<!-- Koniec Blok główny -->

<!-- Stopka -->
		<footer class="footer mt-auto py-3 bg-primary">
			<div class="container">
				<span class="text-muted">© 2023 Adrian Węglarz</span>
			</div>
		</footer>
	</body>
</html>
