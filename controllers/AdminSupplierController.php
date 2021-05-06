<?php


class AdminSupplierController extends AdminBase
{
    public function actionIndex()
    {
        self::checkAdmin();
        $supplierList = User::getAllSuppliers();
        require_once ROOT . '/views/admin_supplier/index.php';
        return true;
    }

    public function actionCreate()
    {
        self::checkAdmin();
        if (isset($_POST['submit'])) {
            $options['name'] = $_POST['name'];
            $options['email'] = $_POST['email'];
            $options['password'] = $_POST['password'];
            $options['role'] = 'supplier';
            $options['phone_number'] = $_POST['phone_number'];
            if ( $_FILES['user_logo']['error'] == UPLOAD_ERR_OK ) {
                $options['user_logo'] = basename( $_FILES['user_logo']['name'] );
                move_uploaded_file( $_FILES['user_logo']['tmp_name'], ROOT . '/template/images/suppliers_photos/' . $options['user_logo']);
            }
            $errors = false;
            if ($errors == false) {
                $id = User::createUser($options);
                header("Location: /admin/supplier");
                exit();
            }
        }
        require_once ROOT . '/views/admin_supplier/create.php';
        return true;
    }

    public function actionDelete($id)
    {
        self::checkAdmin();
        if (isset($_POST['submit'])) {
            User::deleteUserById($id);
            header("Location: /admin/supplier");
            exit();
        }
        require_once(ROOT . '/views/admin_supplier/delete.php');
        return true;
    }

    public function actionUpdate($id)
    {
        self::checkAdmin();
        // Получаем данные о конкретном заказе
        $user = User::getUserById($id);

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы редактирования. При необходимости можно валидировать значения
            $options['name'] = $_POST['name'];
            $options['email'] = $_POST['email'];
            $options['password'] = $_POST['password'];
            $options['phone_number'] = $_POST['phone_number'];
            $options['logo'] = $_POST['logo'];
            if ($_FILES['user_logo']['error'] == UPLOAD_ERR_OK ) {
                $options['user_logo'] = basename( $_FILES['user_logo']['name'] );
                move_uploaded_file( $_FILES['user_logo']['tmp_name'], ROOT . '/template/images/shop/' . $options['user_logo']);
            } else {
                $options['user_logo'] = $options['logo'];
            }
            // Перенаправляем пользователя на страницу управлениями товарами
            if ($isValid = User::updateUserById($id,$options)) {
                header("Location: /admin/supplier");
                exit();
            }
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_supplier/update.php');
        return true;
    }
}