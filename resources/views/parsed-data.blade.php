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
                        <div class="m-portlet__body">
                            <!--begin: Datatable -->
                            <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
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
                                @foreach($datas as $key => $data)
                                <tr>
                                 <td>{{$key +1 }}</td>
                                 <td>{{now()->toDateString()}}</td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td> <b>{{$index + 1}}</b></td>
                                 <td><b>{{$data['sn']}}</b> </td>
                                 <td><b><i>{{number_format($data['epr'], 2)}}</i></b> </td>
                                 <td></td>
                                 <td  style="display: none;" nowrap></td>
                             </tr>
                             @endforeach

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
              setInterval(function(){ location.reload() }, 120000);
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

@endsection