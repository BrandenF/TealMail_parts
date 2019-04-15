<?php
session_start();
 require 'includes/contactListdb.php';
 $name = $_SESSION['name'];
 $id = $_SESSION['id'];
echo "Hello ".$name;
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/foundation.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/app.css">
  </head>
  <body>
    <h1 class="text-center" id="bann">TEAL MAIL</h1>
    <div class="grid-container" id="dash">
      <div class="grid-x grid-margin">

        <div class="cell medium-2 text-center" id="sideBar">
          <button class="button button-rounded-hover" id="send">SEND</button><br>
          <button class="button button-rounded-hover" id="in">INBOX</button><br>
          <button class="button button-rounded-hover" id="out">OUTBOX</button><br>
          <p>Contact List</p>
          <input type="text" onkeyup="searchList()" placeholder="Search.." id="search">
          <div id="contacts">
            <button type="button" id="addUser">Add User?</button>
            <p id="add"></p>
          </div>
        </div>

        <div class="cell medium-10" id="msg">
          <h1 class="text-center">Messages Go Here</h1>
        </div>

      </div>
    </div>

    <?php
    echo '<form id="frm1" action="includes/logout.php">
              <button type="submit" name="signup-submit">Log Out</button>
         </form>';
     ?>

    <script>
    function searchList() {
      var input, filter, ul, li, a, i, txtValue;
      document.getElementById("add").innerHTML = "";
      input = document.getElementById("search");
      filter = input.value.toUpperCase();
      ul = document.getElementById('contactList');
      li = ul.getElementsByTagName('li');
      addBtn = document.getElementById("addUser");
      var z = 0;
      addBtn.style.display= "none";
      for(i = 0; i < li.length; i++){
        txtValue = li[i].textContent || li[i].innerText;
        if(txtValue.toUpperCase().indexOf(filter) > -1) {
          li[i].style.display = "";

        }
        else {
          li[i].style.display = "none";
          z++;
        }
        if(z >= li.length) {
          addBtn.style.display = "";
        }
        else {
          addBtn.style.display = "none";
        }
      }

    }
    $(document).ready(function(){
      document.getElementById('addUser').style.display = "none";
      $(function(){
        $('#addUser').click(function(){
          var input = document.getElementById("search").value;
          
        });
      });


      //Gets list from db
      var contacts = <?php echo getContactList($id); ?>;
      function makeContactUl() {
        var list = document.createElement('ul');
        list.setAttribute("id","contactList");
        for(var i = 0; i < contacts.length; i++) {
          var name = contacts[i].name;
          var id = contacts[i].id;
          var item = document.createElement('li');
          item.setAttribute("class","liEl");
          item.setAttribute("id",id);
          item.appendChild(document.createTextNode(name));
          list.appendChild(item);
        }
        return list;
      }
      document.getElementById('contacts').appendChild(makeContactUl());

      //CLick in list
      $(function(){
        $('.liEl').click(function(){
          var id = this.id;
          alert(id);
        });
      });



    });

    </script>


  </body>
</html>
