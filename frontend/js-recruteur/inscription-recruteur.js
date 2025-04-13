import { initializeApp } from "https://www.gstatic.com/firebasejs/11.6.0/firebase-app.js";
import { getAuth, createUserWithEmailAndPassword } from "https://www.gstatic.com/firebasejs/11.6.0/firebase-auth.js"; // Mise à jour ici

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




//submit button
const submit = document.getElementById("submit");
submit.addEventListener("click", function (event) {
  event.preventDefault();

  //inputs
 
  const professionalEmail = document.getElementById("professionalEmail").value.trim();
  const password = document.getElementById("password").value.trim();
 
  if (!professionalEmail || !password) {
    alert("Veuillez remplir tous les champs.");
    return;
  }

  createUserWithEmailAndPassword(auth, professionalEmail, password)
    .then((userCredential) => {
      // Signed up 
      const user = userCredential.user;
      alert("Création de compte réussie !");
      window.location.href = "/projet-HACKATON/frontend/dashboard-recruteur.php";
    })
    .catch((error) => {
      const errorCode = error.code;
      const errorMessage = error.message;
      console.error("Erreur lors de la création du compte :", errorCode, errorMessage);
      alert(`Erreur lors de la création du compte: ${errorMessage}`);
    });
});