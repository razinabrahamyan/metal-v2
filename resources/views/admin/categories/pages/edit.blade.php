@extends('admin.layouts.app')
@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-body">
                <!-- Blog Edit -->
                <div class="blog-edit-wrapper">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div id="content_edit" class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <h3>Content title</h3>
                                            <p class="card-text mt-2">Updated:&ensp;
                                                <span class="text-info">
                                                    {{\Carbon\Carbon::parse($content->created_at)->format('M d, Y')}}
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                    <!-- Form -->
                                    <form action="" class="mt-2">
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-slug" class="font-medium-2">Slug</label>
                                                    <input type="text" id="blog-edit-slug" class="form-control" value="{{$slug}}" readonly/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group mb-2">
                                                <label class="dark-layout font-medium-2">Текст</label>
                                                <div id="editor1">{!! $content->content_text !!}</div>
                                            </div>
                                        </div>
                                        <div class="col-12 mt-50">
                                            <button type="submit" class="btn btn-primary mr-1" @click="submit($event, '{{route('content.update', $content->id)}}')">Save Changes</button>
                                        </div>
                                    </form>
                                    <!--/ Form -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--/ Blog Edit -->

            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/extensions/toastr.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/plugins/extensions/ext-component-toastr.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endpush

@push('scripts')
    <script src="{{asset('admin/app-assets/vendors/js/extensions/toastr.min.js')}}"></script>
    <script src="{{asset('admin/app-assets/js/scripts/extensions/ext-component-toastr.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#editor1').summernote();
            // $('#editor2').summernote();
        });
        let vue = new Vue({
            el: '#content_edit',
            data : {
                setPrices: [],
            },
            methods : {
                submit : function(e, route){
                    e.preventDefault()
                    let text1 = $('#editor1').text()
                    const payload = {
                        text : text1.length > 0 ? $("#editor1").summernote('code') : null,
                    }
                    axios.post(route, payload)
                        .then(result => {
                            toastr['success']( 'Контент успешно обновлен!', 'Редактирование', {
                                positionClass: 'toast-top-center',
                            });
                        })
                    .catch(err => {
                        toastr['error'](err, 'Изменения не сохранены!', {
                            positionClass: 'toast-top-center',
                        });
                    })
                }
            }
        })
    </script>
@endpush
