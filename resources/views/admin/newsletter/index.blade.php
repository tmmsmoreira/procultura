@extends('admin.layouts.main')
@include('commons.deletePopup')

@section('required-css-files')
<!-- DataTables -->
<link rel="stylesheet" href="/plugins/datatables/datatables.min.css">
@stop

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Contactos Newsletter
        <small>Gestão de contactos para a newsletter</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Páginas</li>
        <li class="active">Contactos Newsletter</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Your Page Content Here -->
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <table id="newsletter-list" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th><input id="select_all" name="select_all" type="checkbox" /></th>
                                <th>Data de Subscrição</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($contacts as $contact)
                            <tr id="row-{{ $contact->id }}" data-id="{{ $contact->id }}">
                                <td></td>
                                <td>{{ $contact->created_at->format("d-m-Y H:i") }}</td>
                                <td>{{ $contact->email }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="box-footer">
                    <button class="btn btn-danger" disabled id="delete_button" role="button" data-toggle="modal"
                        data-target="#delete_modal" data-link="{{ url('/admin/newsletter/delete') }}">Apagar</button>
                    <a class="btn btn-default pull-right" href="newsletter/export" id="export" role="button">Exportar</a>
                </div>
            </div>
        </div>
    </div>
</section>

@yield('delete_popup')

<!-- /.content -->
@stop

@section('required-js-scripts')
<!-- DataTables -->
<script src="/plugins/datatables/datatables.min.js"></script>
@stop

@section('page-script')
<!-- page script -->
<script>
    $(function () {
        var table = $('#newsletter-list').DataTable({
            columnDefs: [ {
                orderable: false,
                targets: 0,
                className: 'checkbox-column',
                render: function (data, type, full, meta) {
                    return '<input type="checkbox">';
                }
            } ],
            order: [[ 2, 'asc' ]],
            select: {
                style: "multi",
                selector: 'td:first-child input'
            },
            language: {
                url: "/plugins/datatables/_languages/pt-PT.json"
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
                $('#newsletter-list tbody input[type="checkbox"]:not(:checked)').trigger('click');
            } else {
                $('#newsletter-list tbody input[type="checkbox"]:checked').trigger('click');
            }
            // Prevent click event from propagating to parent
            e.stopPropagation();
        });

        $('tbody tr').on('click', function(e) {
            var $cell = $(e.target).closest('td');
            if ($cell.index() > 0) {
                window.location.pathname += "/" + $(this).attr("data-id");
            }
        });

        var updateDataTableSelectAllCtrl = function(table) {
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

        var handleButtons = function(table) {
            var $table             = table.table().node(),
                $chkbox_checked    = $('tbody input[type="checkbox"]:checked', $table);

            if ($chkbox_checked.length === 0) {
                $("#delete_button").prop("disabled", true);
            } else {
                $("#delete_button").prop("disabled", false);
            }
        }

        $('#delete_modal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget),
                link = button.data('link'),
                modal = $(this),
                ids = $("#newsletter-list tbody input:checked").map(function() {
                    return parseInt($(this).parent().parent().attr("data-id"));
                }).get();


            modal.find('#delete_form').attr("action", link);
            modal.find("#delete_button").on('click', function() {
                var mapped_rows = ids.map(function(id) { return "#row-" + id }),
                    button = $(this);

                modal.find(".cssload-container").toggleClass("active");
                button.prop("disabled", true);

                $.post(link, {"ids" : ids}, function(response) {
                    if (response) {
                        modal.modal("hide");
                        table.rows(mapped_rows).remove().draw();
                    }

                    button.prop("disabled", false);
                    modal.find(".cssload-container").toggleClass("active");
                });
            });
        });
    });
</script>
@stop
