<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vérification Email</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }
        .container {
            margin-top: 50px;
            padding: 20px;
        }
        h1 {
            color: #333;
        }
        p {
            color: #555;
        }
        a {
            color: #007BFF;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Vérifiez votre email</h1>
        <p>Un email de vérification vous a été envoyé. Veuillez consulter votre boîte de réception et cliquer sur le lien de vérification pour activer votre compte.</p>
        <p>Si vous n'avez pas reçu l'email, vérifiez votre dossier de spam ou <button id="resend-verification"><a href="#" style="text-decoration: none;">cliquez ici</a></button> pour renvoyer l'email.</p>
    </div>

    <script type="module">
        import { getAuth, sendEmailVerification } from "https://www.gstatic.com/firebasejs/11.6.0/firebase-auth.js";

        const auth = getAuth();
        const resendButton = document.getElementById("resend-verification");

        resendButton.addEventListener("click", () => {
            const user = auth.currentUser;
            if (user) {
                sendEmailVerification(user)
                    .then(() => {
                        alert("Un nouvel email de vérification a été envoyé.");
                    })
                    .catch((error) => {
                        console.error("Erreur lors de l'envoi de l'email de vérification :", error);
                        alert("Erreur lors de l'envoi de l'email de vérification.");
                    });
            } else {
                alert("Aucun utilisateur connecté.");
            }
        });
    </script>
</body>
</html>