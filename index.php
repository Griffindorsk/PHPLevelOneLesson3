<?php
// Урок 3. Задание 1.
echo "Урок 3. Задание 1.<br>";
$a = 0;
echo $a;
while ($a <= 100) {
    $a++;
    if (($a % 3) == 0) echo ", " . $a;
}

// Урок 3. Задание 2.
echo "<br><br>Урок 3. Задание 2.<br>";
$a = 0;
do {
    if (($a != 0) AND ($a % 2 == 0)) {
        echo $a . " - четное число<br>";
    } elseif ($a == 0) {
        echo $a . " - ноль<br>";
    } else {
        echo $a . " - нечетное число<br>";
    }
    $a++;
} while ($a <=10);

// Урок 3. Задание 3.
echo "<br>Урок 3. Задание 3.<br>";
$regions = [];
$regions["Московская область"] = ["Москва", "Зеленоград", "Клин"];
$regions["Ленинградская область"] = ["Санкт-Петербург", "Всеволожск", "Павловск", "Кронштадт"];
$regions["Рязанская область"] = ["Рязань", "Константиново","Михайлов","Костино", "Шилово", "Сапожок"];
echo "<ul>";
foreach ($regions as $key => $value) {
    echo "<li>" . $key . ":</li>";
    $i = 0;
    foreach ($value as $subkey => $subvalue) {
        $i++;
        if ($i == count($value)) {
            echo $subvalue . ".";
        } else {
            echo $subvalue . ", ";
        }
    }
}
echo "</ul>";

// Урок 3. Задание 4.
echo "<br>Урок 3. Задание 4.<br>";
$russianSymbols = ["а","б","в","г","д","е","ж","з","и","й","к","л","м","н","о","п","р","с","т","у","ф","х","ц","ч","ш","щ","ъ","ы","ь","э","ю","я","ё"];
$russianTranscription = ["a","b","v","g","d","e","zh","z","i","j","k","l","m","n","o","p","r","s","t","u","f","kh","ts","ch","sh","sch","'","y","'","e","yu","ya","jo"];
$transcription = [];
for ($i = 0; $i < 33; $i++) {
    $key = "" . $russianSymbols[$i];
    $transcription[$key] = $russianTranscription[$i];
}
// foreach ($transcription as $key => $value) {//проверяем, что содержит массив
//     echo "key = " . $key . "; value = " . $value . "<br>";
// }

function russianToLatin($string, $transcription) {
    $latinWord = "";
    for ($i = 0; $i < mb_strlen($string); $i++) {
        $trans = mb_substr($string,$i,1);
        if (((mb_ord($trans, "UTF-8") >=1072) AND (mb_ord($trans, "UTF-8") <=1103)) OR (mb_ord($trans, "UTF-8") ==1105)) {
            $latinWord = $latinWord . $transcription[$trans];
        } else {
            $latinWord = $latinWord . $trans;
        }
    }
    return $latinWord;
}
$cyrillic = "скажи кто ты неизвестный %username%";
echo $cyrillic . " - <i>исходная фраза</i><br>" . russianToLatin($cyrillic, $transcription) . " - <i>транслитерация</i>";//проверка работы функции

//Урок 3. Задание 5.
echo "<br><br>Урок 3. Задание 5.<br>";
function spaceChange($string) {
    $phrase = "";
    for ($i = 0; $i < mb_strlen($string); $i++) {
        $trans = mb_substr($string,$i,1);
        if (mb_ord($trans, "UTF-8") == 32) {
            $phrase = $phrase . mb_chr(95, "UTF-8");
        } else {
            $phrase = $phrase . $trans;
        }
    }
    return $phrase;
}
$string = "расскажите немного о себе";
echo $string . " - <i>исходная фраза</i><br>" . spaceChange($string) . " - <i>преобразованная фраза</i>";

//Урок 3. Задание 6.
echo "<br><br>Урок 3. Задание 6.<br>";
$title = "генерация меню в php";
$menu = [
    "Главная" => "main.php",
    "Работа" => "work.php",
    "Задачи" => "tasks.php",
    "Решения" => "solutions.php",
    "Контакты" => "contacts.php"];
$menu_content = "<ul>";
foreach ($menu as $key => $value) {
    $menu_content = $menu_content . '<li><a href="' . $value . '">' . $key . '</a></li>';
}
$menu_content = $menu_content . "</ul>";
include "menu.php";

// Урок 3. Задание 7.
echo "<br><br>Урок 3. Задание 7.<br>";
for ($i = 0; $i <= 9; print ($i . " "), $i++) {}

// Урок 3. Задание 8.
echo "<br><br>Урок 3. Задание 8.<br>";//база регионов и городов из 3-го задания выше
echo "<ul>";
foreach ($regions as $key => $value) {
    echo "<li>" . $key . ":</li>";
    $i = 0;
    $k_cities = 0;
    foreach ($value as $subkey => $subvalue) {
        if (mb_substr($subvalue,0,1) == "К") {
            $k_cities++;
        }
    }
    foreach ($value as $subkey => $subvalue) {
        if (mb_substr($subvalue,0,1) == "К") {
            $i++;
            if ($i == $k_cities) {
            echo $subvalue . ".";
            } else {
            echo $subvalue . ", ";
            }
        }
    }
}
echo "</ul>";

// Урок 3. Задание 9.
echo "<br>Урок 3. Задание 9.<br>";
function allInOne($string, $transcription) {
return spaceChange(russianToLatin($string, $transcription));
}
echo allInOne("строка с пробелами", $transcription);

?>