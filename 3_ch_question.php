<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <link rel="stylesheet" href="css/question.style.css">
</head>
<body>
    <header class="full">;
    <div class="main">
    <?php
    $my_name = $_POST['my_name'];
    ?>
    <p>お疲れ様です<?php echo $my_name; ?>さん</p>

    <h2>①ネットワークのポート番号は何番？</h2>
    <form action="3_ch_answer.php" method="post">
    <div class="main">
        <?php
        $number1 = ['80','22','20','21'];
        foreach ($number1 as $value1) { ?>
        <input type="radio">
        <?php
        echo $value1;
        }
        ?>
        <?php
        if ($number1[0]) {
            $bingo;
        } else {
            $no;
        }
        ?>

    <h2>②Webページを作成するための言語は？</h2>
    <form action="3_ch_answer.php" method="post">
    <div class="main">
        <?php
        $number2 = ['PHP','Python','JAVA','HTML'];
        foreach ($number2 as $value2) { ?>
        <input type="radio">
        <?php
        echo $value2;
        }
        ?>
        ?>
        <?php
        if ($number2[3]) {
            $bingo;
        } else {
            $no;
        }
        ?>

    <br>
    <h2>③MySQLで情報を取得するためのコマンドは？</h2>
    <form action="3_ch_answer.php" method="post">
    <div class="main">
        <?php
        $number3 = ['join','select','insert','update'];
        foreach ($number3 as $value3) { ?>
        <input type="radio">
        <?php
        echo $value3;
        }
        ?>
        <?php
        if ($number3[3]) {
            $bingo;
        } else {
            $no;
        }
        ?>

    <div class="main">
      <input type="submit" value="回答する" />
    </div>
</form>
</body>
</html>