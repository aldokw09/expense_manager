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

  <!-- Custom styles for this page -->
  <link href="resources/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  <!--   Core JS Files   -->
  <script src="resources/jquery/jquery.min.js"></script>
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
      <li class="nav-item active">
        <a class="nav-link" href="#">
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
        <div class="container-fluid" id="manage">

          <!-- Page Heading -->
           <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Report</h1>
            <button href="#" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#exportDataModal">
              <i class="fas fa-download fa-sm text-white-50"></i> Export Data
            </button>
          </div>

          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="col-md-10">
              <select class="form-control col-md-4 d-inline" v-model="categorys" required>
                <option disabled value="">--Select Category--</option>
                <option v-for="categoryss in list_categorys " 
                        :value="categoryss.id_category" v-if="categoryss.type_category == '1'" class="text-success">
                      {{ categoryss.name_category }} (Income)
                </option>
                <option v-for="categoryss in list_categorys " 
                        :value="categoryss.id_category" v-if="categoryss.type_category == '2'" class="text-danger">
                      {{ categoryss.name_category }} (Expense)
                </option>
              </select>
              <button class="mr-3 mb-1 btn btn-success d-inline" v-on:click="search">
                <i class="fa fa-search"></i>&nbsp; Search
              </button>
              <div id="searchLoading" style="display: none;">Loading...</div>
            </div>
            <div class="btn border border-success text-success px-4" id="balance" style="cursor: default;">
                Total : <br> <span class="h5 font-weight-bold">Rp {{ total }},-</span>
            </div>
          </div>


          

          <!-- DataTales Example -->
          <div class="card shadow mt-4 mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Name</th>
                      <th>Ammount</th>
                      <th>Category</th>
                      <th>Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for='(manage, i) in list_manage'>
                      <td>{{ i }}	</td>
                      <td>{{ manage.names }}</td>
                      <td v-if="manage.ammount_ex == '0'" class="text-success font-weight-bold">+{{ manage.ammount_in }}</td>
                      <td v-else class="text-danger font-weight-bold">-{{ manage.ammount_ex }}</td>
                      <td>{{ manage.name_category }}</td>
                      <td>{{ manage.date }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <!-- Export Modal-->
          <div class="modal fade" id="exportDataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Export Data to CSV</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">
                    <label for="datefrom">From :</label>
                    <input type="date" class="form-control" id="datefrom" v-model="datefrom" required>
                    <br>
                    <label for="dateto">To :</label>
                    <input type="date" class="form-control" id="dateto" v-model="dateto" required>
                </div>
                <div class="modal-footer">
                  <button class="btn btn-primary" v-on:click="exportss">Export</button>
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
          <a class="btn btn-primary" href="loginLogout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="resources/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="resources/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  <script src="js/isMobile.js"></script>

</body>

</html>

<script type="text/javascript">
	var manage = new Vue({
		el: "#manage",
		data:{
			list_manage: [],
      list_categorys: [],
      categorys: "",
      datefrom: "",
      dateto: "",
      total: "0"
    },
    methods:{
    	ambil: function(){
    		axios.get('transactionShow.php?id_user=<?php echo $_SESSION['user123'] ?>')
    		.then(function (result) {
    			manage.list_manage = result.data;
          });

    	},
      categorysss: function(){
        axios.get('transactionFormCategory.php')
        .then(function (result) {
          manage.list_categorys = result.data;
          });
      },
      search: function(){
        $("#searchLoading").show();
        axios.get("reportBalance.php?id_user=<?php echo $_SESSION['user123'] ?>&category=" +this.categorys)
        .then(function (result) {
          manage.total = result.data;
          manage.total = formatRupiah(manage.total);
          });

        axios.get("reportShow.php?id_user=<?php echo $_SESSION['user123'] ?>&category=" +this.categorys)
        .then(function (result) {
          manage.list_manage = result.data;
          for($i=0; $i<manage.list_manage.length; $i++){
            manage.list_manage[$i].ammount_in = formatRupiah(manage.list_manage[$i].ammount_in);
          }
          $("#searchLoading").hide();
          });
      },
      exportss: function(){
        if(this.datefrom != "" && this.dateto != ""){
          if(this.categorys != "" && this.categorys != null){
            axios.get("reportExport.php?id_user=<?php echo $_SESSION['user123'] ?>&datefrom=" +this.datefrom+ "&dateto=" +this.dateto+"&category=" +this.categorys)
            .then(function () {
              Swal.fire({
                title: 'Success...',
                text: 'Data exported successfully!',
                icon: 'success',
                showConfirmButton: false,
                timer: 2000
              });
              $('#exportDataModal').modal('hide');
            });
          }
          else{
            Swal.fire({
              title: 'Oops...',
              text: 'Select a category first!',
              icon: 'error',
              timer: 2000
            });
          }
        }
        else{
          Swal.fire({
            title: 'Oops...',
            text: 'Select date first!',
            icon: 'error',
            timer: 2000
          });
        }
      }
    },
    created(){
      this.categorysss();
    }
	});

  function formatRupiah(angka, prefix){
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
    split       = number_string.split(','),
    sisa        = split[0].length % 3,
    rupiah        = split[0].substr(0, sisa),
    ribuan        = split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
      separator = sisa ? '.' : '';
      rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
  }
</script>