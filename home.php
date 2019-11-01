<?php
    include 'include/connection.php';
    session_start();
    if(empty($_SESSION['user_email'])){
      header('location:signin.php');
    }

 ?>
  <!-- Image and text -->
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://fonts.googleapis.com/css?family=Roboto|Courgette|Pacifico:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <link rel="stylesheet" href="css/style.css">
    <title>Log In To Chat App</title>

  </head>
  <body>
    <!-- Image and text -->
    <nav class="navbar navbar-light bg-light">
      <a class="navbar-brand text-center" href="#">

        Chat With Your Friend
      </a>
      <a class="nav-link" href="home.php"><?php echo $_SESSION['name']; ?></a>
      <a class="nav-link" href="logout.php">Logout</a>
    </nav>
      <div class="container-fluid h-100">
			<div class="row justify-content-center h-100">
				<div class="col-md-4 col-xl-3 chat">
          <div class="card mb-sm-3 mb-md-0 contacts_card">
  					<div class="card-header">
  						<div class="input-group">
  							<input type="text" placeholder="Search..." name="" class="form-control search">
  							<div class="input-group-prepend">
  								<span class="input-group-text search_btn"><i class="fas fa-search"></i></span>
  							</div>
  						</div>
  					</div>
  					<div class="card-body contacts_body">
  						<ul class="list-group" id="friendList">


  						</ul>
  					</div>
  					<div class="card-footer"></div>
				</div>
      </div>
				<div class="col-md-8 col-xl-6" id="user_model_details">

				</div>
			</div>
		</div>

    <h1><?php echo $_SESSION['user_email']; ?></h1>
    <h1><?php echo $_SESSION['name']; ?></h1>

  </body>
  </html>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
  integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
  crossorigin="anonymous"></script>


  <script>
    $(document).ready(function(){
      //Auto refresh for online offline status
        setInterval(function() {
          fetchUser();
          chat_history();

        },1000);
        fetchUser();
        function fetchUser(){
          $.ajax({
            url:'all_friends.php',
            method:'POST',
            success:function(data){
                $("ul#friendList").html(data);
            }
          })
        }


        //making dailog box function
        function make_chat_dialog_box(user_id,user_name){
          var modal_content = '<div id="user_dialog_'+user_id+'" class="user_dialog" title="You have chat with '+user_name+'">';
          modal_content += '<div style="height:400px; border:1px solid #ccc; overflow-y: scroll; margin-bottom:24px; padding:16px;" class="chat_history" data-user_id="'+user_id+'" id="chat_history_'+user_id+'">';
          modal_content += '</div>';
          modal_content += '<div class="form-group">';
          modal_content += '<textarea name="chat_message_'+user_id+'" id="chat_message_'+user_id+'" class="form-control"></textarea>';
          modal_content += '</div><div class="form-group" align="right">';
          modal_content+= '<button type="button" name="send_chat" id="'+user_id+'" class="btn btn-info send_chat">Send</button></div></div>';


          $('#user_model_details').html(modal_content);

       }

       //make dailog box after click
       $(document).on('click','li.chat', function(){
          var user_id = $(this).data('userid');
          var user_name = $(this).data('username');
          make_chat_dialog_box(user_id,user_name);
          $("#user_dialog_"+user_id).dialog({
            autoOpen:false,
            width:400
          });
          $('#user_dialog_'+user_id).dialog('open');

       });


       //store message into database after click send button
       $(document).on('click','button.send_chat',function(){
         var user_id=$(this).attr('id');
         var chat_message=$('#chat_message_'+user_id).val();
         $.ajax({
           url:'insert.php',
           method:'POST',
           data:{user_id:user_id,chat_message:chat_message},
           success:function(data){
             $('#chat_message_'+user_id).val('');
             $('#chat_history_'+user_id).html(data);
           }
         })
       });

       //auto refresh chat message
       function chat_history(){
         $('.chat_history').each(function(){
            var to_user_id = $(this).data('user_id');
            fetch_history(to_user_id);
            // $('#chat_history_'+to_user_id).animate({
            //   scrollTop: $('#chat_history_'+to_user_id)[0].scrollHeight});
         });
       }


       //fetch history message
       function fetch_history(user_id){

         $.ajax({
           url:'chat_history.php',
           method:'POST',
           data:{user_id:user_id},
           success:function(data){
             $('#chat_history_'+user_id).html(data);
           }
         })

       }

       //close dialog box
       $(document).on('click', '.ui-button-icon', function(){
          $('.user_dialog').dialog('destroy').remove();
       });

    });
</script>


</body>
</html>
