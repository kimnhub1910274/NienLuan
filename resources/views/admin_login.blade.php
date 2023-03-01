{{--  <?php include('admin_server.php') ;
if(isset($_POST['username'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
  }
?>  --}}
@section('welcome')

@endsection
<!DOCTYPE html>
<html>
    <head>
        <title>Đăng nhập</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

        <!-- Fontawesome -->
        <link rel="stylesheet" href="{{{'public/fonts/fontawesome-free-6.0.0/css/all.min.css'}}}">
        <!-- CSS -->
        <link rel="stylesheet" href="{{{'public/css/test.css'}}}">
        <link rel="stylesheet" href="{{{'public/js/login.js'}}}">

    </head>

<body>
    <div class="login">
        <form action="" method="post">
            <div class="wrapper">
                <div class="container">
                  <form class="form">
                    <div class="overlay">
                        <form>
                           <div class="con">
                           <header class="head-form">
                              <h2>ĐĂNG NHẬP</h2>
                           </header>
                           <br>
                           <div class="field-set">
                                 <span class="input-item">
                                   <i class="fa fa-user-circle"></i>
                                 </span>
                                 <input class="form-input" id="txt-input" type="text" placeholder="Email" required>
                              <br>
                              <span class="input-item">
                                <i class="fa fa-key"></i>
                               </span>
                              <input class="form-input" type="password" placeholder="Mật khẩu" id="pwd"  name="password" required>
                             <span>
                                <i class="fa fa-eye" aria-hidden="true"  type="button" id="eye"></i>
                             </span>
                              <br>
                              <button class="log-in"> ĐĂNG NHẬP </button>
                           </div>
                           {{--  <div class="other">
                              <button class="btn submits frgt-pass">Quên mật khẩu?</button>
                        <!--     Sign Up button -->
                              <button class="btn submits sign-up">Đăng ký
                        <!--         Sign Up font icon -->
                              <i class="fa fa-user-plus" aria-hidden="true"></i>
                              </button>
                           </div>  --}}
                          </div>
                        </form>
                        </div>
        </form>
    </div>
</body>

</html>
