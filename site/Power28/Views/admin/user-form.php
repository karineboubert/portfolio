<!DOCTYPE html>
<html>
<head>
    <title>Administration des utilisateurs</title>

    <?php require 'partials/head_assets.php'; ?>

</head>
<body class="index-body">
<?php require 'partials/header.php'; ?>
<div class="container-fluid">
    <section class="col-12 paddingAdmin">
        <header class="pb-3">
            <!-- Si $user existe, on affiche "Modifier" SINON on affiche "Ajouter" -->
            <h4><?php if (isset($user)): ?>Modifier<?php else: ?>Ajouter<?php endif; ?> un utilisateur</h4>
        </header>

        <?php if (isset($message)): //si un message a été généré plus haut, l'afficher ?>
            <div class="bg-danger text-white">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <!-- Si $user existe, chaque champ du formulaire sera pré-remplit avec les informations de l'utilisateur -->

        <form action="index.php?admin=userForm" method="post">
            <div class="form-group">
                <label for="firstname">Prénom :</label>
                <input class="form-control" <?php if (isset($user)): ?>value="<?php echo htmlentities($user['firstname']) ?>"<?php endif; ?> type="text" placeholder="Prénom" name="firstname" id="firstname"/>
            </div>
            <div class="form-group">
                <label for="lastname">Nom de famille : </label>
                <input class="form-control" <?php if (isset($user)): ?>value="<?php echo htmlentities($user['lastname']) ?>"<?php endif; ?> type="text" placeholder="Nom de famille" name="lastname" id="lastname"/>
            </div>
            <div class="form-group">
                <label for="company_name">Nom de votre entreprise : </label>
                <input class="form-control" <?php if (isset($user)): ?>value="<?php echo htmlentities($user['company_name']) ?>"<?php endif; ?> type="text" placeholder="Nom de votre entreprise" name="company_name" id="company_name"/>
            </div>
            <div class="form-group">
                <label for="pseudo">Pseudo : </label>
                <input class="form-control" <?php if (isset($user)): ?>value="<?php echo htmlentities($user['pseudo']) ?>"<?php endif; ?> type="text" placeholder="Pseudo" name="pseudo" id="pseudo"/>
            </div>
            <div class="form-group">
                <label for="email">Email :</label>
                <input class="form-control" <?php if (isset($user)): ?>value="<?php echo htmlentities($user['email']) ?>"<?php endif; ?> type="email" placeholder="Email" name="email" id="email"/>
            </div>
            <div class="form-group">
                <label for="password">Password : <?php if (isset($user)): ?>(uniquement si vous souhaitez modifier le mot de passe actuel) <?php endif; ?></label>
                <input class="form-control" type="password" placeholder="Mot de passe" name="password" id="password"/>
            </div>

            <div class="form-group">
                <label for="address">Adresse :</label>
                <textarea class="form-control" name="address" id="address"><?php if (isset($user)): ?><?php echo htmlentities($user['address']) ?><?php endif; ?></textarea>
            </div>
            <div class="form-group">
                <label for="postcode">Code postal : </label>
                <input class="form-control" <?php if (isset($user)): ?>value="<?php echo htmlentities($user['postcode']) ?>"<?php endif; ?> type="text" placeholder="Code Postal" name="postcode" id="postcode"/>
            </div>
            <div class="form-group">
                <label for="city">Ville : </label>
                <input class="form-control" <?php if (isset($user)): ?>value="<?php echo htmlentities($user['city']) ?>"<?php endif; ?> type="text" placeholder="Ville" name="city" id="city"/>
            </div>
            <div class="form-group">
                <label for="mobile"> Numéro de téléphone : </label>
                <input class="form-control" <?php if (isset($user)): ?>value="<?php echo htmlentities($user['mobile']) ?>"<?php endif; ?> type="text" placeholder="Numéro de téléphone" name="mobile" id="mobile"/>
            </div>
            <div class="form-group">
                <label for="is_admin"> Admin ?</label>
                <select class="form-control" name="is_admin" id="is_admin">
                    <option value="0" <?php if (isset($user) && $user['is_admin'] == 0): ?>selected<?php endif; ?>>Non
                    </option>
                    <option value="1" <?php if (isset($user) && $user['is_admin'] == 1): ?>selected<?php endif; ?>>Oui
                    </option>
                </select>
            </div>

            <div class="text-right">
                <!-- Si $user existe, on affiche un lien de mise à jour -->
                <?php if (isset($user)): ?>
                    <input class="btn greyButton" type="submit" name="update" value="Mettre à jour"/>
                    <!-- Sinon on afficher un lien d'enregistrement d'un nouvel utilisateur -->
                <?php else: ?>
                    <input class="btn blackButton" type="submit" name="save" value="Enregistrer"/>
                <?php endif; ?>
            </div>
            <!-- Si $user existe, on ajoute un champ caché contenant l'id de l'utilisateur à modifier pour la requête UPDATE -->
            <?php if (isset($user)): ?>
                <input type="hidden" name="id" value="<?php echo $user['id'] ?>"/>
            <?php endif; ?>
        </form>
    </section>
</div>
<?php require 'partials/footer.php'; ?>
</body>
</html>
