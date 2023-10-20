<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
    <form method="POST" action="traitement.php">
        <label for="name">Votre nom</label>
        <input type="text" id="name" name="name" placeholder="Entrez votre nom" required>
        <br />
        <label for="firstname">Votre prénom</label>
        <input type="text" id="firstname" name="firstname" placeholder="Entrez votre prénom" required>
        <br />
        <label for="email">Votre email</label>
        <input type="text" id="email" name="email" placeholder="Entrez votre email" required>
        <br />
        <label for="password">Votre mot de passe</label>
        <input type="password" id="password" name="password" placeholder="Entrez votre mot de passe" required>
        <br />
        <label for="recrute">Vous êtes un recruteur ?</label>
        <input type="checkbox" id="recrute" name="recrute">
        <br />
        <div id="checkCompany" style="display: none;">
            <label for="company">Votre Entreprise</label>
            <input type="text" id="company" name="company" placeholder="Entrez votre Entreprise">
        </div>
        <input type="submit" value="M'inscrire" name="ok">
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function(){
            const recrute = document.getElementById('recrute');
            const checkCompany = document.getElementById('checkCompany');

            recrute.addEventListener('change', function(){
                if(recrute.checked){
                    checkCompany.style.display = 'block';
                } else {
                    checkCompany.style.display = 'none';
                }
            });
        });
    </script>
</body>
</html>