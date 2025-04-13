import { initializeApp } from "https://www.gstatic.com/firebasejs/11.6.0/firebase-app.js";
import { getAuth, createUserWithEmailAndPassword, GoogleAuthProvider, signInWithPopup, sendEmailVerification } from "https://www.gstatic.com/firebasejs/11.6.0/firebase-auth.js";

const firebaseConfig = {
  apiKey: "AIzaSyBLVewIoMzGKIbxbbBmMQoJtJQgnOaf-74",
  authDomain: "plateforme-intelligente.firebaseapp.com",
  projectId: "plateforme-intelligente",
  storageBucket: "plateforme-intelligente.firebasestorage.app",
  messagingSenderId: "591528984268",
  appId: "1:591528984268:web:4a5430f6264a3a1c4a4c69"
};

const app = initializeApp(firebaseConfig);
const auth = getAuth(app);
auth.languageCode = "en"; 
const provider = new GoogleAuthProvider();

//google button
const googleButton = document.getElementById("google-login-btn");
googleButton.addEventListener("click", function (event) {
  signInWithPopup(auth, provider)
  .then((result) => {
    const credential = GoogleAuthProvider.credentialFromResult(result);
    const user = result.user;
    console.log(user);
    window.location.href = "/projet-HACKATON/frontend/accueil.php";
    alert("Connexion réussie !");
  }).catch((error) => {
    const errorCode = error.code;
    const errorMessage = error.message;
  });
});

//submit button
const submit = document.getElementById("submit");
submit.addEventListener("click", function (event) {
  event.preventDefault();

  //inputs
  const email = document.getElementById("email").value.trim();
  const password = document.getElementById("password").value.trim();

  if (!email || !password) {
    alert("Veuillez remplir tous les champs.");
    return;
  }

  createUserWithEmailAndPassword(auth, email, password)
    .then((userCredential) => {
      const user = userCredential.user;

      // Envoyer un email de vérification
      sendEmailVerification(user)
        .then(() => {
          alert("Un email de vérification a été envoyé.");
       
          window.location.href = "/projet-HACKATON/frontend/message-verification.php";
        })
        .catch((error) => {
          console.error("Erreur lors de l'envoi de l'email de vérification :", error);
         })
        .catch((error) => {
          console.error("Erreur lors de la création du compte :", error.code, error.message);
          alert(`Erreur lors de la création du compte: ${error.message}`);
        });

        

 
      const errorCode = error.code;
      const errorMessage = error.message;
      console.error("Erreur lors de la création du compte :", errorCode, errorMessage);
      alert(`Erreur lors de la création du compte: ${errorMessage}`);
    });
});