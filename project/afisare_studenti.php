<?php
echo "<link rel='stylesheet' type='text/css' href='style.css'>";
$con = mysqli_connect("127.0.0.1", "root", "", "facultate") or die("Nu se poate conecta la serverul MySQL");

// Interogare pentru a selecta toți studenții
$query = mysqli_query($con, "SELECT * FROM studenti_AC") or die("Eroare la interogare: " . mysqli_error($con));

echo "<div style='display: flex; flex-direction: column; align-items: center; justify-content: center; min-height: 100vh;'>";

// Afișarea studenților într-un tabel
echo "<h2>Lista studenților</h2>";
echo "<div class='table-container'>";
echo "<table border='1px solid' style='margin: 0 auto;'>";
echo "<tr><th>Marca</th><th>Nume</th><th>Prenume</th><th>An Studiu</th></tr>";

while ($row = mysqli_fetch_assoc($query)) {
    echo "<tr>";
    echo "<td>" . $row['Marca'] . "</td>";
    echo "<td>" . $row['Nume'] . "</td>";
    echo "<td>" . $row['Prenume'] . "</td>";
    echo "<td>" . $row['An_Studiu'] . "</td>";
    echo "</tr>";
}
echo "</table>";
echo "</div>";

// Butoane pentru navigare
echo "<div style='margin-top:20px;'>";
echo "<a href='adaugare_studenti.php'><button>Adaugă un student</button></a>";
echo "<a href='adaugare_discipline.php'><button>Adaugă o disciplină</button></a>";
echo "<a href='afisare_discipline.php'><button>Vezi lista de discipline</button></a>";
echo "</div>";

echo "</div>";

mysqli_close($con);
