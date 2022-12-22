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

    $nums = [];
    $ops = [];

    preg_match_all('/[0-9]+/', $equasion, $numbers);
    preg_match_all('/[-+=\/^]/', $equasion, $operations);

    foreach ($numbers[0] as $num) {
        $nums[] = (int) $num;
    }

    foreach ($operations[0] as $operation) {
        $ops[] = $operation;
    }

    for ($i = 0; $i < count($nums) - 1; $i++) {
        if ($nums[$i] >= 10 && $isOk) {
            echo 'Допустимы только однозначные числа.';
            $isOk = false;
        }
    }

    for ($i = 1; $i < strlen($equasion); $i += 2) {
        if ($equasion[$i - 1] === '=') {
            break;
        }
        if ($equasion[$i] !== ' ') {
            echo 'Между значениями и операциями должен быть пробел.';
            $isOk = false;
            break;
        }
    }
    $equasion = str_replace(' ', '', $equasion);

    if (preg_match('/[.,A-Za-zА-Яа-я!@#$%&()_|\?]/', $equasion) && $isOk || $equasion === '') {
        echo 'Неверный ввод! Попробуйте ещё раз.';
        $isOk = false;
    } else if (count($numbers[0]) > 6 && $isOk) {
        echo 'Слишком много значений!';
        $isOk = false;
    } else if (($ops[count($ops) - 1] !== '=' && $isOk) || count($ops) === 0 || preg_match_all('/=/', $equasion) > 1) {
        echo 'Уравнение должно заканчиваться единственным знаком "="';
        $isOk = false;
    } else if ($isOk) {
        $sum = $nums[0];
        $lastNum = $nums[count($nums) - 1];
        $lastNumber = 0;
        for ($i = 1; $i < strlen($equasion) - 2; $i += 2) {
            switch ($equasion[$i]) {
                case '/':
                    $dividingByZero = (int) $equasion[$i + 1] === 0;
                    if ($equasion[$i + 2] === '^' && !$dividingByZero) {
                        $sum /= pow((int) $equasion[$i + 1], (int) $equasion[$i + 3]);
                        $i += 2;
                    } else if (!$dividingByZero) {
                        $sum /= (int) $equasion[$i + 1];
                    } else {
                        echo 'Делить на ноль нельзя';
                        $isOk = false;
                    }
                    break;
                case '*':
                    if ($equasion[$i + 2] === '^') {
                        $sum *= pow((int) $equasion[$i + 1], (int) $equasion[$i + 3]);
                        $i += 2;
                    } else
                        $sum *= (int) $equasion[$i + 1];
                    break;
                case '+':
                    if ($equasion[$i + 2] === '^') {
                        $sum += pow((int) $equasion[$i + 1], (int) $equasion[$i + 3]);
                        $i += 2;
                    } else
                        $sum += (int) $equasion[$i + 1];
                    break;
                case '-':
                    if ($equasion[$i + 2] === '^') {
                        $sum -= pow((int) $equasion[$i + 1], (int) $equasion[$i + 3]);
                        $i += 2;
                    } else
                        $sum -= (int) $equasion[$i + 1];
                    break;
            }
        }
        if ($sum == $lastNum && $isOk) {
            echo 'Уравнение истинно.';
        } else if ($isOk) {
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