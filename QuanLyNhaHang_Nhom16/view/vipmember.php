<!-- <?php include_once("layout.php") ?> -->
<?php 
    require('../model/db.php');
    require('../controller/vip_memberController.php');
    $KHs = get_KH();
    ?>
<?php if($KHs) { ?>

<section id="list" class="list">
    <header class="list__row list__header">
        <h1>
            MEMBER List
        </h1>
    </header>

    <?php foreach ($KHs as $KH) : ?>
        <?php if($KH['DEL'] ==0) { ?>
    <div class="list__row">
        <div class="list__item">
            <p class="bold"><?php echo $KH['TEN_KHACH_HANG'] ?></p>
        </div>
        <div class="list__removeItem">
            <form action="" method="post">
                <input type="hidden" name="action" value="delete_KH">
                <input type="hidden" name="ma_KH_del" value="<?= $KH['MA_KHACH_HANG']; ?>">
                <button class="remove-button">❌</button>
            </form>
        </div>
    </div>
    <?php } endforeach; ?>
</section>
<?php } else { ?>
<p>No categories exist yet.</p>
<?php } ?>
<html>
    <div>
        <form action="" method="post">
            <input type="text" name ="ma_KH">
            <input type="text" name ="ten_KH">
            <input type="text" name ="SDT">
            <button type= "submit">SUBMIT </button>
        </form>
    </div>
</html>
<?php 
    if(!empty($_POST["ma_KH"])){
    $ma_KH = $_POST["ma_KH"];
    $ten_KH = $_POST["ten_KH"];
    $SDT = $_POST["SDT"];
    add_KH($ma_KH, $ten_KH, $SDT );
    header("Location: ./vipmember.php");

    }
    ?>
<?php
    if(!empty($_POST["ma_KH_del"])){
    $ma_KH_del = $_POST["ma_KH_del"];
    delete_KH($ma_KH_del);
    header("Location: .?ma_KH_del=$ma_KH_del");
    header("Location: ./vipmember.php");
    }
    ?>