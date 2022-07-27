<?php 
include("config.php");
include("firebaseRDB.php");
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <title>Document</title>
  </head>
  <body>
    <div class="container d-flex align-items-center flex-column justify-content-center mt-5 ms-3">
      <table class="table table-dark w-75 text-center">
        <thead>
          <th>Serial</th>
          <th>Name</th>
          <th>Action</th>
        </thead>
        <tbody id="tbody1"></tbody>
      </table>
      <?php
      $db = new firebaseRDB($databaseURL); 
          $data = $db->retrieve("patient");
          $data = json_decode($data,1);
       ?>
      <div class="card w-25 bg-primary">
        <div class="card-body text-center">
          <h4>Call :<?php
          
          print_r($data["call"]);
           ?></h4>
           <h4>Waiting :<?php
          
          print_r($data["waiting"]);
           ?></h4>
        </div>
      
    </div>
    </div>
    

    <script type="module">
      var tbody = document.getElementById("tbody1");
      var pCall = document.getElementById("btn");
      function AddItemTable(serial, name) {
        let trow = document.createElement("tr");
        let td1 = document.createElement("td");
        let td2 = document.createElement("td");
        let td3 = document.createElement("td");

        td1.innerHTML = serial;
        td2.innerHTML = name;
        td3.innerHTML =
          '<a href="action_edit.php?waiting='+serial+'"> <button id="ready" class="btn btn-success">Ready</button></a> <a href="action_edit.php?call='+serial+'"><button id="btn" class="btn btn-warning">Call</button></a>';

        trow.appendChild(td1);
        trow.appendChild(td2);
        trow.appendChild(td3);

        tbody.appendChild(trow);
      }

      function AddAllItems(patient) {
        tbody.innerHTML = "";
        patient.forEach((element) => {
          AddItemTable(element.serial, element.name);
        });
      }

      import { initializeApp } from "https://www.gstatic.com/firebasejs/9.9.0/firebase-app.js";

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
        child,
      } from "https://www.gstatic.com/firebasejs/9.9.0/firebase-database.js";
      const db = getDatabase();
      function getData() {
        const dbRef = ref(db);
        get(child(dbRef, "26 May")).then((snapshot) => {
          let patients = [];
          snapshot.forEach((childSnapshot) => {
            patients.push(childSnapshot.val());
          });
          AddAllItems(patients);
        });
      }

      window.onload = getData;
    </script>

    <script
      src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
      integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
      integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
      integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
<!-- {"name":"Nahin","serial":"03","date":"26 May","ready":"0","call":"0"} -->
