@extends('admin.layouts.app')
@section('content')
    <div id="meta_keyword" class="app-content content">
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
                                        <th>Страницы</th>
                                        <th>Title</th>
                                        <th>Ключевые слова</th>
                                        <th>Meta description</th>
                                        <th>Действия</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($keywords as $keyword)

                                        <tr role="row" class="odd fonts-custom">
                                            <td class="control" tabindex="0">{{$keyword->id}}</td>
                                            <td>{{$keyword->name}}</td>
                                            <td>
                                                @if(isset($keyword->meta['title']))
                                                    <div class="form-group" id="">
                                                        <label for="exampleFormControlTextarea2"></label>
                                                        <textarea ref="{{$keyword->id}}{{$keyword->id}}{{$keyword->name}}"
                                                                  class="form-control" id="exampleFormControlTextarea2"
                                                                  rows="50" cols="10" placeholder="Title"
                                                                  style="margin-top: 0px; margin-bottom: 0px; height: 200px; min-width: 250px">{{$keyword->meta['title']}}</textarea>
                                                    </div>
                                                @else
                                                    <h5>Статический заголовок</h5>
                                                @endif
                                            </td>
                                            <td class="custom-width">
                                                <input
                                                        ref="{{$keyword->name}}"
                                                        type="text"
                                                        value="{{$keyword->meta['keywords']}}"
                                                        data-role="tagsinput"
                                                        class="form-control"
                                                >
                                            </td>
                                            <td>
                                                <div class="form-group" id="meta_desc">
                                                    <label for="exampleFormControlTextarea1"></label>
                                                    <textarea ref="{{$keyword->id}}{{$keyword->name}}"
                                                              class="form-control" id="exampleFormControlTextarea1"
                                                              rows="50" cols="10" placeholder="Meta description"
                                                              style="margin-top: 0px; margin-bottom: 0px; height: 129px; min-width: 400px">{{$keyword->meta['description']}}</textarea>
                                                </div>
                                            </td>
                                            <td>
                                                <button
                                                        class="btn btn-flat-primary"
                                                        data-id="{{$keyword->id}}"
                                                        @click="submit($event, '{{route('meta.keywords.update',
                                                                $keyword->meta['id'])}}',
                                                                '{{$keyword->name}}',
                                                                '{{$keyword->id}}{{$keyword->name}}',
                                                                '{{$keyword->id}}{{$keyword->id}}{{$keyword->name}}'
                                                                )"
                                                >
                                                    Сохранить
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="row">
                                    <div class="col-12">
                                        <nav aria-label="Page navigation" id="pagination_links">
                                            {{$keywords->links()}}
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
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
    <link rel="stylesheet" type="text/css"
          href="{{asset('admin/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('admin/app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('admin/app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('admin/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/extensions/toastr.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('admin/app-assets/css/plugins/extensions/ext-component-toastr.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/tagsinput.css')}}">
    <style>
        .bootstrap-tagsinput {
            background-color: #343d55;
            border: 1px solid #283046;
            display: block;
            padding: 4px 6px;
            color: #555;
            vertical-align: middle;
            border-radius: 4px;
            min-height: 100px;
            max-width: 100%;
            line-height: 22px;
            cursor: text;
        }

        .bootstrap-tagsinput input {
            color: white;
            border: none;
            box-shadow: none;
            outline: none;
            background-color: transparent;
            padding: 0 6px;
            margin: 0;
            width: auto;
            max-width: inherit;
        }

        .bootstrap-tagsinput .badge-info {
            color: #fff;
            background-color: #8177e5;
            margin: 3px;
            font-size: 14px;
        }
    </style>
    <style>
        #pagination_links ul {
            -ms-flex-pack: center !important;
            justify-content: center !important;
            margin-top: 1.5rem !important;
        }

        #DataTables_Table_0_paginate {
            display: none;
        }
    </style>
    <style>
        .custom-width {
            width: 65%;
        }
        .custom-width-meta {
            width: 30%;
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
    <script src="{{asset('admin/app-assets/js/scripts/forms/form-input-mask.min.js')}}"></script>
    <script src="{{asset('admin/app-assets/vendors/js/extensions/toastr.min.js')}}"></script>
    <script src="{{asset('admin/app-assets/js/scripts/extensions/ext-component-toastr.js')}}"></script>
    <script src="{{asset('admin/custom-js/dataTable.js')}}"></script>
    <script src="{{asset('admin/assets/js/tagsinput.js')}}"></script>

    <script>
        let vue = new Vue({
            el: '#meta_keyword',
            methods: {
                submit: function (e, route, title, description, page_title) {
                    const payload = {
                        keywords: this.$refs[title].value,
                        meta_description: this.$refs[description].value,
                        slug: title,
                        title: this.$refs[page_title] ? this.$refs[page_title].value : null

                    }
                    console.log(payload)
                    axios.post(route, payload)
                        .then(result => {
                            toastr['success'](title, 'Запись успешно обновлена!', {
                                positionClass: 'toast-top-center',
                            });
                        })
                }
            }
        })
    </script>
@endpush