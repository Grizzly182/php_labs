<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=yandex">
    <title>Task3</title>
</head>

<body>
    <?php
    $equasion = '';
    if (isset($_POST['inputText'])) {
        $equasion = $_POST['inputText'];
    }
    $numbers = [];
    $operations = [];
    $isOk = true;

    preg_match_all('/[0-9]+/', $equasion, $numbers);
    preg_match_all('/[-+=\/^]/', $equasion, $operations);

    for($i = 0; $i < count($numbers[0]) - 1; $i++){
        if ((int) $numbers[0][$i] >= 10 && $isOk) {

            echo 'Допустимы только однозначные числа.';
            $isOk = false;
        }
    }

    if (preg_match('/[.,A-Za-zА-Яа-я!@#$%&()_|\?]/', $equasion) && $isOk) {
        echo 'Неверный ввод! Попробуйте ещё раз.';
    } else if (count($numbers) >= 7 && $isOk) {
        echo 'Слишком много значений!';
        $isOk = false;
    } else if (($operations[0][count($operations[0]) - 1] !== "=" && $isOk || count($operations[0]) !== 0) || preg_match_all('/=/',$equasion) > 1) {
        echo 'Уравнение должно заканчиваться единственным знаком "="';
        $isOk = false;
    } else if($isOk){
        $sum = 0;
        $lastNum = (int)$numbers[0][count($operations) - 1];
        for ($i = 0; $i < count($numbers[0]) - 2; $i++) {
            $sum = 8;
        }
        if($sum == $lastNum){
            echo 'Уравнение истинно.';
        }
        else{
            echo 'Уравнение ложно';
        }
    }

    ?>
    <form method="Post">
        <div>
            <p><input type="text" name="inputText"></p>
            <input type="submit" name="initButton" value="Initiate">
        </div>
    </form>
</body>

</html>