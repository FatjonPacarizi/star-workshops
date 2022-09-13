<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF</title>
</head>

<body>

    @php
    $date = new DateTime("now", new DateTimeZone('Europe/Tirane') );

    @endphp

    @extends('layouts.app')
    <div class="w-full h-screen p-6  flex flex-col  items-center ">

        <div class="w-full bg-white  rounded pb-4 mt-12">

            <div class="w-full flex justify-between border-b">
                <h1 class="p-3 text-slate-900">Workshop participants Managment</h1>
            </div>
            <div>
                <p class="text-left h-8 m-5 text-xl text-orange-400 w-2/4">Pending</p>
                <table class="w-full ">
                    <tr class="border-y border-gray-200 ">
                        <td class="font-bold p-3 w-1/4">User Name</td>
                        <td class="font-bold p-3 w-1/4">User Email</td>
                        <td class="font-bold w-1/4">Applied On</td>
                    </tr>

                    <tr class='border-b border-gray-200'>
                        <td class="p-3 ">Albina</td>
                        <td class="p-3 ">Ahmeti</td>
                        <td><a href="#" class="text-blue-600">2022</a></td>
                    </tr>

                </table>

            </div>
            <div>
                <p class="text-left h-8 m-5 text-xl text-green-500">Approved</p>
                <table class="w-full">
                    <tr class="border-y border-gray-200 h-8 ">
                        <td class="font-bold p-3 w-1/4">User Name</td>
                        <td class="font-bold p-3 w-1/4">User Email</td>
                        <td class="font-bold w-1/4">Applied On</td>
                    </tr>

                    <tr class='border-b border-gray-200'>
                        <td class="p-3 ">Albina</td>
                        <td class="p-3 ">Ahmeti</td>
                        <td><a href="#" class="text-blue-600">2022</a></td>
                    </tr>
                </table>

            </div>
            <div>
                <p class="text-left h-8 m-5 text-xl text-red-500">Not Approved</p>
                <table class="w-full">
                    <tr class="border-y border-gray-200 h-8 ">
                        <td class="font-bold p-3 w-1/4">User Name</td>
                        <td class="font-bold p-3 w-1/4">User Email</td>
                        <td class="font-bold w-1/4">Applied On</td>
                    </tr>

                    <tr class='border-b border-gray-200'>
                        <td class="p-3 ">Albina</td>
                        <td class="p-3 ">Ahmeti</td>
                        <td><a href="#" class="text-blue-600">2022</a></td>
                    </tr>
                </table>

            </div>
        </div>
    </div>

    <script>
        function changeURL($param) {
            if (history.pushState) {
                var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + $param;
                window.history.pushState({
                    path: newurl
                }, '', newurl);
            }
        }
    </script>


</body>

</html>