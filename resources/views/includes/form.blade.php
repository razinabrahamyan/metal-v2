<h3 class="mb-3 mt-3 text-center">Закажите обратный звонок</h3>
<div class="card">
    <div class="card-body">
        <form id="wizard7" class="wizard needs-validation" data-style="1">
            <!--Step 1-->
            <h3>Account Information</h3>
            <div class="wizard-content wizard_form_products">
                <div class="h3 mb-4 text-center">Укажите вид и вес металлалома</div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="metalvid">Тип металла</label>
                        <select v-model="quiz_category" class="form-control" id="metalvid" name="metalvid">
                            @foreach($markets as $market)
                                @foreach($market->categories as $category)
                                    <option :value="{{$category->id}}">
                                        {{$category->title}}
                                    </option>
                                @endforeach
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="metaltype2">Вид металла</label>
                        <select class="form-control" name="metaltype2">
                            @foreach($markets as $market)
                                @foreach($market->categories as $category)
                                    @foreach($category->products as $product)
                                        <option v-if="quiz_category == {{$category->id}}"
                                                value="{{$product->title}}">
                                            {{$product->title}}
                                        </option>
                                    @endforeach
                                @endforeach
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="weight">Вес</label>
                        <input type="number" class="form-control" id="weight" name="weight" placeholder="Вес в кг."
                               min="1" required>
                    </div>
                </div>
            </div>
            <!--end: Step 1-->
            <!--Step 2-->
            <h3>Где вы находитесь?</h3>
            <div class="wizard-content">
                <div class="h3 mb-4 text-center">Дополнительная информация для выезда</div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="city">Укажите Город</label>
                        <select class="form-control" name="city">
                            <option value="Москва">Москва</option>
                            <option value="Московская область">Московская область</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="delivery">Нужен ли вывоз?</label>
                        <select class="form-control" name="delivery">
                            <option value="Да">Да</option>
                            <option value="Нет">Нет</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="demontazh">Нужен ли демонтаж?</label>
                        <select class="form-control" name="demontazh">
                            <option value="Да">Да</option>
                            <option value="Нет">Нет</option>
                        </select>
                    </div>
                </div>
            </div>
            <!--end: Step 2-->
            <!--Step 3-->
            <h3>Контактные данные</h3>
            <div class="wizard-content wizard_form_finish">
                <div class="h5 mb-4"></div>
                <div class="h3 mb-4 text-center">Контактные данные</div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="address">Ф.И.О.</label>
                        <input type="text" class="form-control wizard-required" name="full_name" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="address2">Телефон</label>
                        <input type="text" class="form-control wizard-required" minlength="15" name="phone"
                               required>
                    </div>
                </div>
            </div>
            <!--end: Step 3-->
        </form>
    </div>
</div>
@push('styles')
    <link href="{{asset('assets/jquery-steps/jquery.steps.css')}}" rel="preload" as="style" onload="this.rel='stylesheet'">
@endpush
@push('scripts')
    <script async src="{{asset('assets/validate/validate.min.js')}}"></script>
    <script src="{{asset('assets/jquery-steps/jquery.steps.min.js')}}"></script>
    <script async src="{{asset('assets/js/wizard_form.min.js')}}"></script>
@endpush
