<!DOCTYPE html>
<html lang="en">

<head>
    @include('trangchu.layouts.head')
    <style>
        .form{
            border: 1px solid #f1f1f1;
            padding: 1em;
            box-shadow: 0 4px 6px rgba(22, 22, 26, 0.18);
            background-color: #2196f3;
        }
        @media screen and (min-width: 768px) {
            .form{
                width: 50%;
                margin: 0 auto;
            }
        }
        .form-select, .form-control {
            border: none;
            border-bottom: 1px solid #000000;
            border-radius: 0;
        }
        /*khi click chọn thì sẽ border dưới sẽ thay đổi màu thành xanh*/
        .form-select:focus, .form-control:focus {
            box-shadow: none;
            border-bottom-color: #2196f3;
            background-color: burlywood;
        }
        .form-select:focus + label,  .form-control:focus + label{
            color: #2196f3;
        }
        .form-select + label, .form-control + label{
            padding-left: .5em;
            transition: all 1s;
        }
        input[type="submit"]{
            color: #2196f3;
            border-color: #2196f3;
        }
        input[type="submit"]:hover,
        input[type="submit"]:focus {
          color: #ffffff;
          background-color: #2196f3;
          outline: none;
          box-shadow: 0 4px 6px 0 rgba(22, 22, 26, 0.18);
        }
    </style>
</head>

<body>

    <div class="form doanhnghiep">
        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>
        <div class="form-floating mb-3">
            <select class="form-select" id="floatingSelect">
                <option selected="">Open this select menu</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
            <label for="floatingSelect">Works with selects</label>
        </div>
        <div class="form-floating mb-3">
            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
            <label for="floatingTextarea2">Comments</label>
        </div>
        <div>
            <input type="submit" class="btn btn-lg btn-outline-primary">
        </div>
    </div>

    @include('trangchu.layouts.footer')

</body>

</html>
