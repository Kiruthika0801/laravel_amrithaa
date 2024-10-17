<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background-color: white;
        }

        .sidebar {
            width: 250px;
            background-color: white;
            height: 100vh;
            position: fixed;
            padding-top: 20px;
            padding-left: 15px;
            border-right: 1px solid #ddd;
        }

        .sidebar img {
            width: 80%;
            max-height: 100px;
        }

        .nav-link {
            color: black;
            transition: background-color 0.3s;
            line-height: 1.7;
            padding: 10px 15px;
            display: block;
        }

        .nav-link:hover {
            background-color: #fd489ef5;
            color: white;
        }

        .icon-custom {
            color: #fd489ef5;
        }

        .nav-link:hover .icon-custom {
            color: white;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <img src="{{ asset('assets/images/images.png') }}" alt="Logo">
        <ul>
            <li>
                <span class="text-black">Menu</span>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('home') }}">
                    <i class="bi bi-house icon-custom"></i>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('products.list') }}">
                    <i class="bi bi-bag icon-custom"></i>
                    Products
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user/list/page') }}">
                    <i class="bi bi-person icon-custom"></i>
                    Users
                </a>
            </li>
        </ul>
    </div>
</body>

</html>