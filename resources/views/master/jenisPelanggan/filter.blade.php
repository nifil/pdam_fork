<div class="modal fade" id="filter" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Filter Jenis Pelanggan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{-- <form class="form-horizontal" action="{{ route('printjenisPelanggan') }}" method="POST"> --}}
                    @csrf
                    <div class="form-group">
                        <div class="form-check">
                            <input type="radio" name="filter" id="semuakd" value="semua">
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
                        <div id="box">
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
                    </div>
                    <button type="submit" class="btn btn-info btn-sm">Preview</button>
                    <button class="btn btn-danger btn-sm">Batal</button>
                </form>
            </div>
        </div>
    </div>
</div>

