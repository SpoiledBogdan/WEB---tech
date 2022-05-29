<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<h1>Ввод данных для первой таблицы</h1>
<form method="POST" action="">
    <p>Номер рейса<input name="flight_number" type="number"/></p>
    <p>Пункт отправления<input name="departure" type="text"/></p>
    <p>Пункт назначения<input name="destination" type="text"/></p>
    <p>Количество пассажиров<input name="number_of_passengers" type="text"/></p>

    <input type="submit" value="Отправить"/>
</form>

<h1>Ввод данных для второй таблицы</h1>
<form method="POST" action="">
    <p>Номер рейса<input name="flight_number_" type="number"></p>
    <p>День вылета<input name="day_of_departure" type="text"></p>
    <p>День прилета<input name="day_of_arrival" type="text"></p>

    <input type="submit" value="Отправить"/>
</form>

<?php
//Подключение к базе даных
$servername = "localhost";//Имя сервера.
$username = "root";//Имя пользователя.
$password = "root";//Пароль.
$dbname = "planes";//Имя базы данных.

$conn = new mysqli($servername, $username, $password, $dbname);


if($conn->connect_error)
{
    die("connection failed: ".$conn->connect_error);//При ошибки соединения.
}


//СОЗДАНИЕ БАЗЫ ДАННЫХ
$sql = "CREATE DATABASE Planes";
if ($conn->query($sql) === TRUE)
{
    echo "DB created";
}

else
{
    echo "DB is not created";
}


//СОЗДАНИЕ ТАБЛИЦЫ
$sql = "CREATE TABLE Прилет_отлет(
    номер_рейса INT(50) NOT NULL PRIMARY KEY,
    день_вылета VARCHAR(50) NOT NULL,
    день_прилета VARCHAR(50) NOT NULL
)";
if ($conn->query($sql) === TRUE)
{
    echo "Table created";
}

else
{
    echo "Table is not created";
}


//ПОЛУЧЕНИЕ ДАННЫХ С ФОРМЫ 1
if (isset($_POST["flight_number"]) && isset($_POST["departure"]) && isset($_POST["destination"]) &&
    isset($_POST["number_of_passengers"])) {

    $flight_number = $conn->real_escape_string($_POST["flight_number"]);
    $departure = $conn->real_escape_string($_POST["departure"]);
    $destination = $conn->real_escape_string($_POST["destination"]);
    $number_of_passengers = $conn->real_escape_string($_POST["number_of_passengers"]);

    $sql = "INSERT INTO прибытие_отбытие (номер_рейса, пункт_отправления, пункт_назначения, кол_пассажиров)
            VALUES ('$flight_number', '$departure', '$destination', '$number_of_passengers')";

    if($conn->query($sql)){
        echo "Данные успешно добавлены";
    } else{
        echo "Ошибка: " . $conn->error;
    }
}

//ПОЛУЧЕНИЕ ДАННЫХ С ФОРМЫ 2
if (isset($_POST["flight_number_"]) && isset($_POST["day_of_departure"]) && isset($_POST["day_of_arrival"])) {

    $flight_number_ = $conn->real_escape_string($_POST["flight_number_"]);
    $day_of_departure = $conn->real_escape_string($_POST["day_of_departure"]);
    $day_of_destination = $conn->real_escape_string($_POST["day_of_arrival"]);

    $sql1 = "INSERT INTO прилет_отлет (номер_рейса, день_вылета, день_прилета)
            VALUES ('$flight_number_', '$day_of_departure', '$day_of_destination')";

    if($conn->query($sql1)){
        echo "Данные успешно добавлены";
    } else{
        echo "Ошибка: " . $conn->error;
    }
}


//ВЫВОД ОБЕИХ ТАБЛИЦ
//
//ПЕРВАЯ ТАБЛИЦА
$sql = "SELECT * FROM прибытие_отбытие";
if($result = $conn->query($sql))
{
    echo "<table>
          <h2>Таблица Прибытие отбытие</h2>
          <tr>
              <th>Номер рейса</th>
              <th>Пункт отправления</th>
              <th>Пункт назначения</th>
              <th>Количество пассажиров</th>
          </tr>";

    foreach($result as $row)
    {
        echo "<tr>";
            echo "<td>" . $row["номер_рейса"] . "</td>";
            echo "<td>" . $row["пункт_отправления"] . "</td>";
            echo "<td>" . $row["пункт_назначения"] . "</td>";
            echo "<td>" . $row["кол_пассажиров"] . "</td>";
        echo "</td>";
    }

    echo "</table>";
    $result->free();
}

//ВТОРАЯ ТАБЛИЦА
$sql = "SELECT * FROM прилет_отлет";
if($result = $conn->query($sql))
{
    echo "<table>
          <h2>Таблица Прилет отлет</h2>
          <tr>
              <th>Номер рейса</th>
              <th>День вылета</th>
              <th>День прилета</th>
          </tr>";

    foreach($result as $row)
    {
        echo "<tr>";
        echo "<td>" . $row["номер_рейса"] . "</td>";
        echo "<td>" . $row["день_вылета"] . "</td>";
        echo "<td>" . $row["день_прилета"] . "</td>";
        echo "</td>";
    }

    echo "</table>";
    $result->free();
}


?>
</body>
</html>
