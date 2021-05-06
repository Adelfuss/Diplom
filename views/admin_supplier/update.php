<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/supplier">Управление курьерами</a></li>
                    <li class="active">Редактировать курьера</li>
                </ol>
            </div>


            <h4>Редактировать курьера #<?php echo $id; ?></h4>

            <br/>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post" enctype="multipart/form-data">

                        <p>Название курьера</p>
                        <input type="text" name="name" placeholder="" value="<?php echo $user['name']; ?>">

                        <p>Почта</p>
                        <input type="text" name="email" placeholder="" value="<?php echo $user['email']; ?>">

                        <p>Номер телефонна</p>
                        <input type="text" name="phone_number" placeholder="" value="<?php echo $user['phone_number']; ?>">

                        <br/><br/>

                        <p>Пароль</p>
                        <input type="text" name="password" placeholder="" value="<?php echo $user['password']; ?>">

                        <p>Изображение курьера</p>
                        <img src="" width="200" alt="" />
                        <input type="file" name="user_logo" placeholder="" value="<?php echo $user['user_logo']; ?>">
                        <br/><br/>
                        <input type="hidden" name="logo" value="<?php echo $user['user_logo']; ?>">
                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">

                        <br/><br/>

                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>


