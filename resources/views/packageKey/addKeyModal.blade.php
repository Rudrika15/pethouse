

<div class="modal fade text-dark" id="addKeyModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content card-3d-shadow-radius">
            <div class="modal-header" style="position: relative;">
                <h5 class="modal-title">Add Package Key</h5>

                <button type="button" class="btn btn-danger btn-shadow" style="position: absolute;right:12px;"
                    data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i></button>

            </div>
            <form method="POST" action="{{route('packagekey.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    <div class="col-md-12 mb-2">
                        <div class="form-floating">
                            <input type="text" class="form-control @if($errors->AddKeyError->first('keyTitle')) is-invalid @endif" value="{{old('keyTitle')}}" id="keyTitle" placeholder="Your Key" name="keyTitle">
                            <label for="keyTitle">Key Title</label>
                            @if($errors->AddKeyError->first('keyTitle'))
                            <div class='invalid-feedback'>{{$errors->AddKeyError->first('keyTitle')}}</div>

                            @endif


                        </div>
                    </div>


                    <div class="col-md-12 mb-2">
                        <div class="form-floating">
                            <input type="number" class="form-control @if($errors->AddKeyError->first('keyPrice')) is-invalid @endif" id="keyPrice" value="{{old('keyPrice')}}" placeholder="Key Price" name="keyPrice">
                            <label for="keyPrice">Key Price</label>
                            @if($errors->AddKeyError->first('keyPrice'))
                            <div class='invalid-feedback'>{{$errors->AddKeyError->first('keyPrice')}}</div>

                            @endif

                        </div>
                    </div>

                    <div class="col-md-12 mb-2">
                        <div class="form-floating">
                            <input type="file" class="form-control" id="keyIcon" placeholder="Your Key Icon" name="keyIcon">
                            <label for="keyIcon">Key Icon</label>
                        </div>
                    </div>


                    <div class="col-md-12 mb-2">
                        <div class="form-floating">
                            <textarea class="form-control" style="height: 100px;" id="keyDescription" placeholder="Key Description" name="keyDescription">{{old('keyDescription')}}</textarea>
                            <label for="keyDescription">Key Description</label>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-shadow" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-shadow">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div><!-- End Large Modal-->


@if(count($errors->AddKeyError))

     {{-- $errors->AddKeyError --}}

<script>
    $(document).ready(function(){
$("#addKeyModal").modal('show')

    })
</script>

@endif

<script>
      $(document).ready(function() {
        $('#addKeyModal').on('hidden.bs.modal', function (e) {
              $(".invalid-feedback").remove();
              $(".is-invalid").removeClass("is-invalid");
              $(".form-control").val('');
        })

    })
</script>
