<?php
// On fait un require once pour évite les appels multiples du type "cette fonction existe deja, bis..."
require_once 'functions.php';

// Si cette variable n'est pas vide, des données ont été postée et on est bien dans une phase de traitement
if(!empty($_POST)){
    // Je traiterais les erreurs possibles des champs dans un tableau vide
    $errors = array();
    require_once 'inc/db.php';

    // Ensuite on parcours les variables des champs pour voir si on rencontre des erreures et on alimente le tableau avec
    // On commence donc pas vérifier que le champ observé n'est pas vide
    if(empty($_POST['username']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['username'])){
        $errors['username'] = "Le nom d'utilisateur entré n'est pas valide";
    }

    if(empty($_POST['email']) /*|| !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)*/){
        $errors['email'] = "L'email entré n'est pas valide";
    } else {
        // Si le champ est correct on vérifie l'unicité de l'email
        $req = $pdo->prepare('SELECT id FROM users WHERE email = ?');
        // Execution de la requète avec le param recherché
        $req->execute([$_POST['email']]);
        // Ais-je eu des resultat ? fetch récupère le premier enregistrement
        $user = $req->fetch();
        // Si un on a deja un user correspondant a cet email, alors on a une erreur
        if($user){
            $errors['email'] = "Cet email est déjà utilisé.";
        }
    }

    if(empty($_POST['password']) /*|| $_POST['password'] != $_POST['password_confirm']*/){
        $errors['password'] = "Le mot de passe entré n'est pas valide";
    }

    // S'il n'y'a pas d'erreur, je charge ma bdd, je prépare ma requète et je pourrais continuer
    if(empty($errors)){
        // On utilise les requètes préparées, qu'on pourra réutiliser
        $req = $pdo->prepare("INSERT INTO users SET username = ?, email = ?, password = ?, confirmation_token = ?");
        // On utilisera password_hash (inclus dans php natif) pour chiffrer le mdp. Param1: le mdp en clair, param2: l'algo a utiliser
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        // On va générer le token de confirmaiton aléatoirement dans une nouvelle fonction
        $token = str_random(60);

        // On va envoyer les données en clair pour les champs noms et prénoms, mais pour les mots de passe il faut sécuriser cela pour éviter les injections sql !
        $req->execute([$_POST['username'], $_POST['email'], $password/*, $token*/]);

        // Récupération du dernier id généré par PDO pour mettre dans le lien du message envoyé
        $user_id = $pdo->lastInsertId();
        // On va générer un mail de confirmation(email de l'user, le sujet, le contenu)
        mail($_POST['email'],
            'Confirmation de votre compte',
            "Afin de valider votre compte, cliquez sur ce lien\n\nhttp://localhost/login-page-max/confirm.php?id=$user_id&token=$token");
        // Redirrection vers la page de connexion
        header('login.php');
        exit();

        debug($errors);
    }

}
?>

<?php require  'index.php'; ?>

<!-- Messages d'erreur en haut du formulaire, au cas où on créer de nouvelles erreures on va les mettre dans une boucle et affiché en liste -->
<?php if(!empty($errors)): ?>
    <div class="alert alert-danger">
        <p>Vous n'avez pas rempli le formulaire correctement</p>
        <ul>
            <?php foreach($errors as $error): ?>
                <li><?= $error; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
