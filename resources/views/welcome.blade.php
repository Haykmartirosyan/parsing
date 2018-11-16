@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="k-content__body	k-grid__item k-grid__item--fluid" id="k_content_body">
                    <div class="k-portlet k-portlet--mobile">
                        <div class="k-portlet__body" id="tableData">
                            <p id="loading">Loading ...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script>
        $(document).ready(function () {
            $.get('/parsing/public/parsing')
                .done(function (response) {
                    $.get('/parsing/public/parsing/getResult')
                        .done(function (response) {
                            createTableByData(response);
                        });
                });

            setInterval(function () {
                $.get('/parsing/public/parsing')
                    .done(function (response) {
                        console.log('updated', response);
                    });
            }, 120000);

            setInterval(function () {
                $.get('/parsing/public/parsing/getResult')
                    .done(function (response) {
                        createTableByData(response);
                    });
            }, 150000);

            function createTableByData(data) {
                var eTable = "<table class=\"table  table-bordered table-hover \" id=\"k_table_1\">" +
                    "<thead>" +
                    "<tr>" +
                    "<th><b>#</b></th>" +
                    "<th><b>Группа</b></th>" +
                    "<th><b>Название</b></th>" +
                    "<th><b>Ставка</b></th>" +
                    "<th><b>Победа</b></th>" +
                    "</tr>" +
                    "</thead>" +
                    "<tbody>";
                $.each(data, function (index, row) {
                    var win = 0;
                    if (row.win !== null) {
                        win = row.win
                    }

                    eTable += "<tr>";
                    eTable += "<td>" + (index + 1) + "</td>";
                    eTable += "<td><b>Группа: " + row.group + "</b></td>";
                    eTable += "<td><b>" + row.name + "</b></td>";
                    eTable += "<td><b><i>" + row.price + "</b></i></td>";
                    eTable += "<td><b>" + win + "</i></td>";
                    eTable += "</tr>";
                });
                eTable += "</tbody></table>";
                $('loading').hide();
                $('#tableData').html(eTable);
            }
        });
    </script>

@endsection