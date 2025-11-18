<?php
$polaczenie=mysqli_connect("localhost", "root", "", "piekarnia");

if (!$polaczenie) {
    die("nie laczy sie z baza" . mysqli_connect_error():)
}

$wybranyrodzaj = isset($_POST['rodzaj']) ? $_POST['rodzaj'] : "";
?>



<form method="post" action="">
    <select name="rodzaj">
        <option value="">-- wybierz --</option>
        <?php
        $qRodzaje = "SELECT DISTINCT Rodzaj FROM wyroby";
        if ($resRodzaje) {
            while ($r = mysqli_fetch_assoc($resRodzaje)) {
                $rodzaj = $r['Rodzaj'];
                $sel = ($rodzaj === $wybranyrodzaj) ? "selected" : "";
                echo "<option value=\"$rodzaj\" $sel>$rodzaj</option>";
            }
            mysqli_free_result($resRodzaje);
        }
        ?>
        </select>
        <button type="submit">Wybierz</button>

<?php
if ($wybranyRodzaj !== "") {
    $qDane = "SELECT Rodzaj, Nazwa, Gramatura, Cena FROM wyroby WHERE Rodzaj= '$wybranyRodzaj'";
    $resDane = mysqli_query($polaczenie, $qDane);
    if ($resDane) {
        while ($w = mysqli_fetch_assoc($resDane)) {
            echo "<tr>";
            echo "<td>{$w['Rodzaj']}</td>";
            echo "<td>{$w['Nazwa']}</td>";
            echo "<td>{$w['Gramatura']}</td>";
            echo "<td>{$w['Cena']}</td>";

        }
    }
}

