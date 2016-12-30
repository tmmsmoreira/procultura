@extends('admin.layouts.main')

@section('required-css-files')
<!-- DataTables -->
<link rel="stylesheet" href="/plugins/datatables/dataTables.min.css">
@stop

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Agenda Cultural
        <small>Gestão de eventos</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Páginas</li>
        <li class="active">Agenda Cultural</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Your Page Content Here -->
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <table id="agenda-list" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th><input id="select_all" name="select_all" type="checkbox" /></th>
                                <th>Título</th>
                                <th>Localização</th>
                                <th>Inicio</th>
                                <th>Fim</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($events as $event)
                            <tr data-id="{{ $event->id }}">
                                <td></td>
                                <td>{{ $event->title }}</td>
                                <td>{{ $event->location }}</td>
                                <td>{{ $event->start_datetime->format("d-m-Y H:i") }}</td>
                                <td>{{ $event->end_datetime->format("d-m-Y H:i") }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="box-footer">
                    <a href="events/create" class="btn btn-info" id="add_button" role="button">Adicionar</a>
                    <button class="btn btn-warning" disabled id="edit_button" role="button">Editar</button>
                    <button class="btn btn-danger" disabled id="delete_button" role="button">Apagar</button>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
@stop

@section('required-js-scripts')
<!-- DataTables -->
<script src="/plugins/datatables/dataTables.min.js"></script>
@stop

@section('page-script')
<!-- page script -->
<script>
    $(function () {
        var table = $('#agenda-list').DataTable({
            columnDefs: [ {
                orderable: false,
                targets: 0,
                className: 'checkbox-column',
                render: function (data, type, full, meta) {
                    return '<input type="checkbox">';
                }
            } ],
            order: [[ 3, 'asc' ]],
            select: {
                style: "multi",
                selector: 'td:first-child input'
            },
            language: {
                url: "/plugins/datatables/languages/pt-PT.json"
            }
        });

        table.on('select', function (e, dt, type, indexes) {
            updateDataTableSelectAllCtrl(table);
            handleButtons(table);
        }).on( 'deselect', function ( e, dt, type, indexes ) {
            updateDataTableSelectAllCtrl(table);
            handleButtons(table);
        });

        // Handle click on "Select all" control
        $('thead input[name="select_all"]', table.table().container()).on('click', function(e) {
            if (this.checked) {
                $('#agenda-list tbody input[type="checkbox"]:not(:checked)').trigger('click');
            } else {
                $('#agenda-list tbody input[type="checkbox"]:checked').trigger('click');
            }
            // Prevent click event from propagating to parent
            e.stopPropagation();
        });

        $('tbody tr').on('click', function(e) {
            var $cell = $(e.target).closest('td');
            if ($cell.index() > 0) {
                window.location.pathname += "/" + $(this).attr("data-id") + "/show";
            }
        });

        $("#edit_button").on('click', function() {
            window.location.pathname += "/" + table.row( { selected: true } ).nodes().to$().attr("data-id") + "/edit";
        });

        function updateDataTableSelectAllCtrl(table) {
            var $table             = table.table().node(),
                $chkbox_all        = $('tbody input[type="checkbox"]', $table),
                $chkbox_checked    = $('tbody input[type="checkbox"]:checked', $table),
                chkbox_select_all  = $('thead input[name="select_all"]', $table).get(0);

            // If none of the checkboxes are checked
            if ($chkbox_checked.length === 0) {
                chkbox_select_all.checked = false;
                if ('indeterminate' in chkbox_select_all) {
                    chkbox_select_all.indeterminate = false;
                }
                // If all of the checkboxes are checked
            } else if ($chkbox_checked.length === $chkbox_all.length) {
                chkbox_select_all.checked = true;
                if ('indeterminate' in chkbox_select_all) {
                    chkbox_select_all.indeterminate = false;
                }
                // If some of the checkboxes are checked
            } else {
                chkbox_select_all.checked = true;
                if ('indeterminate' in chkbox_select_all) {
                    chkbox_select_all.indeterminate = true;
                }
            }
        }

        function handleButtons(table) {
            var $table             = table.table().node(),
                $chkbox_checked    = $('tbody input[type="checkbox"]:checked', $table);

            if ($chkbox_checked.length === 0) {
                $("#edit_button").prop("disabled", true);
                $("#delete_button").prop("disabled", true);
            } else if ($chkbox_checked.length === 1) {
                $("#edit_button").prop("disabled", false);
                $("#delete_button").prop("disabled", false);
            } else {
                $("#edit_button").prop("disabled", true);
                $("#delete_button").prop("disabled", false);
            }
        }
    });
</script>
@stop
