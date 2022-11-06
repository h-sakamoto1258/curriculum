<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <link rel="stylesheet" href="css/answer.style.css">
</head>
<body>
    <header class="full">;
    <div class="main">
    <?php
    $my_name = $_POST['my_name'];
    ?>
    <p><?php echo $my_name; ?>さんの結果は・・？</p>

    <p>①の答え</p>
    <?php
    if ($number1 = $bingo) {
        echo "正解！";
    } else {
        echo "残念・・";
    }
    ?>

    <p>②の答え</p>
    <?php
    if ($number2 == $bingo) {
        echo "正解！";
    } else {
        echo "残念・・";
    }
    ?>

    <p>③の答え</p>
    <?php
    if ($number3 == $bingo) {
        echo "正解！";
    } else {
        echo "残念・・";
    }
    ?>