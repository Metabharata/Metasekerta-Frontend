<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="vendor/boxicons/css/boxicons.min.css" rel="stylesheet">

    <!-- Main CSS -->
    <link href="css/style.css" rel="stylesheet">
    <style>
        .nav-item.active .nav-link {
            background-color: #c2850036;
            color: #000;
        }
    </style>
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center">
                <img src="img/logov2.png" alt="">
                <span class="d-none d-lg-block">Metasekerta</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->


        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
                <li class="nav-item dropdown pe-3">
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                        data-bs-toggle="dropdown">
                        <img src="img/person.png" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        {{-- <li class="dropdown-header">
              <h6></h6>
            </li> --}}
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <form action="{{ route('actionlogout') }}" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item d-flex align-items-center"
                                    style="border: none; background: none; cursor: pointer;">
                                    <i class="bi bi-box-arrow-right"></i>
                                    <span>Sign Out</span>
                                </button>
                            </form>
                        </li>

                    </ul>
                </li>

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item active">
                <a class="nav-link collapsed" href="{{ route('dashboard') }}">
                    <i class="bi bi-grid"></i>
                    <span>Users</span>
                </a>
            </li>
        </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">

        <div class="pagetitle">
            <div class="row">
                <div class="col">
                    <div class="pagetitle">
                        <h1>Users</h1>
                    </div>
                </div>
            </div>
        </div>
        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Selamat Datang, {{ Auth::user()->name }}</h5>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr style="background-color: #c28400;">
                                                <th scope="col">No</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Username</th>
                                                <th scope="col">Email</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $datas)
                                                <tr>
                                                    <td>{{ $loop->iteration }}.</td>
                                                    <td>{{ \Carbon\Carbon::parse($datas->created_at)->isoFormat('D MMMM Y') }}
                                                    </td>
                                                    <td>{{ $datas->name }}</td>
                                                    <td>{{ $datas->username }}</td>
                                                    <td>{{ $datas->email }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-lg-4">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Send To Mail</h5>
              <div class="activity">
                <div class="row mb-3">
                  <form action="{{ route('updateEmail', ['id' => $data->mail_tos_id]) }}" method="post">
                    @csrf
                    <div class="row">
                      <div class="col-sm-8">
                        <input type="text" name="email" class="form-control" value="{{ $data->email }}">
                      </div>
                      <div class="col-sm-2">
                        <button type="submit" class="btn btn-primary">Update</button> 
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Status</h5>
              <div class="activity">
                <div class="row mb-3">
                  <form action="{{ route('updateActive', ['id' => $data->mail_tos_id]) }}" method="post">
                    @csrf
                    @if ($data->is_active == 'Yes')
                      <input type="text" name="is_active" value="No" hidden>
                    @else
                    <input type="text" name="is_active" value="Yes" hidden>
                    @endif 
               
                    <div class="row">
                      <label for="inputText" class="col-sm-2 col-form-label">Is Active</label>
                      <div class="col-sm-4">
                        @if ($data->is_active == 'Yes')
                        <button type="submit" class="btn btn-primary">Active</button>
                        @else
                            <button type="submit" class="btn btn-danger">Non Active</button>
                        @endif 
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>


        </div> --}}
            </div>
        </section>

    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <!-- Vendor JS Files -->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Template Main JS File -->
    <script src="js/main.js"></script>

</body>

</html>
