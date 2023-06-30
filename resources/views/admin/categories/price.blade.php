<style>
    .fonts-custom > td  {
        font-size: 0.8em;
    }
    .fonts-custom > td > button {
        font-size: 1em;
    }
    /*input.form-control:not(:focus) {*/
    /*    border-color: #97f30ab0 !important;*/
    /*}*/
    .custom-width {
        min-width: 145px;
    }

    .custom-width input{
        color: white !important;
        font-size: 16px !important;
    }

</style>
@extends('admin.layouts.app')
@section('content')
    <div id="metal_price" class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-body">
                <!-- Basic table -->
                <section id="data_table_func">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <table class="datatables-basic-participants table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Наименование</th>
                                        <th>Маркет</th>
                                        <th>Категория</th>
                                        <th>от 1 т</th>
                                        <th>от 10 т</th>
                                        <th>от 50 т</th>
                                        <th>от 100 т</th>
                                        <th>Тип</th>
                                        <th>Действия</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $product)
                                        <tr role="row" class="odd fonts-custom">
                                            <td class="control" tabindex="0">{{$loop->iteration}}</td>
                                            <td>{{$product->title}}</td>
                                            <td>
                                                @if($product->market)
                                                    {{$product->market['title']}}
                                                @elseif($product->category['market'])
                                                    {{$product->category['market']['title']}}
                                                @else
                                                @endif
                                            </td>
                                            <td>
                                                @if($product->category)
                                                    {{$product->category['title']}}
                                                @endif
                                            </td>
                                            @csrf
                                            <td class="custom-width">
                                                <div class="input-group">
                                                    <input
                                                            type="text"
                                                            class="form-control numeral-mask-custom"
                                                            placeholder="Цена"
                                                            aria-label="Price"
                                                            name="price_below"
                                                            v-bind:value="setPrices[{{$product->id}}+'_price_below'] = '{{$product->price['price_below']}}'"
                                                            v-on:input="setPrices[{{$product->id}}+'_price_below'] = $event.target.value"
                                                    >
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">₽</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="custom-width">
                                                <div class="input-group">
                                                    <input
                                                            type="text"
                                                            class="form-control numeral-mask-custom"
                                                            placeholder="Цена"
                                                            aria-label="Price"
                                                            name="price_from_to"
                                                            v-bind:value="setPrices[{{$product->id}}+'_price_from_to'] = '{{$product->price['price_from_to']}}'"
                                                            v-on:input="setPrices[{{$product->id}}+'_price_from_to'] = $event.target.value"
                                                    >
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">₽</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="custom-width">
                                                <div class="input-group">
                                                    <input
                                                            type="text"
                                                            class="form-control numeral-mask-custom"
                                                            placeholder="Цена"
                                                            aria-label="Price"
                                                            name="price_above_from_to"
                                                            v-bind:value="setPrices[{{$product->id}}+'_price_above_from_to'] = '{{$product->price['price_above_from_to']}}'"
                                                            v-on:input="setPrices[{{$product->id}}+'_price_above_from_to'] = $event.target.value"
                                                    >
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">₽</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="custom-width">
                                                <div class="input-group">
                                                    <input
                                                            type="text"
                                                            class="form-control numeral-mask-custom"
                                                            placeholder="Цена"
                                                            aria-label="Price"
                                                            name="by_wholesale"
                                                            v-bind:value="setPrices[{{$product->id}}+'_by_wholesale'] = '{{$product->price['by_wholesale']}}'"
                                                            v-on:input="setPrices[{{$product->id}}+'_by_wholesale'] = $event.target.value"
                                                    >
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">₽</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="custom-control custom-control-primary custom-switch">
                                                    <input
                                                            type="checkbox"
                                                            class="custom-control-input"
                                                            id="customSwitch_{{$product->id}}"
                                                            @if($product->price['weight'] === 'ton') checked @endif
                                                            v-bind:value="setPrices[{{$product->id}}+'_weight'] = ' {{$product->price['weight']}}'"
                                                            v-on:change="setPrices[{{$product->id}}+'_weight'] = $event.target.checked ? 'ton' : 'kilogram'"
                                                            onclick="yesno(this, 'yesnos{{$product->id}}');"
                                                    />
                                                    <label name="yesnos{{$product->id}}" id="yesnos{{$product->id}}" class="custom-control-label" for="customSwitch_{{$product->id}}">
                                                        {{setPrices[<?echo $product->id ?>+'_weight']}}
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <button
                                                        class="btn btn-flat-primary"
                                                        data-id="{{$product->id}}"
                                                        @click="submit($event, '{{route('metal.price.update', $product->id)}}', '{{$product->title}}')"
                                                >
                                                    Сохранить
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
                <!--/ Basic table -->

            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap4.min.css')}}">
    {{--    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css')}}">--}}
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/extensions/toastr.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/plugins/extensions/ext-component-toastr.css')}}">
    <style>
        .dark-layout .custom-switch .custom-control-input:not(:checked) ~ .custom-control-label:before {
            background-color: #e8872b;
        }
        .custom-control-primary .custom-control-input:checked ~ .custom-control-label::before,
        .custom-control-primary .custom-control-input:active ~ .custom-control-label::before {
            border-color: #08adc1;
            background-color: #08adc1;
        }
    </style>
@endpush

<script>
    const TABLE_PAGE = 'user'
</script>
@push('scripts')
    <script src="{{asset('admin/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('admin/app-assets/vendors/js/tables/datatable/responsive.bootstrap4.js')}}"></script>
    <script src="{{asset('admin/app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js')}}"></script>
    <script src="{{asset('admin/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js')}}"></script>
    <script src="{{asset('admin/app-assets/vendors/js/tables/datatable/jszip.min.js')}}"></script>
    <script src="{{asset('admin/app-assets/vendors/js/tables/datatable/pdfmake.min.js')}}"></script>
    <script src="{{asset('admin/app-assets/vendors/js/tables/datatable/vfs_fonts.js')}}"></script>
    <script src="{{asset('admin/app-assets/vendors/js/tables/datatable/buttons.html5.min.js')}}"></script>
    <script src="{{asset('admin/app-assets/vendors/js/tables/datatable/buttons.print.min.js')}}"></script>
    <script src="{{asset('admin/app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js')}}"></script>
    <script src="{{asset('admin/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>
    <script src="{{asset('admin/app-assets/vendors/js/forms/cleave/cleave.min.js')}}"></script>
    <script src="{{asset('admin/app-assets/js/scripts/forms/form-input-mask.min.js')}}"></script>
    <script src="{{asset('admin/app-assets/vendors/js/extensions/toastr.min.js')}}"></script>
    <script src="{{asset('admin/app-assets/js/scripts/extensions/ext-component-toastr.js')}}"></script>
    <script src="{{asset('admin/custom-js/dataTable.js')}}"></script>

    <script>
        function yesno(chk, label) {
            document.getElementById(label).innerHTML = chk.checked ? "ton" : "kilogram";
        }
        let vue = new Vue({
            el: '#metal_price',
            data : {
                setPrices: [],
            },
            methods : {
                submit : function(e, route, title){
                    let dataId = e.target.getAttribute('data-id')
                    const payload = {
                        by_wholesale: this.setPrices[dataId + '_by_wholesale'],
                        price_above_from_to: this.setPrices[dataId + '_price_above_from_to'],
                        price_below: this.setPrices[dataId + '_price_below'],
                        price_from_to: this.setPrices[dataId + '_price_from_to'],
                        weight: this.setPrices[dataId + '_weight'],
                    }
                    axios.post(route, payload)
                        .then(result => {
                            toastr['success'](title, 'Цена успешно обновлена!', {
                                positionClass: 'toast-top-center',
                            });
                        })
                }
            },
            mounted() {
                $('.numeral-mask-custom').toArray().forEach(function(field) {
                    new Cleave(field, {
                        numeral: true,
                        delimiter: ' ',
                        numeralThousandsGroupStyle: 'thousand'
                    });
                })
            }
        })
    </script>
@endpush