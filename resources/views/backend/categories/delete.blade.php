<!-- Deleted categories -->
<div class="modal fade" id="Deleted{{$category->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
   <div class="modal-dialog">
       <div class="modal-content">
           <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel"> {{ trans('backend/main-sidebar.deleteSection') }}</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
               </button>
           </div>
           <div class="modal-body">
               <form action="{{route('categories.destroy',$category->id)}}" method="post">
                   @method('DELETE')
                   @csrf

                   <div class="row">
                       <div class="col">
                           <label class="text-danger h6"> {{ trans('backend/main-sidebar.areUsure') }} ?</label>
                           <input type="text" value="{{$category->name}}" readonly class="form-control">
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
