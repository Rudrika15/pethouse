<input name="petMasterId" type="hidden" value="{{$petDetail->petMaster->id ?? null}}" id="selectedItemId"/>

<input type="text" id="justAnotherInputBox" class="form-control @error('petMasterId') is-invalid @enderror" placeholder="Type to filter" autocomplete="off" />

<script>
    getItem()

    function getItem() {
        $.ajax({
            method: "GET",
            url: "{{ route('petmaster.tree') }}",
            success: function(data) {
                jsonData = JSON.parse(data)

                // if("{{$petDetail->petMaster->id ?? null}}" ? true : false)
                // {
                //     jsonData.unshift({id:'',title:'Root Pet Master'})
                // }
                // console.log(jsonData);
                let instance = $("#justAnotherInputBox").comboTree({
                    source: jsonData,
                    selected:[{{$petDetail->petMaster->id ?? null ? $petDetail->petMaster->id : old('petMasterId')}}],
                    // disabled:{{$petDetail->petMaster->id ?? 0}},
                    isMultiple: false,
                    // collapse:true,
                    error:"@error('petMasterId') <div style='font-size:0.875em;  color: #dc3545;'>{{$message}}</div> @enderror",
                });

            }
        })
    }

</script>
