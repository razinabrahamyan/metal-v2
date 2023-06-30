<style>
    .custom-width {
        min-width: 150px;
    }

    .custom-width input{
        width: 120px;
        color: white !important;
        font-size: 16px !important;
    }
</style>
@extends('admin.layouts.app')
@section('content')
    <div id="marquee_price" class="app-content content">
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
                                        <th>Цена</th>
                                        <th>Направление</th>
                                        <th>Действия</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($marquees as $item)
                                        <tr role="row" class="odd fonts-custom">
                                            <td class="control" tabindex="0">{{$loop->iteration}}</td>
                                            <td>{{$item->title}}</td>
                                            <td class="custom-width">
                                                <div class="input-group mb-3 ml-0 col-6">
                                                    <input
                                                            type="text"
                                                            class="form-control"
                                                            value="{{mb_substr($item->price, 0, -1)}}"
                                                            placeholder="Цена"
                                                            aria-label="Price"
                                                            name="price"
                                                            v-bind:value="setPrices[{{$item->id}}+'_price'] = '{{mb_substr($item->price, 0, -1)}}'"
                                                            v-on:input="setPrices[{{$item->id}}+'_price'] = $event.target.value"
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
                                                            id="customSwitch_{{$item->id}}"
                                                            @if($item->direction === 'up') checked @endif
                                                            v-bind:value="setPrices[{{$item->id}}+'_direction'] = ' {{$item->direction}}'"
                                                            v-on:change="setPrices[{{$item->id}}+'_direction'] = $event.target.checked ? 'up' : 'down'"
                                                            onclick="yesno(this, 'yesnos{{$item->id}}');"
                                                    />
                                                    <label name="yesnos{{$item->id}}" id="yesnos{{$item->id}}" class="custom-control-label" for="customSwitch_{{$item->id}}">
                                                        {{setPrices[<?echo $item->id ?>+'_direction']}}
                                                    </label>
                                                </div>
                                                {{--                                                {{$item->direction}}--}}
                                            </td>
                                            <td>
                                                <button
                                                        class="btn btn-flat-primary"
                                                        data-id="{{$item->id}}"
                                                        @click="submit($event, '{{route('marquee.price.update', $item->id)}}', '{{$item->title}}')"
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
            document.getElementById(label).innerHTML = chk.checked ? "up" : "down";
        }
        let vue = new Vue({
            el: '#marquee_price',
            data : {
                setPrices: [],
            },
            methods : {
                submit : function(e, route, title){
                    let dataId = e.target.getAttribute('data-id')
                    const payload = {
                        price: this.setPrices[dataId + '_price'] + '₽',
                        direction: this.setPrices[dataId + '_direction'],
                    }
                    // console.log(payload, 'ddddddd')
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