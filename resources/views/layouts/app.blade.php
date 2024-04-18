<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])


    <link rel="stylesheet" href="sweetalert2.min.css">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

    <link rel="stylesheet" href="//cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    @yield('links')



</head>

<body>
    <div id="app">

        {{-- nav bar part --}}
    @yield('nav')

        <main >
            @yield('content')
        </main>
    </div>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js') }}"></script>

    
    <script>
        $(document).on("click", "#delete", function(e) {
            e.preventDefault();
            var link = $(this).attr("href");
            Swal.fire({
                title: "T'es sûre ?",
                confirmButtonColor: '#3085d6 ',
                cancelButtonColor: '#d33',
                confirmButtonText: 'oui',
                cancelButtonText: 'non',
                showCancelButton: true,
                showCloseButton: true

            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = link;
                    Swal.fire(
                        "catégorie supprimée avec succès",
                        "catégorie supprimée avec succès",
                        'succès'
                    )
                }
            });
        });
    </script>

    <script src="//cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="//cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

    <script>
        @if (Session::has('message_id'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.info("{{ Session::get('message_id') }}");

                    break;

                case 'success':
                    toastr.success("{{ Session::get('message_id') }}");
                    break;

                case 'warning':
                    toastr.warning("{{ Session::get('message_id') }}");
                    break;

                case 'error':
                    toastr.error("{{ Session::get('message_id') }}");
                    break;
            }
        @endif
    </script>
 <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>


    <style>

    *{
        margin:0 ;
        padding: 0 ;
        box-sizing: border-box;
        scroll-padding-top: 2rem;
        scroll-behavior: smooth;
        list-style: none;
        text-decoration: none !important;
    }

    :root{
        --main-color:#fe5b3d;
        --second-color:#ffac38;
        --text-color:#444;
        --gradient:linear-gradient(#fe5b3d,#ffac38);
    }

    nav{
    position: fixed;
    width: 100%;
    z-index: 1000;
    top: 0;
    right: 0;
    display: flex;
    align-items: center;
    justify-content: space-between;
    background-color: #eeeff1;
    padding: 15px 100px ;
    }

.logo img{
    width: 80px;
}
.navbar{
    display: flex
}
.navbar li{
    position: relative;

}
.navbar a{
    font-size: 1rem;
    padding:10px 20px;
    color: var(--text-color) !important;
    font-weight: 500
}

.navbar a::after{
    content:"";
    width: 0;
    height: 3px;
    background: var(--gradient);
    position: absolute;
    bottom:-4px;
    left: 0 ;
    transition:0.5s
}
.navbar a:hover::after{
    width: 100%;
}
#menu-icon{
    font-size: 24px;
    cursor:pointer;
    z-index: 10001;
    display: none;
}

.header-btn a{
    padding: 10px 20px !important;
    color: var(--text-color) !important;
    font-weight: 500
}

.header-btn .sign-in{
    background: #474fa0;
    color: #FFF !important;
    border-radius: 0.5rem;
}

.header-btn .sign-in:hover{
    background-color: var(--main-color);
}
    </style>
</body>

</html>
