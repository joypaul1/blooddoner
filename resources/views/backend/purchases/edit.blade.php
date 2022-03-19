@extends('backend.layouts.master')
@section('title','Edit Purchase')
@section('page-header')
    <i class="fa fa-plus-circle"></i> Edit Purchase
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
       'fa' => 'fa fa-list',
       'name' => 'Purchase List',
       'route' => route('backend.purchase.purchases.index')
    ])

    <form class="form-horizontal"
          method="post"
          action="{{route('backend.purchase.purchases.update', $purchase->id)}}"
          role="form"
          enctype="multipart/form-data">
    @csrf

    <!-- source -->
        <div class="col-md-10" style="margin: 0 auto;">
            <div class="form-group">
                <label class="col-md-2 bolder" for="source_id">Source <sup class="red">*</sup></label>
                <div class="col-md-4">
                    <div class="text-center">
                        <select class="chosen-select" id="source_id" name="source_id">
                            <option value="">- Source -</option>
                            @foreach($sources as $source)
                                <option value="{{ $source->id }}"
                                    {{ $purchase->source_id == $source->id ? 'selected' : '' }}>
                                    {{ $source->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <strong class=" red">{{ $errors->first('source_id') }}</strong>
                </div>
            </div>

            <!-- purchase date -->
            <div class="form-group">
                <label class="col-md-2 bolder" for="purchase_date">Purchase Date <sup class="red">*</sup></label>
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </span>
                        <input type="text"
                               id="purchase_date"
                               name="purchase_date"
                               autocomplete="off"
                               placeholder="YYYY-MM-DD"
                               value="{{ $purchase->purchase_date->format('Y-m-d') }}"
                               class="input-sm form-control text-center">
                    </div>
                    <strong class=" red">{{ $errors->first('purchase_date') }}</strong>
                </div>
            </div>

            <!-- ref no -->
            <div class="form-group">
                <label class="col-md-2 bolder" for="ref_no">Reference No.</label>
                <div class="col-md-4">
                    <input type="text"
                           id="ref_no"
                           name="ref_no"
                           placeholder="0"
                           autocomplete="off"
                           value="{{ $purchase->ref_no }}"
                           class="input-sm form-control text-center">
                    <strong class=" red">{{ $errors->first('ref_no') }}</strong>
                </div>
            </div>

            @php
                use Illuminate\Support\MessageBag;

                $arr = $errors->toArray();
                $arr['ref_no'] = null;
                $arr['source_id'] = null;
                $arr['purchase_date'] = null;
                $errors = new MessageBag((new MessageBag($arr))->unique());
            @endphp

            @include('backend.partials._alert_message')

            <div style="width: 100%;">
                <!-- items -->
                <table class="table table-bordered" id="purchase_table">
                    <tbody>
                    <tr>
                        <th class="bg-dark" style="width: 250px;">Item <sup class="red">*</sup></th>
                        <th class="bg-dark" style="width: 200px;">Quantity <sup class="red">*</sup></th>
                        <th class="bg-dark" style="width: 200px;">Rate <sup class="red">*</sup></th>
                        <th class="bg-dark" style="width: 50px;">Actions</th>
                    </tr>

                    @foreach($purchase->details as $detail)
                        <tr>
                            <td>
                                <div class="text-center">
                                    <select class="chosen-select" name="detail_items[{{$detail->id}}]">
                                        <option value="">- Item -</option>
                                        @foreach($items as $key => $item)
                                            <option value="{{ $item->id }}"
                                                {{ $detail->stock->item->id == $item->id ? 'selected' : '' }}>
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </td>
                            <td>
                                <input type="number"
                                       placeholder="0"
                                       value="{{ $detail->stock->qty }}"
                                       name="detail_quantities[{{$detail->id}}]"
                                       class="input-sm form-control text-center">
                            </td>
                            <td>
                                <input type="number"
                                       placeholder="0"
                                       value="{{ $detail->stock->rate }}"
                                       name="detail_rates[{{$detail->id}}]"
                                       class="input-sm form-control text-center">
                            </td>
                            <td>
                                <div class="btn-group btn-group-mini btn-corner">
                                    <button type="button"
                                            title="Delete"
                                            onclick="delete_row(this)"
                                            class="btn btn-xs btn-danger">
                                        <i class="ace-icon fa fa-trash-o"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="4" style="text-align: right !important;">
                            <button type="button" onclick="create_row(this)"
                                    class="btn btn-xs btn-inverse add_row r-btnAdd"> + Add New
                            </button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div style="text-align: right">
                <button class="btn btn-sm btn-success submit">
                    <i class="fa fa-save"></i> Update
                </button>

                <a href="{{route('backend.purchase.purchases.index')}}" class="btn btn-sm btn-gray">
                    <i class="fa fa-refresh"></i> Cancel
                </a>
            </div>
        </div>
    </form>
@endsection

@push('js')
    <script type="text/javascript">
        jQuery(function ($) {
            chosen_trigger();

            $('#purchase_date').datepicker({
                autoclose: true,
                format: 'yyyy-mm-dd',
                todayHighlight: true
            });
        });

        function chosen_trigger() {
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
                $('.chosen-select').css('width', '100%');
            }
        }

        function delete_row(el) {
            $(el).closest('tr').remove();
        }

        function create_row(el) {
            $(el).parents("tr").remove();

            let r = document.getElementById('purchase_table').insertRow();
            let c0 = r.insertCell(0);
            let c1 = r.insertCell(1);
            let c2 = r.insertCell(2);
            let c3 = r.insertCell(3);

            c0.innerHTML = `
            <div class="text-center">
                <select class="chosen-select" name="items[]">
                    <option value="">- Item -</option>
                    @foreach($items as $item)
            <option value="{{ $item->id }}">
                        {{ $item->name }}
            </option>
@endforeach
            </select>
        </div>`;

            c1.innerHTML = '<input type="number" class="input-sm form-control text-center" placeholder="0" name="quantities[]">';

            c2.innerHTML = '<input type="number" class="input-sm form-control text-center" placeholder="0" name="rates[]">';

            c3.innerHTML = `
            <div class="btn-group btn-group-mini btn-corner">
                <button type="button"
                        onclick="delete_row(this)"
                        class="btn btn-xs btn-danger"
                        title="Delete">
                    <i class="ace-icon fa fa-trash-o"></i>
                </button>
            </div>`;

            $("table tbody").append(`
            <tr>
                <td colspan="4" style="text-align: right !important;">
                    <button type="button" onclick="create_row(this)"
                            class="btn btn-xs btn-inverse add_row r-btnAdd"> + Add New
                    </button>
                </td>
            </tr>`);

            chosen_trigger();
        }
    </script>
@endpush
