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

                {{--

                @foreach($companies as $index => $company)
                    <tr>
                        <td>
                            @if($editQualificationsIndex !== $index)
                                {!! $qualification['name_ar'] !!}
                            @else
                                <input
                                    @click.away="$wire.editQualificationField === '{!! $index !!}.name_ar ? wire.saveQualification({!! $index !!}) : null"
                                    type="text" class="form-control {!!  $errors->has('qualifications.'.$index.'.name_ar') ? 'is-invalid' : '' !!}"
                                    wire:model.defer="qualifications.{!! $index !!}.name_ar"
                                    wire:model.debounce.500ms="qualifications.{!! $index !!}.name_ar">
                                @error('qualifications.'.$index.'.name_ar') <span class="error text-danger">{{ $message }}</span> @enderror
                            @endif
                        </td>
                        <td>
                            @if($editQualificationsIndex !== $index)
                                {!! $qualification['name_en'] !!}
                            @else
                                <input
                                    @click.away="$wire.editQualificationField === '{!! $index !!}.name_en ? wire.saveQualification({!! $index !!}) : null"
                                    type="text" class="form-control {!!  $errors->has('qualifications.'.$index.'.name_en') ? 'is-invalid' : '' !!}"
                                    wire:model.defer="qualifications.{!! $index !!}.name_en"
                                    wire:model.debounce.500ms="qualifications.{!! $index !!}.name_en">
                                @error('qualifications.'.$index.'.name_en') <span class="error text-danger">{{ $message }}</span> @enderror
                            @endif
                        </td>
                        <td class="text-center">
                            @if($editQualificationsIndex !== $index)
                                <button class="btn btn-primary btn-xs" wire:click.prevent="editQualification({!! $index !!})">Edit</button>
                            @else
                                <button class="btn btn-outline-primary btn-xs" wire:click.prevent="saveQualification({!! $index !!})">Save</button>
                            @endif
                        </td>
                        <td class="text-center">
                            <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#deleteModal{!! $index !!}">Delete</button>
                        </td>
                    </tr>
                    {{-- delete modal -}}
                    <div class="modal fade" id="deleteModal{!! $index !!}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    Are you sure you want delete <b class="text-red"> {!! $qualification['name_en'] !!}</b> ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button"
                                            class="btn btn-danger"
                                            wire:click.prevent="deleteQualification({!! $qualification['id'] !!})"
                                            data-dismiss="modal">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                --}}
                </tbody>
            </table>
        </div>
    </div>
</div>
