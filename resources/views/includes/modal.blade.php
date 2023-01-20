{{-- Small Modal --}}
<div class="modal fade" id="smallModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title text-center" id="exampleModalLabel">Only CVS file</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
         </div>
         <div class="modal-body">
            <form action="{{ url('csv_import') }}" method="post" class="needs-validation" >
                @csrf
                <div class="row justify-content-center">
                    <div class="form-group col-md-8">
                       <input type="file" class="form-control cvsFile" id="image" name="csv_import" required>
                    </div>
                    <div class="form-group col-md-4">
                       <button class="btn btn-sm btn-success btn-block py-2">Input CVS file</button>
                    </div>
                </div>
            </form>
         </div>
      </div>
   </div>
</div>

{{--  Small : <div class="modal-dialog modal-sm">
      Large :  modal-lg
      Extra Large : modal-xl  --}}
