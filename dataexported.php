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
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  <!--   Core JS Files   -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="js/axios.js"></script>
  <script src="js/vue.js"></script>

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

      <li class="nav-item">
        <a class="nav-link" href="note.php">
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

      <li class="nav-item active">
        <a class="nav-link" href="#">
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
            <h1 class="h3 mb-0 text-gray-800">Data Exported</h1>
          </div>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table" id="manage">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>File Name</th>
                      <th>Date Created</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for='manage in displayedPosts'>
                      <td>{{ manage.name_report }}</td>
                      <td>{{ manage.filename }}</td>
                      <td>{{ manage.report_created_at }}</td>
                      <td>
                        <a :href="'file/'+ manage.filename" target="_blank" class="btn btn-sm btn-warning"><i class="fa fa-eye"></i></a>
                        <button class="btn btn-sm btn-danger" v-on:click="deleteData(manage.id_report, manage.filename)">
                          <i class="fa fa-trash"></i>
                        </button>
                      </td>
                    </tr>
                  </tbody>
                </table>

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
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/js-cookie@rc/dist/js.cookie.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

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
      value: "",
      filename: "",
      dataget: ""
    },
    methods:{
    	ambil: function(){
    		axios.get('dataexportedShow.php?id_user=<?php echo $_SESSION['user123'] ?>')
    		.then(function (result) {
    			manage.list_manage = result.data;
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
      deleteData: function(value, filename){
        manage.value = value;
        manage.filename = filename;
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
            axios.get('dataexportedDelete.php?id_user=<?php echo $_SESSION['user123'] ?>&id_report='+manage.value+'&filename='+manage.filename)
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
        })
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