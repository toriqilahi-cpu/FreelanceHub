<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>FreelanceHub</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <style>
        :root {
            --primary: #2563eb;
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
            --dark: #0f172a;
            --bg: #f8fafc;
            --card: #ffffff;
        }

        * {
            font-family: 'Inter', sans-serif;
        }

        body {
            background: var(--bg);
            color: #1e293b;
        }

        /* NAVBAR */

        .navbar-custom {
            background: white;
            box-shadow: 0 2px 20px rgba(0, 0, 0, .05);
            padding: 15px 0;
        }

        .brand {
            font-size: 32px;
            font-weight: 800;
            color: var(--success);
            text-decoration: none;
        }

        .nav-link-custom {
            color: #334155;
            text-decoration: none;
            font-weight: 600;
            margin-left: 20px;
        }

        .nav-link-custom:hover {
            color: var(--primary);
        }

        /* HERO */

        .hero {
            background: linear-gradient(135deg,
                    #2563eb,
                    #10b981);

            color: white;

            border-radius: 30px;

            padding: 60px;

            margin-bottom: 40px;

            box-shadow:
                0 15px 40px rgba(0, 0, 0, .15);
        }

        .hero h1 {
            font-size: 52px;
            font-weight: 800;
        }

        .hero p {
            font-size: 18px;
            opacity: .9;
        }

        /* CARD */

        .dashboard-card {

            background: white;

            border: none;

            border-radius: 24px;

            padding: 30px;

            box-shadow:
                0 10px 25px rgba(0, 0, 0, .06);

            transition: .3s;
        }

        .dashboard-card:hover {

            transform:
                translateY(-8px);

        }

        .card-icon {

            width: 70px;
            height: 70px;

            border-radius: 20px;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 28px;

            margin-bottom: 20px;
        }

        .icon-blue {
            background: #dbeafe;
            color: #2563eb;
        }

        .icon-green {
            background: #dcfce7;
            color: #16a34a;
        }

        .icon-yellow {
            background: #fef3c7;
            color: #d97706;
        }

        .icon-red {
            background: #fee2e2;
            color: #dc2626;
        }

        .stat-number {
            font-size: 40px;
            font-weight: 800;
        }

        /* SECTION */

        .section-title {
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 30px;
        }

        /* TABLE */

        .table-modern {

            background: white;

            border-radius: 20px;

            overflow: hidden;

            box-shadow:
                0 10px 25px rgba(0, 0, 0, .05);
        }

        .table-modern table {
            margin: 0;
        }

        .table-modern thead {
            background: #0f172a;
            color: white;
        }

        /* BUTTON */

        .btn {
            border-radius: 12px;
            font-weight: 600;
        }

        /* FOOTER */

        .footer {

            background: #0f172a;

            color: white;

            margin-top: 80px;

            padding: 50px;
        }

        /* RESPONSIVE */

        @media(max-width:768px) {

            .hero h1 {
                font-size: 35px;
            }

            .section-title {
                font-size: 28px;
            }

            .brand {
                font-size: 24px;
            }

        }
    </style>

</head>
@auth

    @php

        $notifications = auth()->user()
            ->notifications()
            ->latest()
            ->take(5)
            ->get();

        $unreadCount = auth()->user()
            ->notifications()
            ->where('is_read', false)
            ->count();

    @endphp

@endauth

<body>

    <nav class="navbar navbar-expand-lg navbar-custom">

        <div class="container">

            <a href="/" class="brand">

                FreelanceHub

            </a>

            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNav">

                <span class="navbar-toggler-icon"></span>

            </button>
            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav ms-auto align-items-center">

                    @auth

                        {{-- DASHBOARD --}}
                        <li class="nav-item">

                            @if(auth()->user()->role == 'client')

                                <a class="nav-link fw-semibold" href="{{ route('client.dashboard') }}">

                                    Dashboard

                                </a>

                            @elseif(auth()->user()->role == 'freelancer')

                                <a class="nav-link fw-semibold" href="{{ route('freelancer.dashboard') }}">

                                    Dashboard

                                </a>

                            @elseif(auth()->user()->role == 'admin')

                                <a class="nav-link fw-semibold" href="{{ route('admin.dashboard') }}">

                                    Dashboard

                                </a>

                            @endif

                        </li>

                        @if(auth()->user()->role == 'admin')

                            <li class="nav-item">

                                <a class="nav-link fw-semibold" href="{{ route('admin.users') }}">

                                    <i class="bi bi-people-fill"></i>
                                    Kelola User

                                </a>

                            </li>

                        @endif

                        @if(auth()->user()->role == 'admin')

                            <li class="nav-item">

                                <a class="nav-link fw-semibold" href="{{ route('admin.projects') }}">

                                    <i class="bi bi-kanban-fill"></i>
                                    Kelola Project

                                </a>

                            </li>

                        @endif

                        {{-- PROJECT SAYA --}}
                        <li class="nav-item">

                            @if(auth()->user()->role == 'client')

                                <a class="nav-link fw-semibold" href="{{ route('projects.index') }}">

                                    Project Saya

                                </a>

                                @if(auth()->user()->role == 'client')

                                    <li class="nav-item">

                                        <a class="nav-link fw-semibold" href="{{ route('payments.index') }}">

                                            <i class="bi bi-credit-card-fill"></i>
                                            Payment

                                        </a>

                                    </li>

                                @endif

                            @elseif(auth()->user()->role == 'freelancer')

                            <a class="nav-link fw-semibold" href="{{ route('hired.projects') }}">

                                Project Saya

                            </a>

                        @endif

                        </li>

                        <li class="nav-item">

                            <a class="nav-link fw-semibold" href="{{ route('messages.index') }}">

                                <i class="bi bi-chat-dots-fill"></i>
                                Pesan

                            </a>

                        </li>

                        @php

                            $unreadCount = auth()->user()
                                ->notifications()
                                ->where('is_read', false)
                                ->count();

                        @endphp

                        {{-- NOTIFIKASI --}}
                        <li class="nav-item mx-2">

                            <a href="{{ route('notifications.index') }}" class="nav-link position-relative">

                                <i class="bi bi-bell-fill fs-5"></i>

                                @if($unreadCount > 0)

                                    <span
                                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">

                                        {{ $unreadCount }}

                                    </span>

                                @endif

                            </a>

                        </li>

                        {{-- USER --}}
                        <li class="nav-item mx-2">

                            <span class="fw-semibold">

                                <i class="bi bi-person-circle"></i>

                                {{ auth()->user()->name }}

                            </span>

                        </li>

                        {{-- LOGOUT --}}
                        <li class="nav-item ms-2">

                            <form method="POST" action="{{ route('logout') }}">

                                @csrf

                                <button class="btn btn-danger rounded-pill px-4">

                                    Logout

                                </button>

                            </form>

                        </li>

                    @endauth

                    @guest

                        <li class="nav-item">

                            <a class="nav-link fw-semibold" href="{{ route('login') }}">

                                Login

                            </a>

                        </li>

                        <li class="nav-item ms-2">

                            <a class="btn btn-primary rounded-pill px-4" href="{{ route('register') }}">

                                Register

                            </a>

                        </li>

                    @endguest

                </ul>

            </div>
        </div>

        </div>

    </nav>

    <div class="container py-5">

        @yield('content')

    </div>

    <footer class="footer">

        <div class="container text-center">

            <h3 class="fw-bold">

                FreelanceHub

            </h3>

            <p>

                Marketplace Freelancer Modern Berbasis Laravel

            </p>

            <p>

                © 2026 FreelanceHub

            </p>

        </div>

    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>