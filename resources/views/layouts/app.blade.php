<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@isset($title) {{ $title }} @else Livewire Tutorial @endisset</title>

    <style>
        table {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        table td, table th {
            border: 1px solid #e1e1e1;
            padding: 12px;
        }

        table tr:nth-child(even){background-color: #f2f2f2;}
        table th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #2563eb;
            color: white;
        }
        [x-cloak] { display: none !important; }
        ul li {
            list-style: none;
        }
    </style>
    @vite(['resources/css/app.css','resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-gray-100">
<div>

     <div>
        <aside class="bg-gray-900 w-[70%] sm:w-[30%] lg:w-[15%] lg:block h-[100vh] fixed left-0 top-0 bottom-0 shadow-lg z-50">
            @include('layouts.sidebar')
        </aside>
        <div class="ml-[15%]">
            {{ $slot }}
        </div>
    </div>

    <script type="module">
        window.addEventListener('form-msg',event => {
            Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            }).fire({
                position: 'top-end',
                icon: 'success',
                title: event.detail.message,
                showConfirmButton: false,
            })
        });
        window.addEventListener('delete-msg',event => {
            Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            }).fire({
                position: 'top-end',
                icon: 'success',
                title: event.detail.message,
                showConfirmButton: false,
            })
        });

        window.addEventListener('show-delete-modal',event => {
            const deleteModal = document.getElementById('deleteModal');
            deleteModal.classList.remove('invisible');
            let childEl = deleteModal.children;
            childEl[0].classList.remove('scale-50');
            childEl[0].classList.add('scale-100');
        })
        window.addEventListener('hide-delete-modal',event => {
            const deleteModal = document.getElementById('deleteModal');
            deleteModal.classList.add('invisible');
            let childEl = deleteModal.children;
            childEl[0].classList.remove('scale-100');
            childEl[0].classList.add('scale-50');
        })

    </script>
    @livewireScripts
</body>
</html>
