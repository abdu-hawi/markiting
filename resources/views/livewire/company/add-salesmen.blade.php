<div>
    <button class="btn btn-success" type="button" data-toggle="collapse" data-target="#collapseNewCompany" aria-expanded="false" aria-controls="collapseNewCompany">
        {!! trans('market.company.addSales.New Salesman') !!}</button>

    <div class="p-2 collapse" id="collapseNewCompany" wire:ignore.self>

        <div>
            {!! trans('market.company.addSales.Salesman email') !!}
        </div>
        <label class="col-md-3">
            <input type="text" class="form-control {!!  $errors->has('name') ? 'is-invalid' : '' !!}"
                   placeholder="{!! trans('market.company.addSales.Salesman name') !!}"
                   wire:model="name"
                   wire:model.debounce.500ms="name">
            @error('name') <span class="error text-danger">{{ $message }}</span> @enderror
        </label>

        <div>
            {!! trans('market.company.addSales.Salesman email') !!}
        </div>
        <label class="col-md-3">
            <input type="email" class="form-control {!!  $errors->has('email') ? 'is-invalid' : '' !!}"
                   placeholder="{!! trans('market.company.addSales.Salesman email') !!}"
                   wire:model="email"
                   wire:model.debounce.500ms="email">
            @error('email') <span class="error text-danger">{{ $message }}</span> @enderror
        </label>

        <div>
            {!! trans('market.company.addSales.Write code content 4 digits') !!}
        </div>
        <label class="col-md-3 ">
            <label class="input-group ">
                <input type="text" class="form-control {!!  $errors->has('full_code') ? 'is-invalid' : '' !!}" max="4"
                       placeholder="{!! trans('market.company.addSales.Write code content 4 digits') !!}"
                       wire:model="code"
                       wire:model.debounce.500ms="code">
                <span class="input-group-prepend input-group-text" id="basic-addon1">{!! $company_code !!}</span>
            </label>
{{--            @error('full_code') <span class="error text-danger">{{ $message }}</span> @enderror--}}
        </label>




        <div>
            {!! trans('market.company.addSales.Salesman code') !!}
        </div>
        <label class="col-md-3 ">
            <label class="input-group ">
                <input type="text" class="form-control {!!  $errors->has('full_code') ? 'is-invalid' : '' !!}"
                       value="{!! $full_code !!}" disabled>
            </label>
            @error('full_code') <span class="error text-danger">{{ $message }}</span> @enderror
        </label>

        <br>

        <button class="btn-primary btn-sm" wire:click.prevent="addSalesman()" onclick="this.blur();">Save</button>
    </div>

</div>
