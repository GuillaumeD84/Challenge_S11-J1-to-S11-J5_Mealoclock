var app = {
  basePath: '/Challenges/Challenge_S11-J1-to-S11-J5_Mealoclock',
  init: function() {
    // console.log(location.pathname);
    // On ajoute un event sur le bouton de connexion
    $('#loginBtn').on('click', app.authentication);

    // On ajoute un event sur le bouton d'inscription
    $('#signupBtn').on('click', app.registration);
  },
  authentication: function(evt) {
    // On empêche le bouton de soumettre le formulaire
    evt.preventDefault();

    // On récupère les valeurs des champs remplis par l'utilisateur
    var email = $('#email').val();
    var password = $('#password').val();

    // On effectue une requête AJAX en POST
    $.ajax(app.basePath + '/login', {
      method: 'POST',
      data: {
        email: email,
        password: password
      },
      dataType: 'json',
      success: function(auth) {
        // auth est retourné par la méthode login du MemberController
        // auth vaut true si la combinaison email + mdp est valide
        if (auth) {
          // On redirige vers la home si tout est OK
          app.redirect('/');
        }
        else {
          // On affiche un message d'erreur dans l'autre cas
          if (!$('#failed').length) {
            // On créé la div
            var container = $('<div>').attr('id', 'failed').addClass('col-6 offset-3');
            var msg = $('<p>').text('Echec de l\'authentification').addClass('alert alert-danger');

            // On l'affiche sur la page
            container.append(msg);
            $('.row .col-12.text-center').append(container);
          }
        }
      }
    });
  },
  registration: function(evt) {
    // On empêche le bouton de soumettre le formulaire
    evt.preventDefault();

    // On récupère les valeurs des champs remplis par l'utilisateur
    var firstName = $('#firstname').val();
    var lastName = $('#lastname').val();
    var email = $('#email').val();
    var password = $('#password').val();
    var passwordConfirm = $('#confirm_password').val();
    var address = $('#address').val();

    console.log(firstName, lastName, email, password, passwordConfirm, address);

    // On effectue une requête AJAX en POST
    $.ajax(app.basePath + '/signup', {
      method: 'POST',
      data: {
        first_name: firstName,
        last_name: lastName,
        email: email,
        password: password,
        confirm_password: passwordConfirm,
        address: address
      },
      dataType: 'json',
      success: function(errors) {
        // errors est retourné par la méthode signup du MemberController
        // errors contient la liste des champs invalide lors de l'inscription
        if (errors.length === 0) {
          // On redirige vers la page de connexion si tout est OK
          app.redirect('/login');
        }
        else {
          // On affiche un message d'erreur dans l'autre cas
          if ($('#failed').length) {
            $('#failed').remove();
          }
          // On créé la div
          var container = $('<div>').attr('id', 'failed').addClass('col-6 offset-3');
          var list = $('<ul>').addClass('alert alert-danger');

          for (var index in errors) {
            list.append($('<li>').text(errors[index]));
          }

          // On l'affiche sur la page
          container.append(list);
          $('.row .col-12.text-center').append(container);
        }
      }
    });
  },
  redirect: function(path) {
    // Redirige l'utilisateur vers la page passée en paramètre
    $(location).attr('href', app.basePath + path);
  },
  initMap: function(lat, lng) {
    var uluru = {lat: lat, lng: lng}
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 12,
      center: uluru
    });
    var marker = new google.maps.Marker({
      position: uluru,
      map: map
    });
  }
};

$(app.init);
