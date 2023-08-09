<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    {{-- Bootstrap CSS --}}
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    @yield('head')
</head>

<body>
    @yield('body')

    <div class="content p-3">
        @yield('content')
    </div>

    {{-- Bootstrap JS --}}
    <script src="/js/bootstrap.min.js"></script>
    {{-- Popper JS --}}
    <script src="/js/popper.min.js"></script>
    {{-- jQuery --}}
    <script src="/js/jquery.js"></script>
    {{-- Fontawesome Icones --}}
    <script src="https://kit.fontawesome.com/8a58851d5d.js" crossorigin="anonymous"></script>

    <script>
        function filterDate(inputId, tableId) {
            // Declare variables
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById(inputId);
            filter = input.value;
            table = document.getElementById(tableId);
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[6];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }

        function resetFilter(inputId, tableId) {
            var input = document.getElementById(inputId);
            input.value = '';
            filterDate(inputId, tableId);
        }
    </script>
</body>

</html>
