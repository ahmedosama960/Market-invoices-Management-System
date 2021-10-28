@extends('layouts.master')

@section('title')
        {{ trans('backend/invoices.Add new Invoice') }}
@endsection

@section('css')

@endsection

@section('content')

    <div class="page-title">
        <div class="row">
            <div class="col-sm-6"> {{ trans('backend/invoices.Add new Invoice') }}  <h4 class="mb-0">   </h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('backend/invoices.Home') }}</a></li>
                    <li class="breadcrumb-item active">{{ trans('backend/invoices.Invoices List') }} </li>
                </ol>
            </div>
        </div>
    </div>

    @include('massage')

    <!-- main body -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <form action="{{route('invoices.store')}}" method="post" autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <label>{{ trans('backend/invoices.Invoice number') }} </label>
                                <input type="text" name="invoice_number" value="{{old('invoice_number')}}"
                                       class="form-control @error('invoice_number') is-invalid @enderror" required>
                                @error('invoice_number')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="col">
                                <label>{{ trans('backend/invoices.Invoice date') }} </label>
                                <input class="form-control" type="text" id="datepicker-action" name="invoice_date"
                                       data-date-format="yyyy-mm-dd" title=" {{ trans('backend/invoices.Please enter the invoice date') }}" required>
                                @error('invoice_date')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <br>

                        <div class="row">

                            <div class="col">
                                <label>{{ trans('backend/invoices.Sections') }}</label>
                                <select name="category_id"
                                        class="category_product form-control p-1  @error('category_id') is-invalid @enderror" required>
                                    <option value="" disabled selected> {{ trans('backend/invoices.Choose from the list') }}</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col">
                                <label>{{ trans('backend/invoices.Products') }}</label>

                                <select name="product_id"
                                        class="product_id form-control p-1 @error('product_id') is-invalid @enderror">
                                        <option value="" disabled selected> {{ trans('backend/invoices.Choose from the list') }}</option>
                                    </select>
                                @error('product_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col">
                                <label>{{ trans('backend/invoices.Product price') }} </label>
                                <input type="number" name="price" readonly id="price"
                                       class="price form-control @error('amount_collection') is-invalid  @enderror">
                                @error('price')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col">
                                <label>{{ trans('backend/invoices.Discount') }}</label>
                                <input type="number" name="discount" value="0" id="discount"
                                       class="form-control @error('discount') is-invalid @enderror">
                                @error('discount')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col">
                                <label>{{ trans('backend/invoices.Total after discount') }}</label>
                                <input type="number" name="total_after_discount" id="total_after_discount" value="0"
                                       readonly class="form-control @error('discount') is-invalid @enderror">
                                @error('discount')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <br>

                        <div class="row">

                            <div class="col-6">

                                <label>{{ trans('backend/invoices.Tax Rate') }} </label>
                                <select name="tax_rate" id="tax_rate" class="form-control p-1">
                                    <option value="" selected disabled> {{ trans('backend/invoices.Select the tax rate') }} </option>
                                    <option value="5">5%</option>
                                    <option value="10">10%</option>
                                </select>
                                @error('tax_rate')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="col">
                                <label>{{ trans('backend/invoices.Value of the Tax') }}  </label>
                                <input type="text" readonly name="tax_value" id="tax_value"
                                       class="form-control @error('value_vat') is-invalid @enderror">
                                @error('value_vat')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col">
                                <label>{{ trans('backend/invoices.Total') }}</label>
                                <input type="text" readonly name="total" id="total"
                                       class="form-control @error('total') is-invalid @enderror">
                                @error('total')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <br>

                        <div class="row">
                            <div class="col">
                                <label>{{ trans('backend/invoices.Notes') }}</label>
                                <textarea rows="5" class="form-control" name="notes"></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <button class="btn btn-success">{{ trans('backend/invoices.Saving Data') }} </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @endsection

            @section('js')

                {{-- get products --}}
                <script>
                let cat=document.querySelector('.category_product');
                   cat.onchange = function(){
                    let cat_id=this.value;
                    var url = `/getProducts/${cat_id}`;
                    fetch(url,{
                    method: "GET",
                    headers: {
                        /* Headers data should be sent*/
                        "Content-Type": "application/json",
                        "Accept": "application/json",
                    },
                    }).then((response) => {

                        return response.json();

                    }).then((data) => {
                        /*this is a method to use the return data to show it in the template*/
                    console.log(data);
                    appendElements(data);
                    });
                    }

                    function appendElements(data){
                        let app=document.querySelector('.product_id');
                        data.forEach(element => {
                            let option = document.createElement('option');
                            option.value = element.id;
                            option.textContent = element.name['{{App::getLocale()}}'];
                            option.setAttribute('data-price',element.price);
                            app.append(option);
                        });

                    }

                    /* {{-- get price --}} */
                    document.querySelector('.product_id').onchange=function(){

                    let pro_id=this.value;
                    var url = `/getProductPrice/${pro_id}`;
                    fetch(url,{
                    method: "GET",
                    headers: {
                        /* Headers data should be sent*/
                        "Content-Type": "application/json",
                        "Accept": "application/json",
                    },
                    }).then((response) => {
                        return response.json();
                    }).then((data) => {
                        document.querySelector('.price').value=parseInt(data[0].price);
                        document.querySelector('#total_after_discount').value=parseInt(data[0].price);
                        document.querySelector('#total').value=parseInt(data[0].price);
                    });
                    }


                    // set The discount

                    document.querySelector("#discount").onkeyup=function(e){
                        console.log(this.value)
                        if(this.value < 0 || Number.isNaN(this.value) || this.value == '' ){
                            this.value = 0

                        }
                        else{
                            if(document.querySelector('.price').value != '' || this.value < 0 ){
                                document.querySelector('#total_after_discount').value=document.querySelector('.price').value - this.value;
                                document.querySelector('#total').value=document.querySelector('.price').value - this.value;
                            }
                        }
                        if(this.value > document.querySelector('.price').value){
                            this.value=document.querySelector('.price').value;
                            document.querySelector('#total_after_discount').value=0;
                            document.querySelector('#total').value=0
                        }
                    }


                    // set the taxes

                    document.querySelector('#tax_rate').onchange=function(){
                        let rate=this.value;
                        let total=document.querySelector('#total_after_discount').value
                        let tax_value=total/100*rate
                        document.querySelector('#tax_value').value=tax_value;
                        document.querySelector('#total').value=parseFloat(total)+parseFloat(tax_value);
                    }
                </script>


                <script>



                </script>


                <script>

                </script>




@endsection
