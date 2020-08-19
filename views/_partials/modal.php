<!-- Modal Edit Mahasiswa -->
<form>
    <div class="modal fade" id="modal_edit_mahasiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Mahasiswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">NIM</span>
                        </div>
                        <input type="text" class="form-control edit_nim" name="edit_nim" id="edit_nim" placeholder="NIM" disabled>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Nama Mahasiswa</span>
                        </div>
                        <input type="text" class="form-control edit_nama_mahasiswa" name="edit_nama_mahasiswa" id="edit_nama_mahasiswa" placeholder="Nama Mahasiswa">
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" type="">Jenis Kelamin</span>
                        </div>
                        <select class="custom-select edit_jenis_kelamin" id="edit_jenis_kelamin" name="edit_jenis_kelamin">
                            <option selected hidden>Jenis Kelamin</option>
                            <option value="Laki - Laki">Laki - Laki</option>
                            <option value="Perempuan">Perempuan</option>

                        </select>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" type="">Program Studi</span>
                        </div>
                        <select class="custom-select edit_program_studi" id="edit_program_studi" name="edit_program_studi">


                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" type="">Kompetisi</span>
                        </div>
                        <select class="custom-select edit_kompetisi" id="edit_kompetisi" name="edit_kompetisi">


                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" type="">Pembimbing Akademik</span>
                        </div>
                        <select class="custom-select edit_pa" id="edit_pa" name="edit_pa">


                        </select>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Tanggal Masuk</span>
                        </div>
                        <input type="date" class="form-control edit_tgl" name="edit_tgl" id="edit_tgl">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="edit_mahasiswa_btn" type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Modal Edit Mahasiswa -->



<!-- Delete Modal Mahasiswa -->
<form>
    <div class="modal fade" id="modal_delete_mahasiswa" tabindex="-1" role="dialog" aria-labelledby="modal_cart_delete_title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content bg-danger">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Mahasiswa?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body" id="delete_mahasiswa_modal_body">



                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="btn_delete_mahasiswa" name="btn_delete_mahasiswa" type="button" class="btn btn-primary">Delete</button>
                </div>

            </div>
        </div>
    </div>
</form>
<!-- End Modal Delete Mahasiswa -->




<!-- Modal Edit Dosen -->
<form>
    <div class="modal fade" id="modal_edit_dosen" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Dosen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">NIK</span>
                        </div>
                        <input type="text" class="form-control edit_nik" name="edit_nik" id="edit_nik" placeholder="NIK" disabled>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Nama Dosen</span>
                        </div>
                        <input type="text" class="form-control edit_nama_dosen" name="edit_nama_dosen" id="edit_nama_dosen" placeholder="Nama Dosen">
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" type="">Jenis Kelamin</span>
                        </div>
                        <select class="custom-select edit_jenis_kelamin_dosen" id="edit_jenis_kelamin_dosen" name="edit_jenis_kelamin_dosen">
                            <option selected hidden>Jenis Kelamin</option>
                            <option value="Laki - Laki">Laki - Laki</option>
                            <option value="Perempuan">Perempuan</option>

                        </select>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" type="">Konsentrasi</span>
                        </div>
                        <select class="custom-select edit_konsentrasi" id="edit_konsentrasi" name="edit_konsentrasi">


                        </select>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" type="">Status</span>
                        </div>
                        <select class="custom-select" id="edit_status" name="edit_status">
                            <option selected hidden>Status</option>
                            <option value="Ketua Prodi">Ketua Prodi</option>
                            <option value="Pembimbing Akademik">Pembimbing Akademik</option>
                            <option value="Dosen">Dosen</option>

                        </select>
                    </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="edit_dosen_btn" type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Modal Edit Dosen -->









<!-- Delete Modal dosen -->
<form>
    <div class="modal fade" id="modal_delete_dosen" tabindex="-1" role="dialog" aria-labelledby="modal_cart_delete_title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content bg-danger">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Mahasiswa?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body" id="delete_dosen_modal_body">



                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="btn_delete_dosen" name="btn_delete_dosen" type="button" class="btn btn-primary">Delete</button>
                </div>

            </div>
        </div>
    </div>
</form>
<!-- End Modal Delete dosen -->



<!--  Modal acc judul -->
<form>
    <div class="modal fade" id="modal_acc_judul" tabindex="-1" role="dialog" aria-labelledby="modal_acc_judul" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title">Terima Judul</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body" id="Terima_judul">



                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-danger" data-dismiss="modal">Close</button>
                    <button id="apply_modal" name="modal_terima_tolak" type="button" class="btn btn-success">Apply</button>
                </div>

            </div>
        </div>
    </div>
</form>
<!-- End Modal acc judul -->

<!--  Modal selesai Bimbingan -->
<form>
    <div class="modal fade" id="modal_selesai_bimbingan" tabindex="-1" role="dialog" aria-labelledby="modal_selesai_bimbingan" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title">Selesai Bimbingan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body" id="selesai_bimbingan">



                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-danger" data-dismiss="modal">Close</button>
                    <button id="selesai_bimbingan_btn" name="selesai_bimbingan_btn" type="button" class="btn btn-success">Terima Judul</button>
                </div>

            </div>
        </div>
    </div>
</form>
<!-- End Modal selesai Bimbingan -->
<!--  Modal pilih penguji dan tanggal -->
<form>
    <div class="modal fade" id="modal_penguji_tanggal" tabindex="-1" role="dialog" aria-labelledby="modal_penguji_tanggal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title">Pilih pengujidan Tanggal Ujian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body" id="penguji_tanggal">



                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-danger" data-dismiss="modal">Close</button>
                    <button id="selesai_terima_penguji" name="btn_accept" type="button" class="btn btn-success">Terima Judul</button>
                </div>

            </div>
        </div>
    </div>
</form>
<!-- End Modal pilih penguji dan tanggal -->
<!--  Modal terima Tolak Seminar Proposal -->
<form>
    <div class="modal fade" id="Terima_tolak_seminar_proposal" tabindex="-1" role="dialog" aria-labelledby="Terima_tolak_seminar_proposal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title">Pilih pengujidan Tanggal Ujian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body" id="Terima_tolak_seminar_proposal_isi">



                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-danger" data-dismiss="modal">Close</button>
                    <button id="selesai_terima_penguji" name="btn_accept" type="button" class="btn btn-success">Terima Judul</button>
                </div>

            </div>
        </div>
    </div>
</form>
<!-- End Modal terima Tolak Seminar Proposal -->

<!--  Modal selesai Bimbingan Skripsi -->
<form>
    <div class="modal fade" id="modal_selesai_bimbingan_skripsi" tabindex="-1" role="dialog" aria-labelledby="modal_selesai_bimbingan_skripsi" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title">Selesai Bimbingan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body" id="selesai_bimbingan_skripsi">



                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-danger" data-dismiss="modal">Close</button>
                    <button id="selesai_bimbingan_skripsi_btn" name="selesai_bimbingan_skripsi_btn" type="button" class="btn btn-success">Terima Judul</button>
                </div>

            </div>
        </div>
    </div>
</form>
<!-- End Modal selesai Bimbingan -->