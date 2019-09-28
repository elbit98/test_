@extends('layouts.master')
{{-- Content --}}
@section('content')
    <div class="_page-header" xmlns="http://www.w3.org/1999/html">
        <a class="btn btn-info pull-right flip" href="{{route('agent.salesman.create')}}"><i class="fa fa-plus"></i> {!! trans("site/salesman.add") !!}</a>
    </div>

    <div class="panel panel-default">
        <div class="panel-body">
            <table class="table table-bordered table-striped table-hover dataTable">
                <thead>
                <tr>
                    <th>Icon</th>
                    <th>Date</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                </tr>
                </thead>
                <tbody>
                @forelse($data as $item)
                    <tr class="item-table" data-sphere_id="{{ $item->sphere_id }}">
                        <td></td>
                        <td data-td_name="Date">{!! $item->date !!}</td>
                        <td data-td_name="Name">{!! $item->name !!}</td>
                        <td data-td_name="Phone">{!! $item->phone->phone !!}</td>
                        <td data-td_name="Email">{!! $item->email !!}</td>
                    </tr>
                @empty
                @endforelse
                </tbody>
            </table>

            <div id="test_list">

            </div>

        </div>
    </div>

    <script>

        $('.item-table').on('click', function () {

            let $el = $(this),
            $children_elements = $el.children();

            let $ajax = $.ajax({
                method: 'GET',
                url:  '/agent/test/getAdditionalData/' + $el.data('sphere_id'),
            });


            let $show_id = $('#show_id');
            if ($show_id.length > 0) {
                $show_id.remove();
            }

            let text = `<table id="show_id" class="table"><tbody>`;

            $ajax.done((data) => {

                $children_elements.each(function (index, item) {
                    if (index != 0) {
                        text += returnTrTable($(item).data('td_name'), $(item).text());
                    }
                });

                $.each(data,function (index, item) {
                    text += returnTrTable(item.label, item.value);
                });

                text += ` </tbody></table>`;

                $el.after(text);

            });

        });

        function returnTrTable(label, value) {
            let result = `
                        <tr>
                         <th>${label}</th>
                          <td>${value}</td>
                        </tr>
                        `;

            return result;
        }

    </script>

@stop