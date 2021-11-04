<?php 
  session_start();

  if (!isset($_SESSION['user123']) || $_SESSION['user123'] == ''){
    header('location:login.php');
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

  <!-- Custom fonts for this template -->
  <link href="resources/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-text mx-3">Expense Manager</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Menu
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="income.php">
          <i class="fas fa-fw fa-dollar-sign"></i>
          <span>Income</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="expense.php">
          <i class="fas fa-fw fa-money-bill"></i>
          <span>Expense</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="transaction.php">
          <i class="fas fa-exchange-alt"></i>
          <span>Transaction</span>
        </a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="#">
          <i class="fas fa-fw fa-sticky-note"></i>
          <span>Note</span>
        </a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Report
      </div>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="report.php">
          <i class="fas fa-calendar-day"></i>
          <span>Report</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="dataexported.php">
          <i class="fas fa-sticky-note"></i>
          <span>Data Exported</span>
        </a>
      </li>


      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['name_user'] ?></span>
                <img class="img-profile rounded-circle" src="img/360_F_64676383_LdbmhiNM6Ypzb3FM4PPuFP9rHe7ri8Ju.jpg">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
           <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Note</h1>
          </div>

          <div class="clearfix">
            <div class="float-left">
              <button class="mr-3 mb-3 btn btn-success" data-toggle="modal" data-target="#addTransModal">
    		        <i class="fa fa-plus"></i>&nbsp; Add Note
    		      </button>
            </div>
          </div>

          <!-- DataTales Example -->
          <div class="row" id="manage">
            <div class="col-xl-4 col-sm-6 mb-3" v-for='manage in displayedPosts'>
              <div class="card text-white o-hidden h-100" style="background-color: rgb(255, 130, 70)">
                <div class="card-header" style="background-color: rgba(0, 0, 0, 0.03)">
                  <span class="float-left text-white font-weight-bold">{{ manage.date }}</span>
                  <span class="btn-group-sm float-right">
                    <button class="btn btn-sm btn-warning" v-on:click="viewData(manage.id_note)" data-toggle="modal" data-target="#viewDataModal">
                      <i class="fa fa-eye"></i>
                    </button>
                    <button class="btn btn-sm btn-success" v-on:click="editData(manage.id_note)" data-toggle="modal" data-target="#editDataModal">
                      <i class="fa fa-edit"></i>
                    </button>
                    <button class="btn btn-sm btn-danger" v-on:click="deleteData(manage.id_note)">
                      <i class="fa fa-trash"></i>
                    </button>
                  </span>
                </div>

                <div class="card-body">
                  <div class="card-body-icon mt-5">
                    <i class="text-white fas fa-fw fa-sticky-note"></i>
                  </div>
                  <div>{{ manage.name_note }}</div>
                  <div class="font-weight-bold printNoteText">{{ manage.note_text }}</div>
                </div>
              </div>
            </div>

            <div class="clearfix btn-group col-md-12 offset-md-5">
              <ul class="pagination">
                <li class="page-item">
                  <button type="button" class="page-link" v-if="page != 1 && page !=2" @click="page--"> < </button>
                </li>
                <li class="page-item">
                  <button type="button" class="page-link"  v-for="pageNumber in pages.slice(page-1, page)" v-if="page != 1" @click="page = pageNumber-1"> {{pageNumber - 1}} </button>
                  <button type="button" class="page-link bg-primary text-white" v-for="pageNumber in pages" v-if="page == pageNumber" @click="page = pageNumber"> {{pageNumber}} </button>
                  <button type="button" class="page-link" v-for="pageNumber in pages.slice(page-1, page+2)" v-if="page != pageNumber" @click="page = pageNumber"> {{pageNumber}} </button>
                </li>
                <li class="page-item">
                  <button type="button" @click="page++" v-if="page < pages.length && pages.length > 2" class="page-link"> > </button>
                </li>
              </ul>
            </div>

            <!-- View Modal-->
            <div class="modal fade" id="viewDataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Edit Data <span id="dataName"></span></h4>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="form-group col-md-12">
                      <label for="names2">Name :
                      </label>
                      <input type="text" class="form-control" id="names2" v-model="names2" readonly>
                    </div>

                     <div class="form-group col-md-12">
                      <label for="date2">Date :
                      </label>
                      <input type="text" class="form-control" id="date2" v-model="date2" readonly>
                    </div>

                    <div class="form-group col-md-12">
                      <label for="text2">Text :
                      </label>
                      <textarea class="form-control" id="text2" v-model="text2" style="resize: none;" rows="10" readonly></textarea> 
                    </div>

                  </div>
                </div>
              </div>
            </div>

            <!-- Edit Modal-->
            <div class="modal fade" id="editDataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Edit Data <span id="dataName"></span></h4>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="form-group col-md-12">
                      <label for="names2">Name :
                        <span class="text-danger" id="errorNames2" style="display: none;">Name still empty!</span>
                      </label>
                      <input type="text" class="form-control" id="names2" v-model="names2" required>
                      
                      <label for="text2">Text :
                        <span class="text-danger" id="errorText2" style="display: none;">Text still empty!</span>
                      </label>
                      <textarea class="form-control" id="text2" v-model="text2" style="resize: none;" rows="10" required></textarea> 

                    </div>
                  </div>
                  <div class="modal-footer">
                    <button class="btn btn-primary" v-on:click="edits">Edit</button>
                  </div>
                </div>
              </div>
            </div>

          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="loginLogout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Transcation Modal-->
  <div class="modal fade" id="addTransModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content" id="insert">
        <div class="modal-header">
          <h4 class="modal-title">Add Note</h4>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group col-md-12">
            <label for="names">Name :
              <span class="text-danger" id="errorNames" style="display: none;">Name still empty!</span>
            </label>
            <input type="text" class="form-control" id="names" v-model="names" v-on:input="checkNames" required>

            <label for="date">Date :
              <span class="text-danger" id="errorDate" style="display: none;">Date still empty!</span>
            </label>
            <input type="date" class="form-control" id="date" v-model="date" v-on:input="checkDate" required>
            
            <label for="text">Text :
              <span class="text-danger" id="errorText" style="display: none;">Text still empty!</span>
            </label>
            <textarea class="form-control" id="text" v-model="text" v-on:input="checkText"
            style="resize: none;" rows="7" required></textarea> 

          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" v-on:click="tambah">Add</button>
        </div>
      </div>
    </div>
  </div>

  <!--   Core JS Files   -->
  <script src="resources/jquery/jquery.min.js"></script>
  <script src="js/axios.js"></script>
  <script src="js/vue.js"></script>

  <!-- Bootstrap core JavaScript-->
  <script src="resources/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="resources/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/js-cookie@rc/dist/js.cookie.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  <script src="js/isMobile.js"></script>

</body>

</html>

<script type="text/javascript">
	var manage = new Vue({
		el: "#manage",
		data:{
			list_manage: [],
      page: "1",
      perPage: 9,
      pages: [],
      list_manage2: [],
      value: "",
      names2: "",
      text2: "",
      dataget: ""
    },
    methods:{
    	ambil: function(){
        if(Cookies.get('currentpage')){
          this.page = Cookies.get('currentpage');
          Cookies.remove('currentpage');
        } else{
          this.page = 1;
        }
    		axios.get('noteShow.php?id_user=<?php echo $_SESSION['user123'] ?>')
    		.then(function (result) {
    			manage.list_manage = result.data;
          for(var i=0; i<manage.list_manage.length; i++){
            manage.list_manage[i].note_text = manage.list_manage[i].note_text.split("<br>").join("\n");
          }
        });

    	},
      setPages(){
          var numberOfPages = Math.ceil(this.list_manage.length / this.perPage);
          for (var i = 1; i <= numberOfPages; i++) {
              this.pages.push(i);
          }
      },
      paginate(list_manage){
          var page = this.page;
          var perPage = this.perPage;
          var from = (page * perPage) - perPage;
          var to = (page * perPage);
          return  list_manage.slice(from, to);
      },
      viewData: function(value){
        manage.value = value;
        axios.get('noteEdit.php?id_user=<?php echo $_SESSION['user123'] ?>&id_note='+manage.value)
        .then(function (result) {
          manage.list_manage2 = result.data;
          manage.names2 = manage.list_manage2[0].name_note;
          manage.date2 = manage.list_manage2[0].date;
          manage.text2 = manage.list_manage2[0].note_text;
          manage.text2 = manage.text2.split("<br>").join("\n");
        });
      },
      editData: function(value){
        manage.value = value;
        axios.get('noteEdit.php?id_user=<?php echo $_SESSION['user123'] ?>&id_note='+manage.value)
        .then(function (result) {
          manage.list_manage2 = result.data;
          manage.names2 = manage.list_manage2[0].name_note;
          manage.text2 = manage.list_manage2[0].note_text;
          manage.text2 = manage.text2.split("<br>").join("\n");
        });
      },
      edits: function(){
        var textDatabase = this.text2.replaceAll("\n","<br>");
        axios.get('noteEditData.php?id_user=<?php echo $_SESSION['user123'] ?>&id_note='+this.value+'&name_note='+this.names2+'&note_text='+textDatabase)
        .then(function (result) {
          manage.dataget = result.data;
          if(manage.dataget == "success"){
              Cookies.set('successedit', 'yes', { expires: 1 });
              Cookies.set('currentpage', manage.page, { expires: 1 });
              manage.dataget = "";
              location.reload();
          } else{
            Swal.fire({
              title: 'Oops...',
              text: 'Failed!',
              icon: 'error',
              timer: 2000
            });
          }
        });
      },
      deleteData: function(value){
        manage.value = value;
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!',
          reverseButtons: true
        }).then((result) => {
          if(result.isConfirmed) {
            axios.get('noteDeleteData.php?id_user=<?php echo $_SESSION['user123'] ?>&id_note='+manage.value)
            .then(function (result) {
              manage.dataget = result.data;
              if(manage.dataget == "success"){
                Cookies.set('successdelete', 'yes', { expires: 1 });
                Cookies.set('currentpage', manage.page, { expires: 1 });
                manage.dataget = "";
                location.reload();
              }
            });
          }
        });
      },
    },
    computed: {
      displayedPosts () {
          return this.paginate(this.list_manage);
      }
    },
    watch: {
      list_manage () {
          this.setPages();
      }
    },
    created(){
      this.ambil();
    }
	});
  
	var insert = new Vue({
		el: "#insert",
		data:{
			list_category: [],
			names: "",
			text: "",
			date: "",
      value: ""
    },
    methods:{
      checkNames: function(){
        $('#errorNames').hide();
      },
      checkText: function(){
        $('#errorAmmount').hide();
      },
      checkDate: function(){
        $('#errorDate').hide();
      },
    	tambah: function(){
        if(this.names == "" || this.names == null){
          $('#errorNames').show();
        } 
        if(this.text == "" || this.text == null){
          $('#errorText').show();
        } 
        if(this.date == "" || this.date == null){
          $('#errorDate').show();
        }
        if(this.names != "" && this.names != null && this.text != "" && this.text != null && this.date != "" && this.date != null){
          var textDatabase = this.text.replaceAll("\n","<br>");
          axios.get("noteAdd.php?id_user=<?php echo $_SESSION['user123'] ?>&name_note=" +this.names+ "&note_text=" +textDatabase+ "&date=" +this.date)
          .then(function (result) {
            insert.value = result.data;
            if(insert.value == "success"){
              Cookies.set('successadd', 'yes', { expires: 1 });
              insert.value = "";
              location.reload();
            } else{
              Swal.fire({
                title: 'Oops...',
                text: 'Failed!',
                icon: 'error',
                timer: 2000
              });
            }
          });
    		}
    	},
    },
	});

  if(Cookies.get('successadd')){
    Swal.fire({
      title: 'Added...',
      text: 'Data entered successfully!',
      icon: 'success',
      showConfirmButton: false,
      timer: 2000
    })
    .then(() => {
      Cookies.remove('successadd');
    });
  }

  if(Cookies.get('successedit')){
    Swal.fire({
      title: 'Edited...',
      text: 'Data edited successfully!',
      icon: 'success',
      showConfirmButton: false,
      timer: 2000
    })
    .then(() => {
      Cookies.remove('successedit');
    });
  }

  if(Cookies.get('successdelete')){
    Swal.fire({
      title: 'Deleted...',
      text: 'Data has been deleted!',
      icon: 'success',
      showConfirmButton: false,
      timer: 2000
    }).then(() => {
      Cookies.remove('successdelete');
    });
  }
</script>