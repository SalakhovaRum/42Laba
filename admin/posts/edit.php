<?php
include "../../path.php";
include "../../app/controllers/posts.php";
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/fa4d582593.js" crossorigin="anonymous"></script>

    <!-- Custom Styling -->
    <link rel="stylesheet" href="../../assets/css/admin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <title>Information portal</title>
</head>
<body>

<?php include("../../app/include/header-admin.php"); ?>

<div class="container">
    <?php include "../../app/include/sidebar-admin.php"; ?>
    <div class="posts col-9">
        <div class="row title-table">
            <h2>Редактирование записи</h2>
        </div>
        <div class="row add-post">
            <div class="mb-12 col-12 col-md-12 err">
                <!-- Вывод массива с ошибками -->
                <?php include "../../app/helps/errorInfo.php" ?>
            </div>
            <form action="edit.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?=$id; ?>">
                <div class="col">
                    <input value="<?=$post['title']; ?>" name="title" type="text" class="form-control" placeholder="Tittle" aria-label="Название статьи">
                </div>
                <div class="col">
                    <label for="editor" class="form-label">Содержимое записи</label>
                    <textarea name="content" id="editor" class="form-control" id="content" rows="6"><?=$post['content']; ?></textarea>
                </div>
                <div class="input-group col">
                    <input name="img" type="file" class="form-control" id="inputGroupFile02">
                    <label class="input-group-text" for="inputGroupFile02">Заменить файл</label>
                </div>
                <select name="topic" class="form-select" aria-label="Default select example">
                    <?php foreach ($topics as $key => $topic): ?>
                        <option value="<?=$topic['id'];?>"><?=$topic['name'];?></option>
                    <?php endforeach; ?>
                </select>
                <div class="form-check">
                    <?php if (empty($publish) && $publish == 0):  ?>
                        <input name="publish" class="form-check-input" type="checkbox"  id="flexCheckChecked" >
                        <label class="form-check-label" for="flexCheckChecked">
                            Опубликовать
                        </label>
                    <?php else: ?>
                        <input name="publish" class="form-check-input" type="checkbox"  id="flexCheckChecked" checked >
                        <label class="form-check-label" for="flexCheckChecked">
                            Опубликовать
                        </label>
                    <?php endif; ?>
                </div>
                <div class="col col-6">
                    <button name="edit_post" class="btn btn-primary" type="submit">Сохранить запись</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>


<!-- footer -->
<?php include ("../../app/include/footer.php"); ?>

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
<!-- Добавление визуального редактора к текстовому полю админки -->
<script scr="https://cdn.ckeditor.com/ckeditor5/27.0.0/classic/ckeditor.js"></script>


<script src="../../assets/js/scripts.js"></script>
</body>
</html>

