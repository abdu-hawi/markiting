<div>
    <div x-data="{}">
        <div style="overflow-x: auto ">
            <table id="dtHorizontalExample" class="table table-striped table-bordered table-sm mt-2" cellspacing="0"
                   width="100%">
                <thead class="thead-dark">
                <tr>
                    <th scope="col" class="text-center">اسم المندوب</th>
                    <th scope="col" class="text-center">الكود</th>
                    <th scope="col" class="text-center">عدد المتاجر</th>
                    <th scope="col" class="text-center">المتاجر</th>
                    <th scope="col" class="text-center">الحالة</th>
{{--                    <th scope="col" class="text-center">إجمالي المبالغ الغير مدفوعة</th>--}}
{{--                    <th scope="col" class="text-center">وقت الانشاء</th>--}}
{{--                    <th scope="col" class="text-center">نهاية الاشتراك</th>--}}
{{--                    <th scope="col" class="text-center">المدينة</th>--}}
{{--                    <th scope="col" class="text-center">المبلغ المستحق</th>--}}
{{--                    <th scope="col" class="text-center">التفعيل</th>--}}
{{--                    <th scope="col" class="text-center">عرض التفاصيل</th>--}}
                </tr>
                </thead>
                <tbody>

{{--                <pre>{!! print_r($salesmen) !!}</pre>--}}
                @foreach($salesmen as $index => $salesman)
                    <tr>
                        <td>{!! $salesman->user->name !!}</td>
                        <td class="text-center">{!! $salesman['code'] !!}</td>
                        <td class="text-center">{!! $salesman['stores_count'] !!}</td>
                        <td class="text-center">
{{--                            @foreach($salesman['store'] as $store)--}}
{{--                                <table>--}}
{{--                                    <tr>--}}
{{--                                        <th>اسم الباقة</th>--}}
{{--                                        <th>المدفوعة</th>--}}
{{--                                        <th>الغير مدفوعة</th>--}}
{{--                                    </tr>--}}
{{--                                </table>--}}
{{--                            @endforeach--}}


                            @foreach($salesman->stores as $store)
                                @php
                                    $name = json_decode($store->pivot->package_data)->name
                                @endphp
                            @endforeach


                            {{--
                            <table class="table-primary w-100">
                                @foreach($salesman->stores as $store)
                                    <tr>
                                        <td>{!! json_decode($store->pivot->package_data)->name !!}</td>
                                        <td>{!! isset($package['paid']) ?? $package['paid']  !!}</td>
                                        <td>الغير مدفوعة</td>
                                    </tr>
                                @endforeach
                            </table>
                            --}}

                        </td>
                        <td class="text-center">{!! $salesman->user->isActive ? '<button class="btn btn-success btn-xs">مفعل</button>' : '<button class="btn btn-danger btn-xs">غير مفعل</button>' !!}</td>
{{--                        <td class="text-center  {!! $company['amount_type'] == 'fixed' ? 'bg-gradient-pink' : 'bg-primary' !!}">{!! $company['amount_type'] == 'fixed' ? 'مقطوعة' : 'نسبة مئوية' !!}</td>--}}
{{--                        <td class="text-center">{!! $company['amount'] !!}</td>--}}
{{--                        <td class="text-center">{!! $company['sales_owed'] !!}</td>--}}
{{--                        <td class="text-center">{!!  \Carbon\Carbon::createFromTimeStamp(strtotime($company['user']['created_at']))->diffForHumans() !!}</td>--}}
{{--                        <td class="text-center">{!!  \Carbon\Carbon::createFromTimeStamp(strtotime($company['expire_date']))->diffForHumans() !!}</td>--}}
{{--                        <td class="text-center">{!! $company['city']['name'] !!}</td>--}}
{{--                        <td class="text-center"></td>--}}
{{--                        <td class="text-center">{!! $company['isActive'] ? '<button class="btn btn-success btn-xs">مفعل</button>' : '<button class="btn btn-danger btn-xs">غير مفعل</button>' !!}</td>--}}
{{--                        <td class="text-center"><button class="btn btn-info btn-xs"><i class="fa fa-eye"></i></button></td>--}}
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
