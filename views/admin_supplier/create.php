<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/supplier">Управление курьерами</a></li>
                    <li class="active">Редактировать товар</li>
                </ol>
            </div>


            <h4>Добавить нового курьера</h4>

            <br/>

            <?php if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="/admin/supplier/create" method="post" enctype="multipart/form-data">

                        <p>Название курьера</p>
                        <input type="text" name="name" placeholder="" value="">

                        <p>Почта</p>
                        <input type="text" name="email" placeholder="" value="">

                        <p>Номер телефона</p>
                        <input type="text" name="phone_number" placeholder="" value="">

                        <br/><br/>

                        <p>Пароль</p>
                        <input type="password" name="password" placeholder="" value="">

                        <p>Изображение курьера</p>
                        <input type="file" name="user_logo" placeholder="" value="">

                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">

                        <br/><br/>

                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>


