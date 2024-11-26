<?php // calendar.php
echo "Календарь ";

function printCalendar($month = null, $year = null)
{
    // Если параметры не заданы, используем текущий месяц и год
    if ($month === null && $year === null) {
        $month = date('n'); // Текущий месяц
        $year = date('Y');
    }

    $daysInMonth = date('t', mktime(0, 0, 0, $month, 1, $year));
    $firstDayOfMonth = date('w', mktime(0, 0, 0, $month, 1, $year));
    $holidays = [
        '1-1',  // 1 января
        '8-3',  // 8 марта
        '1-5',  // 1 мая
        '9-5',  // 9 мая
        '25-12'  // 25 декабря
    ];

    // Выводим заголовок
    echo "<h3>" . date("F Y", mktime(0, 0, 0, $month, 1, $year)) . "</h3>";
    echo "<table border='1'>";
    echo "<tr>
            <th>Вс</th>
            <th>Пн</th>
            <th>Вт</th>
            <th>Ср</th>
            <th>Чт</th>
            <th>Пт</th>
            <th>Сб</th>
          </tr><tr>";

    // Добавляем пустые ячейки для дней перед первым днем месяца
    for ($i = 0; $i < $firstDayOfMonth; $i++) {
        echo "<td></td>";
    }

    // Выводим дни месяца
    for ($day = 1; $day <= $daysInMonth; $day++) {
        // Определяем цвет для ячейки
        $color = '';
        $dateString = $day . '-' . $month;

        if (date('w', mktime(0, 0, 0, $month, $day, $year)) == 0 || date('w', mktime(0, 0, 0, $month, $day, $year)) == 6) {
            $color = 'style="background-color: lightcoral;"';
        }

        if (in_array($dateString, $holidays)) {
            $color = 'style="background-color: lightgreen;"';
        }

        // Выводим день с цветом
        echo "<td $color>$day</td>";

        // Если это последний день недели, начинаем новую строку
        if (($day + $firstDayOfMonth) % 7 == 0) {
            echo "</tr><tr>";
        }
    }

    echo "</tr></table>";
}

printCalendar(10, 2023);
printCalendar();
?>
