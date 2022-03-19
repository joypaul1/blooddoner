@extends('backend.layouts.master')
@section('title','Purchase List')
@section('page-header')
    <i class="fa fa-list"></i> Purchase List
@stop
@push('css')
    <style>
        table th,
        td {
            text-align: center !important;
            vertical-align: middle !important;
        }
    </style>
@endpush

@section('content')
    @include('backend.components.page_header', [
       'fa' => 'fa fa-pencil',
       'name' => 'Create Purchase',
       'route' => route('backend.purchase.purchases.create')
    ])

    <form class="form-horizontal"
          method="get"
          action="{{route('backend.purchase.purchases.index')}}"
          role="form"
          enctype="multipart/form-data">
        <table class="table table-bordered">
            <tr>
                <th class="bg-dark" style="width: 18%"><label for="source">Source</label></th>
                <th class="bg-dark" style="width: 18%"><label for="item">Item</label></th>
                <th class="bg-dark" style="width: 18%"><label for="purchase_no">Purchase No.</label></th>
                <th class="bg-dark" style="width: 18%"><label for="ref_no">Reference No.</label></th>
                <th class="bg-dark" style="width: 18%"><label for="purchase_date">Purchase Date</label></th>
                <th class="bg-dark" style="width: 10%;">Actions</th>
            </tr>
            <tr>
                <td>
                    <select class="chosen-select" id="source" name="source" data-container="body">
                        <option value="">- Source -</option>
                        @foreach($sources as $source)
                            <option value="{{ $source->id }}"
                                {{ request()->query('source') == $source->id ? 'selected' : '' }}>
                                {{ $source->name }}
                            </option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <select class="chosen-select" id="item" name="item" data-container="body">
                        <option value="">- Item -</option>
                        @foreach($items as $item)
                            <option value="{{ $item->id }}"
                                {{ request()->query('item') == $item->id ? 'selected' : '' }}>
                                {{ $item->name }}
                            </option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <input type="text"
                           id="purchase_no"
                           name="purchase_no"
                           placeholder="Purchase No."
                           value="{{request()->query('purchase_no')}}"
                           class="input-sm form-control text-center">
                </td>
                <td>
                    <input type="text"
                           id="ref_no"
                           name="ref_no"
                           placeholder="Reference No."
                           value="{{request()->query('ref_no')}}"
                           class="input-sm form-control text-center">
                </td>
                <td>
                    <input type="text"
                           id="purchase_date"
                           name="purchase_date"
                           autocomplete="off"
                           placeholder="YYYY-MM-DD"
                           value="{{request()->query('purchase_date')}}"
                           class="input-sm form-control text-center">
                </td>
                <td>
                    <div class="btn-group btn-group-mini btn-corner">
                        <button type="submit"
                                class="btn btn-xs btn-primary"
                                title="Search">
                            <i class="ace-icon fa fa-search"></i>
                        </button>

                        <a href="{{ route('backend.purchase.purchases.index') }}"
                           class="btn btn-xs btn-info"
                           title="Show All">
                            <i class="ace-icon fa fa-list"></i>
                        </a>
                    </div>
                </td>
            </tr>
        </table>
    </form>

    <table class="table table-bordered table-hover">
        <tbody>
        <tr>
            <th class="bg-dark" style="width: 6%">SL</th>
            <th class="bg-dark" style="width: 21%">Purchase No.</th>
            <th class="bg-dark" style="width: 21%">Reference No.</th>
            <th class="bg-dark" style="width: 21%">Source</th>
            <th class="bg-dark" style="width: 21%">Date</th>
            <th class="bg-dark" style="width: 10%">Action</th>
        </tr>
        @forelse($purchases as $key => $purchase)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $purchase->purchase_no }}</td>
                <td>{{ $purchase->ref_no }}</td>
                <td>{{ $purchase->source->name }}</td>
                <td>{{ $purchase->purchase_date->format('Y-m-d') }}</td>
                <td>
                    <div class="btn-group btn-group-mini btn-corner">
                        <a href="#purchase-details{{ $purchase->id }}"
                           title="Show"
                           role="button"
                           data-toggle="modal"
                           class="btn btn-minier btn-purple">
                            <i class="fa fa-eye"></i>
                        </a>

                        <a href="{{ route('backend.purchase.purchases.edit', $purchase->id) }}"
                           class="btn btn-xs btn-info"
                           title="Edit">
                            <i class="ace-icon fa fa-pencil"></i>
                        </a>

                        <button type="button"
                                onclick="delete_check({{$purchase->id}})"
                                class="btn btn-xs btn-danger"
                                title="Delete">
                            <i class="ace-icon fa fa-trash-o"></i>
                        </button>
                    </div>
                    <form action="{{ route('backend.purchase.purchases.destroy', $purchase->id)}}"
                          id="deleteCheck_{{ $purchase->id }}" method="GET">
                        @csrf
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8">No data available in table</td>
            </tr>
        @endforelse
        </tbody>
    </table>


    <!-- Modals -->
    @foreach($purchases as $purchase)
        <div id="purchase-details{{ $purchase->id }}" class="modal" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="blue bigger"><i class="fa fa-eye"></i> Purchase Details</h4>
                    </div>
                    <div class="modal-body">

                        <div class="row text-left">
                            <div class="col-sm-6">
                                <dl id="dt-list-1" class="dl-horizontal">
                                    <dt style="text-align: left !important;">Purchase No.</dt>
                                    <dd style="margin-left: 0 !important;">{{ $purchase->purchase_no }}</dd>
                                    <dt style="text-align: left !important;">Purchase Date</dt>
                                    <dd style="margin-left: 0 !important;">{{ $purchase->purchase_date->format('Y-m-d') }}</dd>
                                    <dt style="text-align: left !important;">Reference No.</dt>
                                    <dd style="margin-left: 0 !important;">{{ $purchase->ref_no }}</dd>
                                    <dt style="text-align: left !important;">Source</dt>
                                    <dd style="margin-left: 0 !important;">{{ $purchase->source->name }}</dd>
                                </dl>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered" style="margin-bottom: 0;">
                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Item</th>
                                        <th>Quantity</th>
                                        <th>Rate</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($purchase->details as $key => $detail)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $detail->stock->item->name }}</td>
                                            <td>{{ $detail->stock->qty }}</td>
                                            <td>{{ $detail->stock->rate }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-sm" data-dismiss="modal">
                            <i class="ace-icon fa fa-times"></i>
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @include('backend.partials._paginate', ['data' => $purchases])
@endsection

@push('js')
    <script type="text/javascript">
        jQuery(function ($) {
            if (!ace.vars['touch']) {
                $('.chosen-select').chosen({allow_single_deselect: true, search_contains: true});
                //resize the chosen on window resize
                $(window).on('resize.chosen', function () {
                    $('.chosen-select').each(function () {
                        let $this = $(this);
                        $this.next().css({'width': '100%'});
                        // $this.next().css({'width': $this.parent().width()});
                    })
                }).trigger('resize.chosen');
            } else {
                $('.chosen-select').css('width', '100px');
            }

            $('#purchase_date').datepicker({
                autoclose: true,
                format: 'yyyy-mm-dd',
                todayHighlight: true
            });
        });

        function delete_check(id) {
            Swal.fire({
                title: 'Are you sure?',
                html: "<b>You will delete it permanently!</b>",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                width: 400,
            }).then((result) => {
                if (result.value) {
                    $('#deleteCheck_' + id).submit();
                }
            })
        }
    </script>
@endpush
