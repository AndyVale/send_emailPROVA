let content = document.getElementById("cTextbox");
let fontFamily = document.getElementById("fontFamily");
let fontSize = document.getElementById("fontSize");
function PrintDoc()
{
  let doc = window.open();
  doc.document.write(content.innerHTML);
  doc.document.close();
  doc.print();
  doc.close();
}
function fontChange(){
  content.style.fontFamily = fontFamily.value;
}
function Size(){
  console.log("Viva la vita");
  content.style.fontSize = fontSize.value + "pt";
  for (i = 0; i < fontFamily.length; i ++){
    fontFamily[i].style.fontFamily = fontFamily[i].innerHTML
  }
}




const LoadEmail= async () => {
  alert("funzione chiamata");
  let email = {
    'object' : "questo e' l'oggetto",
    'text' : document.getElementById("cTextbox").innerHTML
  };
  alert(email['text']);

  let res = await fetch('send_email.php', {
    'method': 'POST',
    'headers': {
      'Content-Type': 'application/json; charset=utf-8'
    },
    body: JSON.stringify(email)
  });
  let data = await res.json();
  console.log(data);
  alert("funzione finita");
}



 /*let LadEmail = async () =>{
  alert("funzione chiamata");
  let email = {
    'object' : "questo è l'oggetto",
    'text' : document.getElementById("cTextbox").innerHTML
  };
  alert(email['text']);
  


  //lancio la chiamatafetch per mandare i dati allo script php
    fetch ('send_email.php', {
    'method': 'POST',
    'headers': {
      'Content-Type': 'application/json; charset=utf-8'
    },
    'body': JSON.stringify(email) 
  })
  .then(response => {
    if (!response.ok){
      throw new Error('HTTP error ' + response.status);
    } else {
      return  response.json();
    }
  })
  .then(data => {
    console.log(data);
  })
  .catch(error => {
    console.log("non passa");
    console.error('Si è verificato un errore', error);
    
  });

  alert("funzione finita");
}*/