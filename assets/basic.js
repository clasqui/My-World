//Basic Javascript File

function validateForm()
{
    
//Validació Nom
var name=document.forms["register"]["name"].value;
if (name==null || name=="")
  {
  alert("El nom complet ha d'estar emplenat");
  return false;
  }

//Validació nom d'usuari
var user=document.forms["register"]["user"].value;
if (user==null || user=="")
  {
  alert("El nom d'usuari ha d'estar emplenat");
  return false;
  }

//Validació correu electrònic
var email=document.forms["register"]["email"].value;
if (email==null || email=="")
  {
  alert("El correu ha d'estar emplenat");
  return false;
  }
var atpos=email.indexOf("@");
var dotpos=email.lastIndexOf(".");
if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length)
  {
  alert("Adreça de correu no vàlida");
  return false;
  }

//Validació contrassenyes
var password=document.forms["register"]["password"].value;
if (password==null || password=="")
  {
  alert("La contrassenya ha d'estar emplenada");
  return false;
  }else if (password.length < 4){
    alert("la contrassenya ha de tenir 4 caràcters o més");
    return false;
  }
  
var repassword=document.forms["register"]["re-password"].value;
if (repassword==null || repassword=="")
  {
  alert("Torna a escriure la contrassenya");
  return false;
  }
  
if (password != repassword){
    alert("Les contrassenyes no coincideixen");
    return false;
    }



}

function getUrlVars() {
    var vars = {};
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
        vars[key] = value;
    });
    return vars;
}

if( getUrlVars()["error"] == "email"){
    alert("El correu electrònic ja s'està utilitzant");
}

if (getUrlVars()["error"] == "username"){
    alert("El nom d'usuari ja existeix");
}

//modifiacio de dades de usuari a profile.php

function modify(element, value, name){
  document.getElementById(element).innerHTML = "<form action='change.php' method='post'><input type='text' name='"+name+"' value='"+value+"' /><input type='submit' value='Canvia' /></form>";
}
