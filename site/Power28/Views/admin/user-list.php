<!DOCTYPE html>
<html>
<head>
    <title>Administration des utilisateurs</title>
    <?php require 'partials/head_assets.php'; ?>
</head>
<body class="index-body">
    <?php require 'partials/header.php'; ?>
<div class="container-fluid">

    <div class="row my-3 index-content">
        <?php require 'partials/nav.php'; ?>

        <section class="col-12 paddingAdmin">
            <header class="pb-4 d-flex justify-content-between">
                <h4>Liste des utilisateurs</h4>
                <a class="btn blackButton " href="index.php?admin=userForm">Ajouter un utilisateur</a>
            </header>

            <?php if(isset($message)): //si un message a été généré plus haut, l'afficher ?>
                <div class="bg-success text-white p-2 mb-4">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>

            <?php if($users): ?>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Prénom</th>
                        <th>Nom</th>
                        <th>Pseudo</th>
                        <th>Email</th>
                        <th>Admin</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($users as $user): ?>

                        <tr><!-- htmlentities sert à écrire les balises html sans les interpréter -->
                            <th><?php echo htmlentities($user['id']); ?></th>
                            <td><?php echo htmlentities($user['firstname']); ?></td>
                            <td><?php echo htmlentities($user['lastname']); ?></td>
                            <td><?php echo htmlentities($user['pseudo']); ?></td>
                            <td><?php echo htmlentities($user['email']); ?></td>
                            <td><?php echo htmlentities($user['is_admin']); ?></td>
                            <td>
                                <a href="index.php?admin=userForm&user_id=<?php echo $user['id']; ?>&action=edit" class="btn greyButton">Modifier</a>
                                <a onclick="return confirm('Êtes-vous sûre?')" href="index.php?admin=user&user_id=<?php echo $user['id']; ?>&action=delete" class="btn btn-danger">Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                Aucun utilisateur enregistré.
            <?php endif; ?>
        </section>
    </div>
</div>
    <?php require 'partials/footer.php'; ?>
</body>
</html>
