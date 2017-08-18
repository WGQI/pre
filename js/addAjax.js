$('#submit').click(function(e){
              var emailFromForm=$('#email').val();
              var passwordFromForm=$('#password').val();
              e.preventDefault();
              $.post( 'php/addPerson.php',{'email': emailFromForm, 'password': passwordFromForm},
                  function(data) {
                      $('#msg').text(data.message);
                      if(data.reg=="1"){
                          $('#personalTable').append("<tr>" +
                          "<td>"+data.id+"</td>" +
                          "<td>"+emailFromForm+"</td>" +
                          "<td>"+passwordFromForm+"</td>" +
                          "<td>"+data.date+"</td>" +
                          "<td><button class='button'id='"+data.id+"' disabled>Удалить</button></td>" +
                          "</tr>"
                      );
                      }
                  }, 'json');
});