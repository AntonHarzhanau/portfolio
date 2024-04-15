document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById('contactForm');
    form.addEventListener('submit', formSend);

    async function formSend(e){
        e.preventDefault();
        
        let error = formValidate(form);
        let formData = new FormData(form);

        if (error){
            let response = await fetch('../requests/addContact.php', {
                method: 'POST',
                body: formData
            });
            if (response.ok){
                let result = await response.json();
                alert(result.status);
                form.reset();
            }else{
                alert("error");
            }
        }
    }

    function formValidate(form){
        var errors = [];
  var name = document.getElementById("input_name");
  var email = document.getElementById("input_email");
  var commentaire = document.getElementById("input_message");
  
  if (name.validity.valid === false) {
    errors.push(messages.error_name);
  }
  if (email.validity.valid === false) {
      errors.push(messages.error_mail);
  }
  if (commentaire.validity.valid === false) {
      errors.push(messages.error_message);
  }

  var errorDiv = form.querySelector("div.errors");
  if (errors.length > 0) {
      // On empêche le navigateur de soumettre les données :
      event.preventDefault();

      // On affiche les messages d'erreurs à l'utilisateur :
      errorDiv.style.display = 'block';
      var html = '<ul>';
      for (var i = 0; i < errors.length; i++) {
          html += '<li>' + errors[i] + '</li>';
      }
      html += '</ul>';
      errorDiv.innerHTML = html;

      return false;
    }
    else {
        // Si pas d'erreur, on retire les messages d'erreur de l'affichage.
        errorDiv.style.display = 'none';
    }
   
    return true;
    }
});