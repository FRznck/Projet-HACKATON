import { initializeApp } from "https://www.gstatic.com/firebasejs/11.6.0/firebase-app.js";
import { getAuth, signInWithEmailAndPassword } from "https://www.gstatic.com/firebasejs/11.6.0/firebase-auth.js"; 

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

//submit button
const submit = document.getElementById("submit");
submit.addEventListener("click", function (event) {
  event.preventDefault();

  //inputs
  const email = document.getElementById("email").value;
  const password = document.getElementById("password").value;

  signInWithEmailAndPassword(auth, email, password)
    .then((userCredential) => {
      // Connexion réussie 
      const user = userCredential.user;
      alert("Connexion réussie !");
      window.location.href = "accueil.php"; // Redirection après connexion
    })
    .catch((error) => {
      const errorCode = error.code;
      const errorMessage = error.message;
      alert("Erreur lors de la connexion : " + errorMessage); // Message d'erreur
    });
});