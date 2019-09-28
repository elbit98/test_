@extends('layouts.master')

@section('content')

            <div class="container">
                <br/><br/><br/>    

                <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr>
                        <th>icon</th>
                        <th>date</th>
                        <th>name</th>
                        <th>phone</th>
                        <th>email</th>
                    </tr>
                    </thead>
                    <tbody>

                        @foreach ($actions as $action)
                        <tr>
                            <td>{{ $action->id }}</td>
                            <td>{{ $action->date }}</td>
                            <td>{{ $action->name }}</td>
                            <td>{{ $action->phone }}</td>
                            <td>{{ $action->email }}</td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <hr/>
            

            <div id="info_tbl"></div>
            
            </div>

    <script>
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                responsive: true
            });
        });


         $('#dataTables-example').find('tr').click( function(){
             var id = $(this).find('td:first').text();
             $('#info_tbl').load("info?id=" + id);
             
        });

       
    </script>

    </div>
@endsection