<!-- Edit category -->
<div class="modal fade" id="Editcategory{{$category->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
   <div class="modal-dialog">
       <div class="modal-content">
           <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel"> {{ trans('backend/main-sidebar.editSection') }} </h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
               </button>
           </div>
           <div class="modal-body">
               <form action="{{route('categories.update','test')}}" method="post" autocomplete="off">
                   @method('PUT')
                   @csrf
                   {{-- Input hidden id --}}
                   <input type="hidden" name="id" value="{{$category->id}}">

                   <div class="row">

                       <div class="col">
                           <label>{{ trans('backend/main-sidebar.sectionName') }} </label>
                           <input type="text" name="name"  value="{{$category->getTranslation('name','ar')}}" class="form-control @error('name') is-invalid @enderror">
                           @error('name')
                           <div class="alert alert-danger">{{ $message }}</div>
                           @enderror
                       </div>

                       <div class="col">
                           <label>{{ trans('backend/main-sidebar.sectionNameInEnglish') }}   </label>
                           <input type="text" name="name_en" value="{{$category->getTranslation('name','en')}}" class="form-control @error('name_en') is-invalid @enderror" required>
                           @error('name_en')
                           <div class="alert alert-danger">{{ $message }}</div>
                           @enderror
                       </div>

                   </div>
                   <br>

                   <div class="row">
                       <div class="col">
                           <label>{{ trans('backend/main-sidebar.notes') }}</label>
                           <textarea class="form-control" name="notes" rows="5">
                               {{$category->notes}}
                           </textarea>
                       </div>
                   </div>


                   <div class="modal-footer">
                       <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('backend/main-sidebar.close') }}</button>
                       <button class="btn btn-primary">{{ trans('backend/main-sidebar.save') }}</button>
                   </div>

               </form>
           </div>
       </div>
   </div>
</div>
