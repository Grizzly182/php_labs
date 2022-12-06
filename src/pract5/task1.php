<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
                content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=yandex">
        <title>Task1</title>
    </head>
    <body>
        <form method="POST">
        <div>
            <input type="text" name="value1" id="first" class="form-control">
        </div>
        <div>
        <input type="radio" id="plus" name="contact" value="+" checked />
      <label for="contactChoice1">+</label>
      <input type="radio" id="minus" name="contact" value="-" />
      <label for="contactChoice2">-</label>
      <input type="radio" id="multi" name="contact" value="*" />
      <label for="contactChoice3">*</label>
      <input type="radio" id="division" name="contact" value="/" />
      <label for="contactChoice4">/</label>
        </div>
        <div>
            <input type="text" name="value2" id="second" class="form-control">
        </div>
        <div>
            <input type="submit" name="executeButton" value="click">
        </div>
        </form>
                <?php if ($_POST['contact'] === '+' && !empty($_POST['value1']) && !empty($_POST['value2'])): ?>
                    <div>
                        Результат: <?php echo $_POST['value1'] + $_POST['value2'] ?>
                    </div>
                <?php endif;?>
                <?php if ($_POST['contact'] === '-' && !empty($_POST['value1']) && !empty($_POST['value2'])): ?>
                    Результат: <?php echo $_POST['value1'] - $_POST['value2'] ?>

                <?php endif;?>
                <?php if ($_POST['contact'] === '*' && !empty($_POST['value1']) && !empty($_POST['value2'])): ?>
                    Результат: <?php echo $_POST['value1'] * $_POST['value2'] ?>

                <?php endif;?>
                <?php if ($_POST['contact'] === '/' && $_POST['value2'] != 0.0 && !empty($_POST['value1']) && !empty($_POST['value2'])): ?>
                    Результат: <?php echo $_POST['value1'] / $_POST['value2'] ?>

                <?php endif;?>



    </body>
</html>
