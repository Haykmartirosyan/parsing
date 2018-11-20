@extends('layouts.app')
@section('content')
    <div class="m-grid m-grid--hor m-grid--root m-page">
        <!-- BEGIN: Header -->
    @include('layouts.header')
    <!-- END: Header -->
        <!-- begin::Body -->
        <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
            <!-- BEGIN: Left Aside -->
        @include('layouts.sidebar')
        <!-- END: Left Aside -->
            <div class="m-grid__item m-grid__item--fluid m-wrapper">
                <!-- END: Subheader -->
                <div class="m-content">
                    <div class="m-portlet m-portlet--mobile">
                        <div class="m-portlet__body">
                            <div><h2 style="display:inline-block" id="time">02:00 </h2>
                                <h2 style="display:inline-block">минут!</h2>
                                <a href="" class="btn btn-primary">Обновить страницу</a>
                            </div>
                            <div class="m-portlet__body">
                                <!--begin: Datatable -->
                                <table class="table table-striped- table-bordered table-hover table-checkable"
                                       id="m_table_1">
                                    <thead>
                                    <tr>
                                        <th><b>#</b></th>
                                        <th><b>Дата</b></th>
                                        <th><b>Время</b></th>
                                        <th><b>Чемпионат</b></th>
                                        <th><b>Команды</b></th>
                                        <th><b>Группа</b></th>
                                        <th><b>Название</b></th>
                                        <th><b>Ставка</b></th>
                                        <th><b>Победа</b></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($groupedData))
                                        @foreach($groupedData as $index => $datas)
                                            <tr>
                                                <td>{{$index +1 }}</td>
                                                <td>{{$datas->created_at->toDateString()}}</td>
                                                <td>{{$datas->time}}</td>
                                                <td>{{$datas->league}}</td>
                                                <td>{{$datas->command}}</td>
                                                <td>{{$datas->group}}</td>
                                                <td>{{$datas->name}}</td>
                                                <td>{{number_format($datas->price, 2)}}</td>
                                                <td>{{$datas->win}}</td>
                                                <td style="display: none;" nowrap></td>
                                            </tr>

                                        @endforeach
                                    @else
                                        <h1>No Data</h1>
                                    @endif
                                    </tbody>

                                    <tfoot>
                                    <tr>
                                        <th><b>#</b></th>
                                        <th><b>Дата</b></th>
                                        <th><b>Время</b></th>
                                        <th><b>Чемпионат</b></th>
                                        <th><b>Команды</b></th>
                                        <th><b>Группа</b></th>
                                        <th><b>Название</b></th>
                                        <th><b>Ставка</b></th>
                                        <th><b>Победа</b></th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <script type="text/javascript">
                                setInterval(function () {
                                    location.reload()
                                }, 120000);
                            </script>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->               </div>
            </div>
        </div>
        <!-- end:: Body -->
    </div>
    <!-- end:: Page -->
    <!-- end::Quick Sidebar -->
    <!-- begin::Scroll Top -->
    <div id="m_scroll_top" class="m-scroll-top">
        <i class="la la-arrow-up"></i>
    </div>

    <script>
        function startTimer(duration, display) {
            var timer = duration, minutes, seconds;
            setInterval(function () {
                minutes = parseInt(timer / 60, 10)
                seconds = parseInt(timer % 60, 10);

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.textContent = minutes + ":" + seconds;

                if (--timer < 0) {
                    timer = duration;
                }
            }, 1000);
        }

        window.onload = function () {
            var twoMinute = 60 * 2,
                display = document.querySelector('#time');
            startTimer(twoMinute, display);
        };
    </script>

@endsection