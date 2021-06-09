<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Prototype de page de connexion et inscription</title>
</head>
<body>
    <div class="container" id="container">
        <div class="forms-container">
            <div class="signin-signup">

                <form method="POST" action="login.php" class="sign-in-form" id="form">
                    <h2 class="title">Connexion</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="username" placeholder="Nom d'utilisateur" required>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" placeholder="Email" required>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Mot de passe" required>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-coins"></i>
                        <select name="roles">
                            <option value="default_role" disabled selected>Rôle</option>
                            <option value="guest">Invité</option>
                            <option value="user">Utilisateur</option>
                            <option value="admin">Administrateur</option>
                        </select>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-link"></i>
                        <input type="text" placeholder="Mot de passe oublié ?">
                    </div>
                    <input type="submit" class="btn solid" value="Connexion">
                </form>


                <form  method="POST" action="" class="sign-up-form" id="form">
                    <h2 class="title">Inscription</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="username" placeholder="Nom d'utilisateur" required>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-coins"></i>
                        <select name="roles">
                            <option value="default_role" disabled selected>Rôle</option>
                            <option value="guest">Invité</option>
                            <option value="user">Utilisateur</option>
                            <option value="admin">Administrateur</option>
                        </select>
                    </div>
                    <input type="submit" class="btn" value="Inscription">
                </form>

            </div>
        </div>
        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <img src="img/Mapstime_Logo_blanc.png" class="image">
                    <h3>Nouveau Mapstimer ?</h3>
                    <p>Rejoignez-nous dès maintenant en cliquant sur le bouton ci-dessous !</p>
                    <button class="btn transparent" id="sign-up-btn">Inscription</button>
                    <button type="button" class="btn transparent" onclick="toDark()">Dark theme</button>
                    <button type="button" class="btn transparent" onclick="toLight()">Light theme</button>
                </div>
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <img src="img/Mapstime_Logo_blanc.png" class="image"/>
                    <h3>Déja inscrit ?</h3>
                    <p>Connectez-vous à votre espace utilisateur via le bouton ci-dessous !</p>
                    <button class="btn transparent" id="sign-in-btn">Connexion</button>
                    <button type="button" class="btn transparent" onclick="toDark()">Dark theme</button>
                    <button type="button" class="btn transparent" onclick="toLight()">Light theme</button>
                </div>
            </div>
        </div>
    </div>
<script src="app.js"></script>
</body>
</html>
