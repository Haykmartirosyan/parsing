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
                <div class="m-portlet m-portlet--mobile">
                    <div class="m-portlet__body">
                        <div>
                            <a href="{{route('delete-result')}}" class="btn btn-primary">Обновить страницу</a>
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
                        <div><h2>X-Матч</h2>
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
                                    <th><b>Название</b></th>
                                    <th><b>Ставка</b></th>
                                    <th><b>Победа</b></th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($xMatchDatas))
                                    @foreach($xMatchDatas as $index => $matchData)
                                        <tr>
                                            <td>{{$index +1 }}</td>
                                            <td>{{$matchData->created_at->toDateString()}}</td>
                                            <td>{{$matchData->time}}</td>
                                            <td>{{$matchData->league}}</td>
                                            <td>{{$matchData->command}}</td>
                                            <td>{{$matchData->name}}</td>
                                            <td>{{number_format($matchData->price, 2)}}</td>
                                            <td>{{$matchData->win}}</td>
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
                                    <th><b>Название</b></th>
                                    <th><b>Ставка</b></th>
                                    <th><b>Победа</b></th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
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
@endsection