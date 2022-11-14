<div class="modal fade" id="filter" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Filter Jenis Pengaduan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="form-group">
                        <div class="form-check">
                            <input type="radio" name="filter" id="semua" value="semua">
                            <label for="">Semua Kode</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-sm-3">
                            <div class="form-group">
                                <div class="form-check">
                                    <input type="radio" name="filter" id="kode" value="kode">
                                    <label for="">Kode</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-4" id="startEnd">
                            <div class="form-group">
                                <input class="form-control" type="text" name="start" id="start">
                            </div>
                        </div>
                        <span class="font-weight-bold mt-1" style="font-size: 15px;" id="startEnd">S/D</span>
                        <div class="col-md-3 col-sm-4" id="startEnd">
                            <div class="form-group">
                                <input class="form-control" type="text" name="end" id="end">
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-success btn-sm" type="submit">Preview</button>
                    <button type="cancel" class="btn btn-danger btn-sm"> Batal</button>
                </form>
            </div>
        </div>
    </div>
</div>


@push('js')
    <script type="text/javascript">
    $(document).ready(function(){
        $('input[type="radio"]').on('click', function(){
            if($(this).attr("value") == "semua") {
                $('#start').prop('disabled', true)
                $('#end').prop('disabled', true)
                console.log("hidup");
            }
            if($(this).attr("value") == "kode"){
                console.log("mati");
                $('#start').prop('disabled',false)
                $('#end').prop('disabled',false)
            }
        })
        $('input[type="radio"]').trigger('click');
    })
    </script>
@endpush
