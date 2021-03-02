<?php 
  session_start();

  if(!empty($_SESSION['user123'])){
    header('location:index.php');
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="img/favicon.ico" type="image/x-icon"/>

  <title>Expense Manager</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block"><img src="img/unnamed.png" width="100%"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                  </div>
                  <form class="user" id="login" v-on:keydown.enter.prevent="noop"  v-on:submit="subFunc(event)">
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" v-on:keydown.enter.prevent="loginss" v-model="email" placeholder="Enter Email Address...">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" v-on:keydown.enter.prevent="loginss" v-model="password" placeholder="Password">
                    </div>
                    <button class="btn btn-primary btn-block" v-on:click="loginss">Login</button>
                  </from>

                  <hr>
                  <div class="text-center">
                    <a class="small" href="register.php">Create an Account!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!--   Core JS Files   -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="js/axios.js"></script>
  <script src="js/vue.js"></script>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</body>

</html>

<script type="text/javascript">
  var login = new Vue({
    el: "#login",
    data:{
      email: "",
      password: "",
      value: "",
      reg: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,24}))$/
    },
    methods:{
      loginss: function(e){
        if(this.email == "" || this.email == null){
          Swal.fire({
              title: 'Oops...',
              text: 'Email still empty!',
              icon: 'error',
              timer: 2000
            });
        } 
        else if(!this.reg.test(this.email)){
          Swal.fire({
            title: 'Oops...',
            text: 'Email not valid, please enter correct email!',
            icon: 'error',
            timer: 2000
          });
        }
        else if(this.password == "" || this.password == null){
          Swal.fire({
              title: 'Oops...',
              text: 'Password still empty!',
              icon: 'error',
              timer: 2000
            });
        } 
        else{
          axios.get("loginLogin.php?email="+this.email+"&password="+this.password)
          .then(function (result) {
            login.value = result.data;
            if(login.value == "success"){
              document.location='index.php';
            } else{
              Swal.fire({
                title: 'Oops...',
                text: 'Email or Password incorrect!',
                icon: 'error',
                timer: 2000
              });
            }
          });
        }
      },
      noop: function(){
        //do nothing
      },
      subFunc: function(e){
        e.preventDefault();
      }
    }
  });

</script>