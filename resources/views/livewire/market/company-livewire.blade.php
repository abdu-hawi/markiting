<div>
    <div x-data="{}">
        <div style="overflow-x: auto ">
            <table id="dtHorizontalExample" class="table table-striped table-bordered table-sm mt-2" cellspacing="0"
                   width="100%">
                <thead class="thead-dark">
                <tr>
                    <th scope="col" class="text-center">اسم الشركة</th>
                    <th scope="col" class="text-center">الكود المختصر</th>
                    <th scope="col" class="text-center">العمولة</th>
                    <th scope="col" class="text-center">نسبة الخصم من الباقة</th>
                    <th scope="col" class="text-center">نسبة فائدة المنصة</th>
                    <th scope="col" class="text-center">وقت الانشاء</th>
                    <th scope="col" class="text-center">نهاية الاشتراك</th>
                    <th scope="col" class="text-center">المدينة</th>
                    <th scope="col" class="text-center">المبلغ المستحق</th>
                    <th scope="col" class="text-center">التفعيل</th>
                    <th scope="col" class="text-center">عرض التفاصيل</th>
                </tr>
                </thead>
                <tbody>

{{--                <pre>{!! print_r($companies) !!}</pre>--}}
                @foreach($companies as $index => $company)
                    <tr>
                        <td>{!! $company['user']['name'] !!}</td>
                        <td class="text-center">{!! $company['company_code'] !!}</td>
{{--                        <td class="text-center">{!! $company['amount_type'] !!}</td>--}}
                        <td class="text-center  {!! $company['amount_type'] == 'fixed' ? 'bg-gradient-pink' : 'bg-primary' !!}">{!! $company['amount_type'] == 'fixed' ? 'مقطوعة' : 'نسبة مئوية' !!}</td>
                        <td class="text-center">{!! $company['amount'] !!}</td>
                        <td class="text-center">{!! $company['sales_owed'] !!}</td>
                        <td class="text-center">{!!  \Carbon\Carbon::createFromTimeStamp(strtotime($company['user']['created_at']))->diffForHumans() !!}</td>
                        <td class="text-center">{!!  \Carbon\Carbon::createFromTimeStamp(strtotime($company['expire_date']))->diffForHumans() !!}</td>
                        <td class="text-center">{!! $company['city']['name'] !!}</td>
                        <td class="text-center"></td>
                        <td class="text-center">{!! $company['isActive'] ? '<button class="btn btn-success btn-xs">مفعل</button>' : '<button class="btn btn-danger btn-xs">غير مفعل</button>' !!}</td>
                        <td class="text-center"><button class="btn btn-info btn-xs"><i class="fa fa-eye"></i></button></td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
