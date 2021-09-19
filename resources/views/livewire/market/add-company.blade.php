<div>
    <button class="btn btn-success" type="button" data-toggle="collapse" data-target="#collapseNewCompany" aria-expanded="false" aria-controls="collapseNewCompany">New Company</button>
    <div class="p-2 collapse" id="collapseNewCompany" wire:ignore.self>

        <label class="col-md-5">
            <input type="text" class="form-control {!!  $errors->has('name') ? 'is-invalid' : '' !!}"
                   placeholder="اسم الشركة"
                   wire:model="name"
                   wire:model.debounce.500ms="name">
            @error('name') <span class="error text-danger">{{ $message }}</span> @enderror
        </label>

        <label class="col-md-5">
            <input type="email" class="form-control {!!  $errors->has('email') ? 'is-invalid' : '' !!}"
                   placeholder="البريد الالكتروني"
                   wire:model="email"
                   wire:model.debounce.500ms="email">
            @error('email') <span class="error text-danger">{{ $message }}</span> @enderror
        </label>

        <div class="row m-0">
            <label class="form-group col-md-5">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="city_id">المدينة</label>
                    </div>
                    <select class="custom-select form-control" name="city_id" wire:model="selectedCity">
                        <option value="" selected>فضلا اختر المدينة</option>
                        @foreach(App\Models\City::query()->where('locale','ar')->join('cities','cities.id','=','city_translations.city_id')->where('country_id',1)->get() as $city)
                            <option value="{!! $city->id !!}">{!! $city->name !!}</option>
                        @endforeach
                    </select>
                </div>
                @error('selectedCity') <span class="error text-danger">{{ $message }}</span> @enderror
            </label>

            @if (!is_null($selectedCity))
                <label class="form-group col-md-5">
                    <label class="input-group">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="geolocation_id">المنطقة الجغرافية</label>
                        </div>
                        <select class="custom-select {!!  $errors->has('selectedGeolocation') ? 'is-invalid' : '' !!}" id="geolocation_id"
                                wire:model="selectedGeolocation">
                            <option selected>فضلا اختر المنطقة الجغرافية</option>
                            @foreach($geolocations as $geolocation)
                                <option value="{!! $geolocation->id !!}"> {!! $geolocation->name !!}</option>
                            @endforeach
                        </select>
                    </label>
                    @error('selectedGeolocation') <span class="error text-danger">{{ $message }}</span> @enderror
                </label>
            @endif
        </div>

        <label class="col-md-5 ">
            <label class="input-group ">
{{--                <div class="input-group-prepend">--}}
                    <span class="input-group-prepend input-group-text" id="basic-addon1">+966</span>
{{--                </div>--}}
                <input type="tel" class="form-control {!!  $errors->has('mobile') ? 'is-invalid' : '' !!}"
                       placeholder="رقم الجوال"
                       wire:model="mobile"
                       wire:model.debounce.500ms="mobile">
            </label>
            @error('mobile') <span class="error text-danger">{{ $message }}</span> @enderror
        </label>


        <label class="col-md-5">
            <input type="text" class="form-control {!!  $errors->has('company_code') ? 'is-invalid' : '' !!}"
                   placeholder="رمز الشركة - حرف او رقم واحد فقط"
                   wire:model="company_code"
                   wire:model.debounce.500ms="company_code">
            @error('company_code') <span class="error text-danger">{{ $message }}</span> @enderror
        </label>

        <label class="col-md-5">
            <input type="date" class="form-control {!!  $errors->has('expire_date') ? 'is-invalid' : '' !!}"
                   placeholder="تاريخ إنتهاء الاشتراك"
                   wire:model="expire_date"
                   wire:model.debounce.500ms="expire_date">
            @error('expire_date') <span class="error text-danger">{{ $message }}</span> @enderror
        </label>

        <label class="col-md-5">
            <div class="input-group">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">اختر نوع العمولة</label>
                </div>
                <select class="custom-select {!!  $errors->has('amount_type') ? 'is-invalid' : '' !!}" id="inputGroupSelect01"
                        wire:model="amount_type">
                    <option value="" selected>فضلا اختر نوع العمولة</option>
                    <option value="percent">نسبة مئوية</option>
                    <option value="fixed">مقطوعة</option>
                </select>
            </div>
            @error('amount_type') <span class="error text-danger">{{ $message }}</span> @enderror
        </label>

        <label class="col-md-5">
            <input type="number" class="form-control {!!  $errors->has('amount') ? 'is-invalid' : '' !!}"
                   placeholder="نسبة الخصم"
                   wire:model="amount">
            @error('amount') <span class="error text-danger">{{ $message }}</span> @enderror
        </label>

        <label class="col-md-5">
            <input type="number" class="form-control {!!  $errors->has('sales_owed') ? 'is-invalid' : '' !!}"
                   placeholder="نسبة استحقاق شركة التسويق"
                   wire:model="sales_owed" wire:model.debounce.500ms="sales_owed">
            @error('sales_owed') <span class="error text-danger">{{ $message }}</span> @enderror
        </label>

        <br>

        @if(!is_null($amount_type))
            <table class="table table-bordered text-center">
                <thead>
                <tr>
                    <th>اسم الباقة</th>
                    <th>قيمة الباقة</th>
                    <th>نوع الخصم</th>
                    <th>الخصم</th>
                    <th>القيمة بعد الخصم</th>
                    {!! $amount_type == 'fixed' ?  '' : '<th>نسبة المسوق</th>' !!}
                    <th>استحقاق المسوق</th>
                    {!! $amount_type == 'fixed' ? '' : '<th>نسبة المنصة</th>' !!}
                    <th>استحقاق المنصة</th>
                </tr>
                </thead>
                <tbody>
                @foreach($packagesOwed as $package)
                    <tr>
                        <td>{!! $package['name'] !!}</td>
                        <td>{!! $package['price'] !!}</td>
                        <td>{!! $amount_type == '' ? '' : ($amount_type == 'fixed' ? 'مقطوعة' : 'نسبة مئوية') !!}</td>
                        <td>{!! $amount !!} {!! $amount_type == 'fixed' ? 'ريال' : '%' !!}</td>
                        <td>{!! $package['price_after_discount'] !!} ريال</td>
                        {!! $amount_type != 'fixed' ? '<td>'.$package['sales_owed'].' %</td>' : 'ريال' !!}
                        <td>{!! $package['sales_price'] !!} ريال</td>
                        {!! $amount_type != 'fixed' ? '<td>'.$package['our_owed'].' %</td>' : 'ريال' !!}
                        <td>{!! $package['our_price'] !!} ريال</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif



        <button class="btn-primary btn-sm" wire:click.prevent="addCompany()" onclick="this.blur();">Save</button>
    </div>
</div>
