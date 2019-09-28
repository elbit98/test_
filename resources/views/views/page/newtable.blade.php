@extends('layouts.master')

@section('content')

    <div class="container">
                <br/><br/><br/>    

                <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables_2">
                    <tbody>
                        @foreach ($mylist as $action)
                        <tr>
                            <th scope="row">Icon</th>
                            <td>{{$action->id}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Date</th>
                            <td>{{$action->date}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Name</th>
                            <td>{{$action->name}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Phone</th>
                            <td>{{$action->phone}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Email</th>
                            <td>{{$action->email}}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <th scope="row">Radio</th>
                            <td>
                            @foreach ($check as $ch)
                                @if($ch->value[0]=='r')
                                    {{$ch->value}}, 
                                @endif
                            @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Checkbox</th>
                            <td>
                            @foreach ($check as $ch)
                                @if($ch->value[0]=='c')
                                    {{$ch->value}}, 
                                @endif
                            @endforeach
                            </td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
            <hr/>
            
            

@endsection