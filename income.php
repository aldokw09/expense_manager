<?php 
  session_start();
  require('resources/isMobile.php');

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
      <?php 
        if (!$DEVICE) { ?>
          <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <?php }
        else{ ?>
          <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">
        <?php }
       ?>

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
      <li class="nav-item active">
        <a class="nav-link" href="#">
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
            <h1 class="h3 mb-0 text-gray-800">Income</h1>
          </div>

          <div class="clearfix">
            <div class="float-left">
              <button class="mr-3 mb-3 btn btn-success" data-toggle="modal" data-target="#addTransModal">
    		        <i class="fa fa-plus"></i>&nbsp; Add Income
    		      </button>
            </div>
            <div class="float-right btn border border-success text-success px-4" id="balance" style="cursor: default; margin-top: -30px;">
                Total Income : <br> <span class="h5 font-weight-bold">Rp {{ incomes }},-</span>
            </div>
          </div>

          <!-- DataTales Example -->
          <div class="row" id="manage">
            <div class="col-xl-4 col-sm-6 mb-3" v-for='manage in displayedPosts'>
              <div class="card text-white bg-info o-hidden h-100">
                <div class="card-header" style="background-color: rgba(0, 0, 0, 0.03)">
                  <span class="float-left text-white font-weight-bold">{{ manage.date }}</span>
                  <span class="btn-group-sm float-right">
                    <button class="btn btn-sm btn-success" v-on:click="editData(manage.id_manage)" data-toggle="modal" data-target="#editDataModal">
                      <i class="fa fa-edit"></i>
                    </button>
                    <button class="btn btn-sm btn-danger" v-on:click="deleteData(manage.id_manage)">
                      <i class="fa fa-trash"></i>
                    </button>
                  </span>
                </div>

                <div class="card-body">
                  <div class="card-body-icon mt-5">
                    <i class="fas fa-fw fa-dollar-sign"></i>
                  </div>
                  <div>{{ manage.names }} <span style="font-weight:900;">({{ manage.name_category }})</span></div>
                  <div class="font-weight-bold">Rp {{ manage.ammount_in }},-</div>
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

            <!-- Edit Modal-->
            <div class="modal fade" id="editDataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
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
                      
                      <label for="ammount2">Ammount :
                        <span class="text-danger" id="errorAmmount2" style="display: none;">Ammount still empty!</span>
                      </label>
                      <input type="text" class="form-control" id="ammount2" v-model="ammount2" required>
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
    <div class="modal-dialog">
      <div class="modal-content" id="insert">
        <div class="modal-header">
          <h4 class="modal-title">Add Income</h4>
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
            
            <label for="ammount">Ammount :
              <span class="text-danger" id="errorAmmount" style="display: none;">Ammount still empty!</span>
            </label>
            <input type="text" inputmode="numeric" class="form-control" v-on:keyup="ubahrupiah()" id="ammount" v-model="ammount" v-on:input="checkAmmount" required>

            <label for="category">Category :
              <span class="text-danger" id="errorCategory" style="display: none;">Category still empty!</span>
            </label>
            <div class="categorys">
              <select class="form-control" v-model="category" v-on:input="checkCategory" required>
                <option disabled value="">--Select Category--</option>
                <option v-for="categorys in list_category" v-if="categorys.type_category == '1'" :value="categorys.id_category">{{categorys.name_category}}</option>
              </select>
            </div>

            <label for="date">Date :
              <span class="text-danger" id="errorDate" style="display: none;">Date still empty!</span>
            </label>
            <input type="date" class="form-control" id="date" v-model="date" v-on:input="checkDate" required>
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
  function ubahrupiah(){
    var value = $('#ammount').val();
    var valuerupiah = formatRupiah(value);
    $('#ammount').val(valuerupiah);
  }

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
      ammount2: "",
      list_category: [],
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
    		axios.get('transactionShow1.php?id_user=<?php echo $_SESSION['user123'] ?>')
    		.then(function (result) {
    			manage.list_manage = result.data;
          for(var i=0; i<manage.list_manage.length; i++){
            manage.list_manage[i].ammount_in = formatRupiah(manage.list_manage[i].ammount_in);
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
      categorys: function(){
        axios.get('transactionFormCategory.php')
        .then(function (result) {
          manage.list_category = result.data;
        });
      },
      editData: function(value){
        manage.value = value;
        axios.get('transactionEdit.php?id_user=<?php echo $_SESSION['user123'] ?>&id_manage='+manage.value)
        .then(function (result) {
          manage.list_manage2 = result.data;
          manage.names2 = manage.list_manage2[0].names;
          manage.ammount2 = manage.list_manage2[0].ammount_in;
          $('#dataName').html("("+manage.list_manage2[0].names+")");
        });
      },
      edits: function(){
        axios.get('transactionEditData.php?id_user=<?php echo $_SESSION['user123'] ?>&type=1&id_manage='+manage.value+'&names='+manage.names2+'&ammount='+manage.ammount2)
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
            axios.get('transactionDeleteData.php?id_user=<?php echo $_SESSION['user123'] ?>&id_manage='+manage.value)
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
      this.categorys();
      this.ambil();
    }
	});

  var today = new Date();
  var tanggal = today.getDate();
  if(tanggal<10){
    tanggal = "0" + tanggal;
  }
  var bulan = (today.getMonth()+1);
  if(bulan<10){
    bulan = "0" + bulan;
  }
  var tahun = today.getFullYear();
  
	var insert = new Vue({
		el: "#insert",
		data:{
			list_category: [],
			names: "",
			ammount: "",
			category: "",
			date: tahun+"-"+bulan+"-"+tanggal,
      value: "",
    },
    methods:{
      checkNames: function(){
        $('#errorNames').hide();
      },
      checkAmmount: function(){
        this.ammount=this.ammount.replace(/[^0-9]/g,'');
        var regex=/^[0-9]+$/;
        if (this.ammount.match(regex)){
          $('#errorAmmount').hide();
        }
      },
      checkCategory: function(){
        $('#errorCategory').hide();
      },
      checkDate: function(){
        $('#errorDate').hide();
      },
    	categorys: function(){
    		axios.get('transactionFormCategory.php')
    		.then(function (result) {
    			insert.list_category = result.data;
            });
    	},
    	 tambah: function(){
        if(this.names == "" || this.names == null){
          $('#errorNames').show();
        } 
        if(this.ammount == "" || this.ammount == null || this.ammount == "0"){
          $('#errorAmmount').show();
        } 
        if(this.category == "" || this.category == null){
          $('#errorCategory').show();
        }
        if(this.date == "" || this.date == null){
          $('#errorDate').show();
        }
        if(this.names != "" && this.names != null &&this.ammount != "" && this.ammount!= null && this.ammount != "0" &&
           this.category != "" && this.category != null && this.date != "" && this.date != null){
      		axios.get("transactionAdd.php?id_user=<?php echo $_SESSION['user123'] ?>&type=1&names=" +this.names+ "&ammount=" +this.ammount+ "&category=" +this.category+ "&date=" +this.date)
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
    created(){
      this.categorys();
    }
	});

  var balance = new Vue({
    el: "#balance",
    data:{
      incomes: 0,
    },
    methods:{
      income: function(){
        axios.get('indexBalanceIn.php?id_user=<?php echo $_SESSION['user123'] ?>')
        .then(function (result) {
          balance.incomes = result.data;
          balance.incomes = formatRupiah(balance.incomes);
        });
      }
    },
    created(){
      this.income();
    }
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