<?php include ROOT . '/views/layouts/header_admin.php'; ?>
<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li class="active">Управление курьерами</li>
                </ol>
            </div>

            <a href="/admin/supplier/create" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить курьера</a>

            <h4>Список товаров</h4>

            <br/>

            <table class="table-bordered table-striped table">
                <tr>
                    <th>ID курьера</th>
                    <th>Имя</th>
                    <th>Почта</th>
                    <th>Номер телефона</th>
                    <th>Роль</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach ($supplierList as $supplier): ?>
                    <tr>
                        <td><?php echo $supplier['id']; ?></td>
                        <td><?php echo $supplier['name']; ?></td>
                        <td><?php echo $supplier['email']; ?></td>
                        <td><?php echo $supplier['phone_number']; ?></td>
                        <td><?php echo $supplier['role']; ?></td>
                        <td><a href="/admin/supplier/update/<?php echo $supplier['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                        <td><a href="/admin/supplier/delete/<?php echo $supplier['id']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>

        </div>
    </div>
</section>
<?php include ROOT . '/views/layouts/footer_admin.php'; ?>
