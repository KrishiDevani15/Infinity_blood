
const firebaseConfig = {
  apiKey: "AIzaSyAkNUJ25L_Ho5xEC5UU47NRx7CDHur6MlY",
  authDomain: "chatapp-b78ad.firebaseapp.com",
  databaseURL: "https://chatapp-b78ad-default-rtdb.firebaseio.com",
  projectId: "chatapp-b78ad",
  storageBucket: "chatapp-b78ad.appspot.com",
  messagingSenderId: "852582237554",
  appId: "1:852582237554:web:6e2a37de5e07f0df6ac9eb",
  measurementId: "G-B4C4ZPRY90"
};
firebase.initializeApp(firebaseConfig);


var messagesRef = firebase.database().ref('messages');

document.getElementById('contactForm').addEventListener('submit', submitForm);


function submitForm(e){
  e.preventDefault();

  
  var name = getInputVal('name');
  var company = getInputVal('company');
  var email = getInputVal('email');
  var phone = getInputVal('phone');
  var message = getInputVal('message');

  
  saveMessage(name, company, email, phone, message);

  
  document.querySelector('.alert').style.display = 'block';

  
  setTimeout(function(){
    document.querySelector('.alert').style.display = 'none';
  },3000);

  
  document.getElementById('contactForm').reset();
}

// Function to get get form values
function getInputVal(id){
  return document.getElementById(id).value;
}

// Save message to firebase
function saveMessage(name, company, email, phone, message){
  var newMessageRef = messagesRef.push();
  newMessageRef.set({
    name: name,
    company:company,
    email:email,
    phone:phone,
    message:message
  });
}