@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12" style="margin-top: 2%;">
            <div class="m-portlet__body">
                <!--begin: Datatable -->
                <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
                    <thead>
                        <tr>
                           <th><b>#</b></th>
                           <th><b>Группа</b></th>
                           <th><b>Название</b></th>
                           <th><b>Ставка</b></th>
                           <th style="display: none !important;"></th>
                           <th style="display: none !important;"></th>
                           <th style="display: none !important;"></th>
                           <th style="display: none !important;"></th>
                           <th style="display: none !important;"></th>
                       </tr>
                   </thead>        

                   <tbody>
                    @if(count($groupedData))
                    @foreach($groupedData as $index => $datas)
                    @foreach($datas as $key => $data)
                    <tr>
                       <td>{{$key +1 }}</td>
                       <td>Group: <b>{{$index + 1}}</b></td>
                       <td><b>{{$data['sn']}}</b> </td>
                       <td><b><i>{{number_format($data['epr'], 2)}}</i></b> </td>
                       <td style="display: none;"></td>
                       <td  style="display: none;"></td>
                       <td  style="display: none;"></td>
                       <td  style="display: none;"></td>
                       <td  style="display: none;"></td>
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
                   <th><b>Группа</b></th>
                   <th><b>Название</b></th>
                   <th><b>Ставка</b></th>
                   <th style="display: none !important;"></th>
                   <th style="display: none !important;"></th>
                   <th style="display: none !important;"></th>
                   <th style="display: none !important;"></th>
                   <th style="display: none !important;"></th>
                   <th style="display: none !important;"></th>
               </tr>
           </tfoot>
       </table>
   </div>
</div>
</div>
</div>
<script type="text/javascript">
  setInterval(function(){ location.reload() }, 120000);

</script>

@endsection