// Import the functions you need from the SDKs you need
import { getAnalytics } from "firebase/analytics";
import { initializeApp } from "firebase/app";
import { getAuth } from "firebase/auth";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
  apiKey: "AIzaSyCsDmPYwdxoaA9XGpyRoALpxd7V9XFWBvg",
  authDomain: "petgroom-bac72.firebaseapp.com",
  projectId: "petgroom-bac72",
  storageBucket: "petgroom-bac72.appspot.com",
  messagingSenderId: "135899531275",
  appId: "1:135899531275:web:20998c307bdead69281f0e",
  measurementId: "G-RZK8V3TP8H",
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const analytics = getAnalytics(app);
export const auth = getAuth.auth();
