<?php
echo "<link rel='stylesheet' type='text/css' href='style.css'>";
$con = mysqli_connect("127.0.0.1", "root", "", "facultate") or die("Nu se poate conecta la serverul MySQL");

// Interogare pentru a selecta toate disciplinele
$query = mysqli_query($con, "SELECT * FROM discipline") or die("Eroare la interogare: " . mysqli_error($con));

echo "<div style='display: flex; flex-direction: column; align-items: center; justify-content: center; min-height: 100vh;'>";

// Afișarea disciplinelor într-un tabel
echo "<h2>Lista disciplinelor</h2>";
echo "<div class='table-container'>";
echo "<table border='1px solid' style='margin: 0 auto;'>";
echo "<tr><th>Cod Disciplina</th><th>Disciplina</th><th>An Studiu</th></tr>";

while ($row = mysqli_fetch_assoc($query)) {
    echo "<tr>";
    echo "<td>" . $row['codDisciplina'] . "</td>";
    echo "<td>" . $row['Disciplina'] . "</td>";
    echo "<td>" . $row['An_Studiu'] . "</td>";
    echo "</tr>";
}
echo "</table>";
echo "</div>";

// Butoane pentru navigare
echo "<div style='margin-top:20px;'>";
echo "<a href='adaugare_discipline.php'><button>Adaugă o disciplină</button></a>";
echo "<a href='adaugare_studenti.php'><button>Adaugă un student</button></a>";
echo "<a href='afisare_studenti.php'><button>Vezi lista de studenți</button></a>";
echo "</div>";

echo "</div>";

mysqli_close($con);
