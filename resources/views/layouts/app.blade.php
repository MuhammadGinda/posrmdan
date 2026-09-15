<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Toko Ginda')</title>

   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if (session('errors'))
            <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                {{ session('errors') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('content')

    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        setTimeout(function() {
            document.querySelectorAll('.alert').forEach(function(alertEl) {
                if (typeof bootstrap !== 'undefined' && bootstrap.Alert) {
                    bootstrap.Alert.getOrCreateInstance(alertEl).close();
                } else {
                    alertEl.style.transition = 'opacity 0.5s ease';
                    alertEl.style.opacity = '0';
                    setTimeout(function() {
                        alertEl.remove();
                    }, 500);
                }
            });
        }, 3000);
    </script>
</body>

</html>