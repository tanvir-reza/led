<!--  -->

<div id="waiting" style="display: none;">
    <?php
        if($_GET["waiting"]){
          $waiting = $_GET["waiting"]; 
          echo htmlspecialchars($waiting); 
        }
        
    ?>
</div>
<div id="call" style="display: none;">
    <?php
        if($_GET["call"]){
          $call = $_GET["call"]; 
          echo htmlspecialchars($call); 
        }
    ?>
</div>
<script script="module">
    var wait = document.getElementById("waiting");
    var waiting = parseInt(wait.textContent);
    var calling = document.getElementById("call");
    var call = parseInt(caling.textContent);
    import { initializeApp } from "https://www.gstatic.com/firebasejs/9.9.0/firebase-app.js";
      import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.9.0/firebase-analytics.js";

      const firebaseConfig = {
        apiKey: "AIzaSyB4sSDy2IgUIe4QvOP8Bpey8yGoGlef8FU",
        authDomain: "iotproject-4aa58.firebaseapp.com",
        databaseURL:
          "https://iotproject-4aa58-default-rtdb.europe-west1.firebasedatabase.app",
        projectId: "iotproject-4aa58",
        storageBucket: "iotproject-4aa58.appspot.com",
        messagingSenderId: "561865774199",
        appId: "1:561865774199:web:8ffa2edc8b68f59bdee272",
        measurementId: "G-QQFXWSZF5T",
      };

      const app = initializeApp(firebaseConfig);

      import {
        getDatabase,
        ref,
        onValue,
        get,
        update,
        remove,
        child,
      } from "https://www.gstatic.com/firebasejs/9.9.0/firebase-database.js";
      
      function updateOnDb(){
        if(waiting){
        function UpdateData(){
        update(ref(db,"patient"),{
          waiting: waiting
        })
        .then(()=>{
          location.href = 'index.html';
        })
        .catch((err)=>{
          alert("Fail");
        })
      }
      }
      else if(call){
        function UpdateData(){
        update(ref(db,"patient"),{
          call: call
        })
        .then(()=>{
          location.href = 'index.html';
        })
        .catch((err)=>{
          alert("Fail");
        })
      }
      }
      }

      window.onload = updateOnDb;
      
    </script>